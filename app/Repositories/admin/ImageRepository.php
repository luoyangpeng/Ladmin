<?php
namespace App\Repositories\admin;
use App\Models\Image;
class ImageRepository {


    /**
     * 添加图片
     * @param $data
     * @return mixed
     */
    public function addImage($data)
    {
        $id = Image::InsertGetId($data);
        return $id;
    }

    /**
     * 获取图片列表
     */
    public function getList()
    {
      
        $list = Image::paginate(10);

        return $list;
    }

    public function getCount()
    {
        return Image::count();
    }


    public function getDelete($id)
    {
        $res = Image::destroy($id);

        return $res;
    }

}

