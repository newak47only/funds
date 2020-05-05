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

//Route::get('/', function () {
    //return view('welcome');
//});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/welcome', 'HomeController@welcome');
//用户管理模块
	//Route::get('/emp/show/{id}','EmpController@show')->name('emp.show');
	Route::get('/emp/aajax/{str}',"EmpController@aajax");
	Route::get('/emp/destroy/{id}','EmpController@destroy');
	Route::resource('emp','EmpController');
	//Route::psot('/emp/update/{id}','EmpController@update');

	
	//权限管理模块
	Route::get('/permission/aajax/{str}',"permissionController@aajax");
	Route::get('/permission/destroy/{id}','PermissionController@destroy');
	Route::resource('permission','PermissionController');
	//Route::get('/permission/index', 'PermissionController@index');
	//Route::any('/permission/add', 'PermissionController@add');
	//角色管理模块
	Route::get('/role/assign/{id}','RoleController@assign');
	Route::resource('role','RoleController');
	//部门管理模块
	Route::get('/dept/aajax/{str}',"DeptController@aajax");
	Route::get('/dept/destroy/{id}','DeptController@destroy');
	Route::resource('dept','DeptController');
	//Route::get('/dept/edit/{id}', 'DeptController@edit');
	//Route::any('/dept/add', 'DeptController@add');
	//Route::any('/dept/edit', 'DeptController@edit');

	//洽谈项目管理模块
	Route::get('information/termination/{str}','InformationController@termination');
	Route::get('information/list_all','InformationController@list_all');
	Route::get('information/ownlist','InformationController@ownlist');
	Route::resource('information','InformationController');
	
	//洽谈项目上报模块管理模块
	Route::get('/report/add/{id}','ReportController@add');
	Route::get('/report/edit/{id}','ReportController@edit');
	Route::resource('report','ReportController');


	//洽谈审批管理模块
	Route::get('/negotiation/ownlist_all','NegotiationController@ownlist_all');
	Route::get('/negotiation/inlist_all','NegotiationController@inlist_all');
	Route::get('/negotiation/outlist_all','NegotiationController@outlist_all');
	Route::get('/negotiation/ownlist','NegotiationController@ownlist');
	Route::get('/negotiation/inlist','NegotiationController@inlist');
	Route::get('/negotiation/outlist','NegotiationController@outlist');
	Route::get('/negotiation/tctracklist_all','NegotiationController@tctracklist_all');
	Route::get('/negotiation/list/{id}','NegotiationController@list');
	Route::get('/negotiation/index1','NegotiationController@index1');
	Route::get('/negotiation/tclist','NegotiationController@tclist');
	Route::get('/negotiation/tctracklist','NegotiationController@tctracklist');
	Route::get('/negotiation/add/{id}','NegotiationController@add');
	Route::resource('negotiation','NegotiationController');
	
	//Route::get('/negotiation/edit/{id}','NegotiationController@add');
	//落地审批模块
	Route::get('/landing/add/{id}','LandingController@add');
	Route::resource('landing','LandingController');


	//投产模块
	Route::get('/completion/add/{id}','CompletionController@add');
	Route::resource('completion','CompletionController');
	
	
	//绩效统计模块
	Route::get('/statistics/add/{id}','StatisticsController@add');
	Route::resource('statistics','StatisticsController');


	Route::any('/uploader/tclist_all','UploaderController@tclist_all');
	Route::any('/uploader/tctracklist_all','UploaderController@tctracklist_all');
	Route::any('/uploader/tclist','UploaderController@tclist');
	Route::any('/uploader/tctracklist','UploaderController@tctracklist');
	Route::any('/uploader/index1','UploaderController@index1');
	Route::any('/uploader/index2','UploaderController@index2');
	Route::any('/uploader/webuploader','UploaderController@webuploader');
	Route::resource('uploader','UploaderController');


	Route::get('/circule/list_all','CirculeController@list_all');
	Route::get('/circule/inlist_all','CirculeController@inlist_all');
	Route::get('/circule/outlist_all','CirculeController@outlist_all');
	Route::get('/circule/inlist','CirculeController@inlist');
	Route::get('/circule/outlist','CirculeController@outlist');
	Route::get('/circule/index1','CirculeController@index1');
	Route::get('/circule/index2','CirculeController@index2');
	Route::get('/circule/index4','CirculeController@index4');
	Route::get('/circule/tclist_all','CirculeController@tclist_all');
	Route::get('/circule/tctracklist_all','CirculeController@tctracklist_all');
	Route::get('/circule/tclist','CirculeController@tclist');
	Route::get('/circule/tctracklist','CirculeController@tctracklist');
	Route::get('/circule/start_circule/{id}','CirculeController@start_circule');
	Route::post('/circule/start_store/','CirculeController@start_store');
	Route::get('/circule/check/{id}','CirculeController@check');
	Route::get('/circule/redit/{id}','CirculeController@redit');
	Route::post('/circule/rupdate/{id}','CirculeController@rupdate');

	Route::get('/circule/add/{id}','CirculeController@add');
	Route::get('/circule/list','CirculeController@list');
	Route::resource('circule','CirculeController');

	//Route::get('/circule/edit/{id}','CirculeController@edit');


	//记录模块
	Route::get('/recode/ciradd/{id}','RecodeController@ciradd');
	Route::post('/recode/cirstore/','RecodeController@cirstore');
	Route::get('/recode/add/{id}','RecodeController@add');
	Route::get('/recode/show/{id}','RecodeController@show')->name('recode.show');
	Route::resource('recode','RecodeController');
