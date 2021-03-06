<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //分类表
    protected $table = "category";
    //获取分类列表
     public function getLists()
     {
     	return self::paginate(5);
     } 
     //分类添加
     public function addRecord($data)
    {
    	return self::insert($data);
    }
    //分类删除
     public function delRecord($id)
    {
    	return self::where('id',$id)->delete();
    }

    //获取分类
    public function getCategory()
    {
        return self::get()->toArray();
        
    }
}
