<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
class CategoryController extends Controller
{
    //分类的列表
    public function list()
    {	
    	$category = new Category();
    	$assign['categorys']=$category->getLists();
    	return view('admin.category.list',$assign);
    }
    //小说分类添加页面
    public function create()
    {
    	return view('admin.category.create');
    }
    //保存
    public function store(Request $request)
    {
    	$params = $request->all();
    	$category = new Category();
    	$data = [
    		'c_name'=>$params['c_name'] ?? ""
    	];
    	$res = $category->addRecord($data);

    	if(!$res){
    		return redirect()->back();
    	}
    	return redirect('admin/category/list');
    }
    //删除操作
    public function del($id)
    {
    	$category = new Category();
    	$category->delRecord($id);
    	return redirect('admin/category/list');
    }
}
