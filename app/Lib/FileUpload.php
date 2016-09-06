<?php

namespace App\Lib;
use itbdw\QiniuStorage\QiniuStorage;
use Image;

class FileUpload{
	
	public static function Upload() {
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		

		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			exit; // finish preflight CORS requests here
		}
		
		
		if ( !empty($_REQUEST[ 'debug' ]) ) {
			$random = rand(0, intval($_REQUEST[ 'debug' ]) );
			if ( $random === 0 ) {
				header("HTTP/1.0 500 Internal Server Error");
				exit;
			}
		}
		
		
		// 5 minutes execution time
		@set_time_limit(5 * 60);
		
		// Uncomment this one to fake upload time
		// usleep(5000);
		
		// Settings
		// $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
		$targetDir = public_path()."/backend/uploads/";
		$uploadDir = public_path()."/backend/uploads/";
		
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds
		
		
		// Create target dir
		if (!file_exists($targetDir)) {
			@mkdir($targetDir);
		}
		
		// Create target dir
		if (!file_exists($uploadDir)) {
			@mkdir($uploadDir);
		}
		if (!file_exists($uploadDir."/small/")) {
			@mkdir($uploadDir."/small/");
		}
		if (!file_exists($uploadDir."/middle/")) {
			@mkdir($uploadDir."/middle/");
		}
		
		// Get a file name
		if (isset($_REQUEST["name"])) {
			$fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid("file_");
		}
		$file_info = pathinfo($fileName);
		$fileName = date("Ymdhis").".".$file_info['extension'];
		
		
		$md5File = @file('md5list2.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		$md5File = $md5File ? $md5File : array();
		
		if (isset($_REQUEST["md5"]) && array_search($_REQUEST["md5"], $md5File ) !== FALSE ) {
			die('{"jsonrpc" : "2.0", "result" : null, "id" : "id", "exist": 1}');
		}


		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
		$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
		$upload_toQiNiuPath = $uploadPath;
		
		// Chunking might be enabled
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
		
		
		// Remove old temp files
		if ($cleanupTargetDir) {
			if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
			}
		
			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
		
				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}.part") {
					continue;
				}
		
				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}
		
		
		// Open temp file
		if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}
		
		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
			}
		
			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		} else {
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			}
		}
		
		while ($buff = fread($in, 4096)) {
			
			fwrite($out, $buff);
		}
		
		@fclose($out);
		@fclose($in);



		// Check if file has been uploaded
		if (!$chunks || $chunk == $chunks - 1) {
			// Strip the temp .part suffix off
			rename("{$filePath}.part", $filePath);
		
			rename($filePath, $uploadPath);
			$uploadPath = self::mymd5($uploadPath);
			array_push($md5File,$uploadPath );
			$md5File = array_unique($md5File);
			file_put_contents('md5list2.txt', join($md5File, "\n"));
		}

		//image 处理
		$img = Image::make($upload_toQiNiuPath);
		$img->resize(300, null, function ($constraint) {
			$constraint->aspectRatio();
		});
		$img->save($uploadDir."/middle/".$fileName);

		$img->resize(150, null, function ($constraint) {
			$constraint->aspectRatio();
		});
		$img->save($uploadDir."/small/".$fileName);

		//upload to qinniu
		$disk = QiniuStorage::disk('qiniu');

		$disk->putFile($fileName,$upload_toQiNiuPath);
		$disk->putFile("middle/".$fileName,$uploadDir."/middle/".$fileName);
		$disk->putFile("small/".$fileName,$uploadDir."/middle/".$fileName);

		// Return Success JSON-RPC response
		//die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
		return $fileName;
	}
	
	
	
	public static function mymd5( $file ) {
		$fragment = 65536;
	
		$rh = fopen($file, 'rb');
		$size = filesize($file);
	
		$part1 = fread( $rh, $fragment );
		fseek($rh, $size-$fragment);
		$part2 = fread( $rh, $fragment);
		fclose($rh);
	
		return md5( $part1.$part2 );
	}
	
	
	
	
}
