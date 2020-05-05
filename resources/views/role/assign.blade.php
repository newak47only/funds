﻿@extends('layouts.app')
@section('content')
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">
				<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3">网站角色：</label>
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
									用户中心</label>
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
				</div>
				<div class="row clearfix">
					<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
						<button type="submit" class="btn btn-success radius" id="admin-role-save"><i class="icon-ok"></i> 确定</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="lib/layer/3.1.1/layer.js"></script>
	<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
	<script type="text/javascript" src="static/h-ui.admin.pro/js/h-ui.admin.pro.min.js"></script>

	<!--/_footer /作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
	<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
	<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
	<script type="text/javascript">
	$(function(){
		$(".Hui-admin-permission-list dt input:checkbox").click(function(){
			$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
		});
		$(".Hui-admin-permission-list2 dd input:checkbox").click(function(){
			var l =$(this).parent().parent().find("input:checked").length;
			var l2=$(this).parents(".Hui-admin-permission-list").find(".Hui-admin-permission-list2 dd").find("input:checked").length;
			if($(this).prop("checked")){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
				$(this).parents(".Hui-admin-permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
			}
			else{
				if(l==0){
					$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
				}
				if(l2==0){
					$(this).parents(".Hui-admin-permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
				}
			}
		});

		$("#form-admin-role-add").validate({
			rules:{
				roleName:{
					required:true,
				},
			},
			onkeyup:false,
			focusCleanup:true,
			success:"valid",
			submitHandler:function(form){
				$(form).ajaxSubmit();
				var index = parent.layer.getFrameIndex(window.name);
				parent.layer.close(index);
			}
		});
	});
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
@endsection