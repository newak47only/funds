@extends('layouts.app')
@section('content')
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">
				<form action="{{route('information.update',$information->id)}}" method="post" class="form form-horizontal" id="form-informatian-update">
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目名称：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text"  placeholder="" id="name" value="{{$information->name}}" name="name">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目国别：</label>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box" >
							<select class="select" name="continent_id" >
								<option value="{{$information->continent_id}}" selected="selected">{{$information->info_continent->YAT_CNNAME}}</option>
								@foreach($continent as $v)
              					<option value="{{$v->YAT_ID}}">{{$v->YAT_CNNAME}}</option>
              					@endforeach            			
							</select>
							</span>
						</div>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box" >
							<select class="select" name="country_id" >
              					<option value="{{$information->country_id}}" selected="selected">{{$information->info_area->YAT_CNNAME}}</option>          			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>行业类别：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box" >
							<select class="select" name="industry" >
								<option value="{{$information->industry}}" selected="selected">{{$information->industry}}</option>
								@foreach($industry as $v)
              					<option value="{{$v->name}}">{{$v->name}}</option>
              					@endforeach            			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>货币类型：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box" >
							<select class="select"  name="currency" size="1">
              					<option value="{{$information->currency}}" selected="selected">@if($information->currency =="1")人民币@elseif($information->currency =="2")美元@endif</option>
              					<option value="1">万人民币</option>
              					<option value="2">万美元</option>
              					<option value="3">万欧元</option>             			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>投资金额：：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" placeholder="投资金额" name="investment" id="investment" value="{{$information->investment}}">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资方负责人：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="{{$information->cont_main}}" placeholder="" id="cont_main" name="cont_main">
							@error('cont_main')
    						<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>主要投资方：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="{{$information->cont_unit}}" placeholder="" id="cont_unit" name="cont_unit">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资方联系人：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text"  placeholder="" id="cont_name" name="cont_name" value="{{$information->cont_name}}">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>联系方式：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" placeholder="" value="{{$information->cont_phone}}" id="cont_phone" name="cont_phone">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>重大项目：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box">
								<select class="select" name="major_pro" size="1">
								@if($information->majorpro == 0)
								<option value="0" selected="selected">非重大项目</option> 
								@else
								<option value="{{$information->major_pro}}" selected="selected">{{$information->info_major->p_name}}</option> 
								@endif
								@foreach($majorproject as $s)
              					<option value="{{$s->id}}">{{$s->p_name}}</option>  
              					@endforeach          			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-12" >
						<label class="form-label col-xs-4 col-sm-1">项目简介：</label>
						<div class="form-controls col-xs-8 col-sm-11">
							<textarea name="content"  cols="" rows=""  class="textarea textarea-article"   dragonfly="true" onKeyUp="textarealength(this,800)">{{$information->content}}"</textarea>
							<p class="textarea-numberbar">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-12" >
						<label class="form-label col-xs-4 col-sm-1">项目诉求：</label>
						<div class="form-controls col-xs-8 col-sm-11">
							<textarea name="appeal"  cols="" rows=""  class="textarea textarea-article"  placeholder="项目诉求300个字符以内" dragonfly="true" onKeyUp="textarealength(this,800)">{{$information->appeal}}</textarea>
							<p class="textarea-numberbar">
						</div>
					</div>
					<input type="hidden" name="emp_id" value="{{$information->emp_id}}">
					{{csrf_field()}}
					{{method_field('PUT')}}
					<div class="row clearfix">
						<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
							<input class="btn btn-primary radius mt-20" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
			$("#form-informatian-update").validate({
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

						success:function(data){
							if( data == '1'){
								layer.msg('洽谈项目编辑成功！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('洽谈项目编辑失败！',{ icon: 2,time:2000});
							}
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg("洽谈项目编辑错误",{ icon: 2,time:1000});
						}
					});
				}
			});
		});
		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
