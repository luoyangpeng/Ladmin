<?php
/**
* 图片管理
* @author :luoyangpeng1122@163.com
*/

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Lib\FileUpload;
use ImageRepository;


class ImageController extends Controller {

    /**
     * 图片上传页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showImageUpload()
    {
        return view("admin.image.show");
    }

    /**
     * 图片上传
     */
    public function postImageUpload()
    {

        $file_name = FileUpload::Upload();
        $data = array(
            'file_id' => str_random(20),
            'path' => $file_name,
            'category_id' =>request()->get('category_id'),
            'created_at' => date("Y-m-d H:i:s"),
        );
        ImageRepository::addImage($data);
    }

    /**
     * 图片选择器页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showImageSelect()
    {

        return view("admin.image.select");
    }

    /**
     * 图片库
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showImageLib()
    {


        if(isset($_REQUEST['ajax'])){

            $data = ImageRepository::getList()->toArray();
            $count = ImageRepository::getCount();
            $data['total'] =$count;
            return $data;
        }
        return view("admin.image.lib");
    }

    /**
     * 展示图片
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showImageList()
    {
        if(request()->ajax()) {
            $page = request('page'); 
        } else {
            $page = 1;
        }

        $image_list = ImageRepository::getList()->toArray();

        $count = ImageRepository::getCount();

        $last_page = $count%10  ? intval($count/10) + 1 : $count/10;

        //ajax加载内容
        if(request()->ajax()){
            
            return view("admin.image.ajax_list",compact('image_list','page','last_page'));
        }

        return view("admin.image.image_list",['image_list'=>$image_list]);
    }

    /**
     * 删除图片
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {

        $res = ImageRepository::getDelete($id);

        return $res;
    }


}