<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//登录页面
 Route::any("admin/login","Admin\LoginController@index");
 Route::any("admin/logout","Admin\LoginController@logout");
 //执行登录
 Route::any("admin/doLogin","Admin\LoginController@doLogin");
 Route::any('study/delSign',"Study\IndexController@delSign");
 // Route::any('study/getList',"Study\IndexController@getList");
 // Route::any('study/Sign',"Study\IndexController@Sign");
 Route::get('403',function(){
 	return view('403');
 });
 //管理后台RBAC功能的路由组
 Route::middleware(['permission_auth','admin_auth'])->prefix('admin')->group(function(){
 	//后台登录首页
 		Route::any("home","Admin\HomeController@home")->name('admin.home');
 		/*###########################[权限相关]#####################*/
 		//权限列表
 		Route::any("/permission/list",'Admin\permissionController@list')->name('admin.permission.list');
 		//获取权限的数据
 		Route::any("/get/permission/list/{fid?}","Admin\permissionController@getPermissionList")->name('admin.get.permission.list');
 		//权限添加
 		Route::get('/permission/create','Admin\permissionController@create')->name('admin.permission.create');
 		//执行权限添加
 		Route::post('/permission/doCreate','Admin\permissionController@doCreate')->name('admin.permission.doCreate');
 		//删除权限操作
 		Route::get('/permission/del/{id}','Admin\permissionController@del')->name('admin.permission.del');
 		/*###########################[权限相关]#####################*/



 		/*###########################[用户相关]#####################*/
 		//用户添加页面
 		Route::get('/user/add','Admin\AdminUsersController@create')->name('admin.user.add');
 		//执行用户添加
 		Route::post('/user/store','Admin\AdminUsersController@store')->name('admin.user.store');
 		//用户列表页面
 		Route::get('/user/list','Admin\AdminUsersController@list')->name('admin.user.list');
 		//用户删除页面
 		Route::get('/user/del/{id}','Admin\AdminUsersController@delUser')->name('admin.user.del');
 		//用户编辑页面
 		Route::get('/user/edit/{id}','Admin\AdminUsersController@edit')->name('admin.user.edit');
 		//用户执行编辑页面
 		Route::post('/user/doEdit','Admin\AdminUsersController@doEdit')->name('admin.user.doEdit');
 		/*###########################[用户相关]#####################*/

 		/*###########################[角色相关]#####################*/
 		//角色列表
 		Route::get('/role/list','Admin\RoleController@list')->name('admin.role.list');
 		//角色删除
 		Route::get('/role/del/{id}','Admin\RoleController@delRole')->name('admin.role.del');
 		//角色编辑
 		Route::get('/role/edit/{id}','Admin\RoleController@edit')->name('admin.role.edit');
 		//执行编辑
 		Route::post('/role/doEdit','Admin\RoleController@doEdit')->name('admin.role.doEdit');
 		//角色添加
 		Route::get('/role/create','Admin\RoleController@create')->name('admin.role.create');
 		//执行添加
 		Route::post('/role/store','Admin\RoleController@store')->name('admin.role.store');
 		//角色权限编辑
 		Route::get('/role/permission/{id}','Admin\RoleController@rolePermission')->name('admin.role.permission');
 		//角色权限执行编辑
 		Route::post('/role/permission/save','Admin\RoleController@saveRolePermission')->name('admin.role.permission.save');

 		/*###########################[角色相关]#####################*/

 		/*###########################[小说相关]#####################*/
 		//作者列表
 		Route::get('author/list','Admin\AuthorController@list')->name('admin.author.list');
 		//作者添加
 		Route::get('author/create','Admin\AuthorController@create')->name('admin.author.create');
 		//作者执行添加
 		Route::post('author/store','Admin\AuthorController@store')->name('admin.author.store');
 		//作者删除
 		Route::get('author/del/{id}','Admin\AuthorController@del')->name('admin.author.del');
 		//小说分类列表
 		Route::get('category/list','Admin\CategoryController@list')->name('admin.category.list');
 		//小说分类添加
 		Route::get('category/create','Admin\CategoryController@create')->name('admin.category.create');
 		//小说执行分添加
 		Route::post('category/store','Admin\CategoryController@store')->name('admin.category.store');
 		//执行小说分类删除
 		Route::get('category/del/{id}','Admin\CategoryController@del')->name('admin.category.del');
 		//小说添加
 		Route::get('novel/create','Admin\NovelController@create')->name('admin.novel.create');
 		//小说列表
 		Route::get('novel/list','Admin\NovelController@list')->name('admin.novel.list');
 		//执行小说的添加
 		Route::post('novel/store','Admin\NovelController@store')->name('admin.novel.store');
 		 //小说编辑
     Route::get('nove/edit/{id}','Admin\NovelController@edit')->name('admin.novel.edit');
 		//执行小说编辑
     Route::post('nove/doEdit','Admin\NovelController@doEdit')->name('admin.novel.doEdit');
     //小说的删除
     Route::get('novel/del/{id}','Admin\NovelController@del')->name('admin.novel.del');
     
     //添加小说章节页面
     Route::get('chapter/add/{novel_id}','Admin\ChapterController@create')->name('admin.chapter.create');
     //保存小说的章节
     Route::post('chapter/store','Admin\ChapterController@store')->name('admin.chapter.store');
     // //小说章节列表
     Route::get('chapter/list/{novel_id?}','Admin\ChapterController@list')->name('admin.chapter.list');
     // //章节删除
     Route::get('chapter/del/{id}','Admin\ChapterController@del')->name('admin.chapter.del');
     // //章节编辑
     Route::get('chapter/edit/{id}','Admin\ChapterController@edit')->name('admin.chapter.edit');
     // //执行章节编辑
     Route::post('chapter/doEdit','Admin\ChapterController@doEdit')->name('admin.chapter.doEdit');
     // //小说评论列表页面
     Route::get('novel/comment/list','Admin\CommentController@list')->name('admin.novel.comment.list');
     //小说数据
     Route::get('novel/comment/data','Admin\CommentController@getComment')->name('admin.novel.comment.data');
     // //小说评论审核
     Route::get('novel/comment/check/{id}','Admin\CommentController@check')->name('admin.novel.comment.check');

     // //小说评论删除
     Route::get('novel/comment/del/{id}','Admin\CommentController@del')->name('admin.novel.comment.del');
 });

