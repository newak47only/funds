@extends('layouts.app')
@section('content')
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">
				<form action="{{route('emp.update', $emp->id)}}" method="post" class="form form-horizontal" id="form-emp-update">
					<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
						<div class="form-controls col-xs-8 col-sm-9">
							<input type="text" class="input-text" value="{{$emp->name}}" placeholder="" id="name" name="name">
						</div>
					</div>

					<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
						<div class="form-controls col-xs-8 col-sm-9">
							<input type="text" class="input-text" value="{{$emp->username}}" placeholder="" id="username" name="username">
						</div>
					</div>
					<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
						<div class="form-controls col-xs-8 col-sm-9">
							<input type="text" class="input-text" value="{{$emp->phone}}" placeholder="" id="phone" name="phone">
						</div>
					</div>
					<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
						<div class="form-controls col-xs-8 col-sm-9">
							<input type="text" class="input-text" value="{{$emp->email}}" placeholder="@" name="email" id="email">
						</div>
					</div>
					<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3">所在部门：</label>
						<div class="form-controls col-xs-8 col-sm-9">
							<input type="text" class="input-text" value="{{$emp->dept->dept_name}}" placeholder="@" name="dept" id="dept">
						</div>
					</div>
					{{csrf_field()}}

				</form>
			</div>
		</div>
	</div>
	<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/lib/layer/3.1.1/layer.js"></script>
	<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>

	<!--/_footer /作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
  <script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
  <script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
  <script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>
  <script type="text/javascript" src="/lib/webuploader/0.1.5/webuploader.min.js"></script>
  <script type="text/javascript" src="/lib/ueditor/1.4.3/ueditor.config.js"></script>
  <script type="text/javascript" src="/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
  <script type="text/javascript" src="/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
  <script type="text/javascript" src="/static/business/js/main.js"></script>
	<script type="text/javascript">
		$(function(){
			/* 通过iCheck插件，美化checkbox */
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			/*长文本设置*/
			$(".textarea-article").Huitextarealength({
				minlength: 10,
				maxlength: 500
			});

			/* 表单验证，提交 */

		});
		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
