﻿<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="Bookmark" href="favicon.ico" >
	<link rel="Shortcut Icon" href="favicon.ico" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="/lib/html5.js"></script>
	<script type="text/javascript" src="/lib/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.9/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="/static/business/css/style.css" />
	<!--[if IE 6]>
	<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<!--/meta 作为公共模版分离出去-->

	<title>新建部门 - 管理员管理 - h-ui.admin.pro v1.0</title>
	<meta name="keywords" content="h-ui.admin.pro v1.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
	<meta name="description" content="h-ui.admin.pro v1.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">
				<form action="{{route('dept.store')}}" method="POST" class="form form-horizontal" id="form-admin-role-add">

          {{csrf_field()}}
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>部门名称：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="dept_name" name="dept_name" datatype="*4-16" nullmsg="用户账户不能为空">
					</div>
				</div>

				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上级部门：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						 <select  class="select"  name="pid">
              				<option value="0">无</option>
              				@foreach($depts as $v)
              				<option value="{{$v->id}}">{{$v->dept_name}}</option>
              				@endforeach
            			</select>
					</div>
				</div>

				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>部门主管：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						<select class="select" name="director_id">
              				<option value="0">无</option>
              				@foreach($emps as $v)
              				<option value="{{$v->id}}">{{$v->name}}</option>
             				 @endforeach
            			</select>
					</div>
				</div>

				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>部门副主管：</label>
					<div class="form-controls col-xs-8 col-sm-9">

						<select class="select" name="manager_id">
              				<option value="0">无</option>
              				@foreach($emps as $v)
              				<option value="{{$v->id}}">{{$v->name}}</option>
             				 @endforeach
            			</select>
					</div>
				</div>

				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>部门排序：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="rank" name="rank" datatype="*4-16" nullmsg="排序必填">
					</div>
				</div>
				<!--<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3">部门权限：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						<dl class="Hui-admin-permission-list">
							<dt>
								<label>
									<input type="checkbox" value="" name="user-Character-0" id="user-Character-0">
									资讯管理</label>
							</dt>
							<dd>
								<dl class="clearfix Hui-admin-permission-list2">
									<dt>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-0" id="user-Character-0-0">
											栏目管理</label>
									</dt>
									<dd>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-0">
											添加</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-1">
											修改</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-2">
											删除</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-3">
											查看</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-4">
											审核</label>
										<label class="c-orange"><input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-5"> 只能操作自己发布的</label>
									</dd>
								</dl>
								<dl class="clearfix Hui-admin-permission-list2">
									<dt>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-1" id="user-Character-0-1">
											文章管理</label>
									</dt>
									<dd>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-0">
											添加</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-1">
											修改</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-2">
											删除</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-3">
											查看</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-0-1-0" id="user-Character-0-1-4">
											审核</label>
										<label class="c-orange"><input type="checkbox" value="" name="user-Character-0-2-0" id="user-Character-0-2-5"> 只能操作自己发布的</label>
									</dd>
								</dl>
							</dd>
						</dl>
						<dl class="Hui-admin-permission-list">
							<dt>
								<label>
									<input type="checkbox" value="" name="user-Character-0" id="user-Character-1">
									部门操作</label>
							</dt>
							<dd>
								<dl class="clearfix Hui-admin-permission-list2">
									<dt>
										<label class="">
											<input type="checkbox" value="" name="user-Character-1-0" id="user-Character-1-0">
											用户管理</label>
									</dt>
									<dd>
										<label class="">
											<input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-0">
											添加</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-1">
											修改</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-2">
											删除</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-3">
											查看</label>
										<label class="">
											<input type="checkbox" value="" name="user-Character-1-0-0" id="user-Character-1-0-4">
											审核</label>
									</dd>
								</dl>
							</dd>
						</dl>
					</div>
				</div>-->
				<div class="row clearfix">
					<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
						<button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/lib/layer/3.1.1/layer.js"></script>
	<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
	<script type="text/javascript" src="/static/h-ui.admin.pro/js/h-ui.admin.pro.min.js"></script>

	<!--/_footer /作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
	<script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
	<script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>
	<script type="text/javascript">
	$(function(){
		

		$("#form-admin-role-add").validate({
			rules:{
				dept_name:{
					required:true,
				},
			},
			onkeyup:false,
			focusCleanup:true,
			success:"valid",
			submitHandler:function(form){
					$(form).ajaxSubmit({
						type:'post',
						url:"{{route('dept.store')}}",
						success:function($data){
							layer.msg('添加成功！',{ icon: 1,time:1000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								//parent.$('.btn-refresh').click();
								parent.layer.close(index);
							});
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg('添加错误！',{ icon: 1,time:1000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								//parent.$('.btn-refresh').click();
								parent.layer.close(index);
							});
						}
					});
			}
		});
	});
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>