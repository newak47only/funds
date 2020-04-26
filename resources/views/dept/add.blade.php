@extends('layouts.app')
@section('content')
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
						success:function(data){
							if( data == '1'){
								layer.msg('部门添加成功！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('部门添加失败！',{ icon: 2,time:2000});
							}
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg('部门添加错误！',{ icon: 1,time:1000});
						}
					});
			}
		});
	});
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
