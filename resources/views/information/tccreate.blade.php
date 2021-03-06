@extends('layouts.app')
@section('content')
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">
				<form action="information/tcstore" method="post" class="form form-horizontal" id="form-informatian-add">
<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目名称：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="{{ old('name') }}" placeholder="" id="name" name="name" >
							@error('name')
    						<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目国别：</label>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box" >
							<select class="select" name="continent_id" >
								<option value="0">洲</option>
								@foreach($continent as $v)
              					<option value="{{$v->YAT_ID}}">{{$v->YAT_CNNAME}}</option>
              					@endforeach            			
							</select>
							</span>
						</div>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box" >
							<select class="select" name="country_id" >
              					<option value="0">国家</option>          			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>行业类别：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box">
							<select class="select" name="industry" size="1">
								@foreach($industry as $i)
              					<option value="{{$i->name}}">{{$i->name}}</option>  
              					@endforeach          			
							</select>
							</span>
						</div>
					</div>

					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>货币类型：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box" >
							<select class="select" name="currency" >
              					<option value="1">人民币</option>
              					<option value="2">美元</option>
              					<option value="3">欧元</option>             			
							</select>
							</span>
						</div>
					</div>

					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>投资金额：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="{{ old('investment') }}" placeholder="注意：投资金额货币单位为（万元）" id="investment" name="investment">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资方负责人：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="{{ old('cont_main') }}" placeholder="" id="cont_main" name="cont_main">
							@error('cont_main')
    						<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>主要投资方：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="{{ old('cont_unit') }}" placeholder="" id="cont_unit" name="cont_unit">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资方联系人：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="{{ old('cont_name') }}" placeholder="" id="cont_name" name="cont_name">
							@error('cont_name')
    						<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>联系方式：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" placeholder="" value="{{ old('cont_phone') }}" name="cont_phone" id="cont_phone">
							@error('cont_phone')
    						<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>重大项目：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box">
							<select class="select" name="major_pro" size="1">
								<option value="0">非重大项目</option> 
								@foreach($majorproject as $s)
              					<option value="{{$s->id}}">{{$s->p_name}}</option>  
              					@endforeach          			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-12" >
						<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>项目简介：</label>
						<div class="form-controls col-xs-8 col-sm-11">
							<textarea name="content" cols="" rows=""  class="textarea textarea-article" value="{{ old('content') }}"  placeholder="项目简介" dragonfly="true" onKeyUp="textarealength(this,800)"></textarea>
							<p class="textarea-numberbar">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-12" >
						<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>项目诉求：</label>
						<div class="form-controls col-xs-8 col-sm-11">
							<textarea name="appeal" cols="" rows=""  class="textarea textarea-article" value="{{ old('appeal') }}"  placeholder="项目诉求" dragonfly="true" onKeyUp="textarealength(this,800)"></textarea>
							<p class="textarea-numberbar">
						</div>
					</div>
					<input type="hidden" name="process" value="21">
					<input type="hidden" name="issuer_id" value="{{$emp_id}}">
					<input type="hidden" name="check_id" value="{{$emp_id}}">
					{{csrf_field()}}
					{{method_field('POST')}}
					<div class="row clearfix">
						<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
							<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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

						$('select[name = continent_id ]').change(function(){
				var id = $(this).val();
				$.get('/information/getAreaId',{id:id},function(country){
					var str= '';
					$.each(country,function(index,el){
						str +="<option value='"+el.YAT_ID+"'>"+el.YAT_CNNAME+"</option>";

					});
					$('select[name = country_id ]').find('option:gt(0)').remove();
					$('select[name = country_id ]').append(str);


				},'json');
			});
			/* 通过iCheck插件，美化checkbox */
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			/*长文本设置*/
			$(".textarea-article").Huitextarealength({
				minlength: 10,
				maxlength: 800
			});

			/* 表单验证，提交 */
			$("#form-informatian-add").validate({
				rules:{
					name:{
						required:true,
						maxlength:50
					},
					cont_name:{
						required:true,
					},
					cont_phone:{
						required:true,
						isPhone:true,
					},
					currency:{
						required:true,
					},
					investment:{
						required:true,
					},
					industry:{
						required:true,
						maxlength:16
					},
					cont_main:{
						required:true,
						maxlength:50
					},
					cont_unit:{
						required:true,
						maxlength:50
					},
					content:{
						required:true,
						maxlength:800
					},
					appeal:{
						required:true,
						maxlength:800
					},
					
				},
				onkeyup:false,
				focusCleanup:true,
				success:"valid",
				submitHandler:function(form){
					$(form).ajaxSubmit({
						type:'post',
						url:"/information/tcstore",
						success:function(data){
							if( data == '1'){
								layer.msg('洽谈项目添加成功！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('洽谈项目添加失败！',{ icon: 2,time:2000});
							}
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg("洽谈项目添加错误",{ icon: 2,time:1000});
						}
					});
				}
			});
		});
		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
