<?php

namespace App\Services;

class IdEncryptService {

    /**
     * id 加密
     * 可用 static::decryption_id() 进行解密
     * @param $id
     * @return string
     */
    public static function encryption_id( $id = 0 ){
        $id = trim($id);
        if(!is_numeric($id)){
            return FALSE;
        }
        $iii = config('id_encrypt.iii');//左侧位数，必需是数字，避免与其它定义重复，故用此定义
        $kkk = config('id_encrypt.kkk');//右侧位数，必需是数字
        $mmm = config('id_encrypt.mmm');//加的一个常量，必需是数字,这样容纳10亿个数字，加密后的位数依然不变，为16位，与MD5加密一致，会被误认为是md5
        $nnn = config('id_encrypt.nnn');//只能填0-9之间的数字，将数字替换为下面的o代表的字符,只替换一次。
        $ooo = config('id_encrypt.ooo');//最好是a-f之间的字符,改变上述这五个常量,黑客就无从猜解了.
        $ppp = config('id_encrypt.ppp');//只能填0-9之间的数字，将数字替换为下面的o代表的字符,只替换一次。
        $qqq = config('id_encrypt.qqq');//最好是a-f之间的字符,改变上述这五个常量,黑客就无从猜解了.
        $rrr = config('id_encrypt.rrr');//只能填0-9之间的数字，将数字替换为下面的o代表的字符,只替换一次。
        $sss = config('id_encrypt.sss');//最好是a-f之间的字符,改变上述这五个常量,黑客就无从猜解了.
        $id_plus=$id1=$id2=$id3=$id_str = '';


        $id_plus=$id+$mmm;//加上一个常数进行运算，这是能否解密的关键，同时也可以防止黑客用非数字攻击。
        $id1 = substr(md5($id_plus),8,16);
        $id2 = substr($id1,0,$iii);//只取前5位
        $id3 = substr($id1,-$kkk);//取后2位
        $replace_count = 1;
        $id_str = substr($id_plus, 0, 1).preg_replace("/{$nnn}/", $ooo, substr($id_plus, 1), $replace_count);//替换第一个出现的数字为字符
        $id_str = substr($id_str, 0, 1).preg_replace("/{$ppp}/", $qqq, substr($id_str, 1), $replace_count);//替换第一个出现的数字为字符
        $id_str = substr($id_str, 0, 1).preg_replace("/$rrr/", $sss, substr($id_str, 1), $replace_count);//替换第一个出现的数字为字符

        return $id2.$id_str.$id3; //encryption_id是呈现给读者的，是加密过的,实际上它还可以进一步进行打乱次序运算
    }

    /**
     * id 解密
     * 适用于 static::encryption_id() 加密算法得到的key
     * @param $key
     * @return int|string
     */
    public static function decryption_id( $key = 0 ){
        $key = trim($key);
        if(!ctype_alnum($key) or strlen($key) != 16 ){
            return FALSE;
        }
        $iii = config('id_encrypt.iii');//左侧位数，必需是数字，避免与其它定义重复，故用此定义
        $kkk = config('id_encrypt.kkk');//右侧位数，必需是数字
        $mmm = config('id_encrypt.mmm');//加的一个常量，必需是数字,这样容纳10亿个数字，加密后的位数依然不变，为16位，与MD5加密一致，会被误认为是md5
        $nnn = config('id_encrypt.nnn');//只能填0-9之间的数字，将数字替换为下面的o代表的字符,只替换一次。
        $ooo = config('id_encrypt.ooo');//最好是a-f之间的字符,改变上述这五个常量,黑客就无从猜解了.
        $ppp = config('id_encrypt.ppp');//只能填0-9之间的数字，将数字替换为下面的o代表的字符,只替换一次。
        $qqq = config('id_encrypt.qqq');//最好是a-f之间的字符,改变上述这五个常量,黑客就无从猜解了.
        $rrr = config('id_encrypt.rrr');//只能填0-9之间的数字，将数字替换为下面的o代表的字符,只替换一次。
        $sss = config('id_encrypt.sss');//最好是a-f之间的字符,改变上述这五个常量,黑客就无从猜解了.
        $id1=$id2=$id3=$id_left=$id_right=$id_left_1=$id_right_1=$x=$x1=$id3_md5=$id1_str=$id_plus='';
        $id_left_1=substr($key,0,5);//取MD5加密的前5位
        $id_right_1=substr($key,-$kkk);//取加密后2位
        $x=strlen($key);//计算长度
        $x1=$x-$iii-$kkk;//实际ID值的长度
        $replace_count =1;
        $id_plus =substr($key,$iii,$x1);
        $id_plus = substr($id_plus, 0, 1).preg_replace("/{$ooo}/", $nnn, substr($id_plus, 1), $replace_count);//替换第一个出现的数字为字符
        $id_plus = substr($id_plus, 0, 1).preg_replace("/{$qqq}/", $ppp, substr($id_plus, 1), $replace_count);//替换第一个出现的数字为字符
        $id_plus = substr($id_plus, 0, 1).preg_replace("/{$sss}/", $rrr, substr($id_plus, 1), $replace_count);//替换第一个出现的数字为字符
        if(!is_numeric($id_plus)){
            $decryption_id=0;
        }
        $id_plus_md5=substr(md5($id_plus),8,16);
        $id_left = substr($id_plus_md5, 0, $iii);
        $id_right=substr($id_plus_md5,-$kkk);

        if($id_left==$id_left_1 and $id_right==$id_right_1){
            $decryption_id=$id_plus-$mmm;
        }else{
            $decryption_id=0;
        }
        return $decryption_id;

    }

    /**
     * id 解密 如果解密失败则终止程序继续运行
     * @param int $key
     * @param string $key_name
     * @return int|string|void
     */
    public static function decryptionOrDie($key = 0, $key_name = 'ID'){
        $value = static::decryption_id($key);

        if( $value == $key or !$value ){
            return false;
        }
        return $value;
    }

    /**
     * 加密助手
     *
     * @param array $array 需要加密的数组
     * @param array $keys 需要加密的字段
     * @return array
     */
    public static function encryption_helper( &$array, $keys = ['id', 'uid'] ){
        $keys = is_string($keys) ? explode(',', $keys) : $keys;
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                static::encryption_helper($array[$key], $keys);
            } else {
                if (in_array($key, $keys) and is_numeric($value)) {
                    $array[$key] = static::encryption_id($value);
                } else{
                    $array[$key] = $value;
                }
            }
        }

        return $array;
    }
}