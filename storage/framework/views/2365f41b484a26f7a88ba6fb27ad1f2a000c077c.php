
<?php $__env->startSection('content'); ?>
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">
				<form action="<?php echo e(route('information.update',$information->id)); ?>" method="post" class="form form-horizontal" id="form-informatian-update">
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目名称：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text"  placeholder="" id="name" value="<?php echo e($information->name); ?>" name="name">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目国别：</label>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box" >
							<select class="select" name="continent_id" >
								<option value="<?php echo e($information->continent_id); ?>" selected="selected"><?php echo e($information->info_continent->YAT_CNNAME); ?></option>
								<?php $__currentLoopData = $continent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              					<option value="<?php echo e($v->YAT_ID); ?>"><?php echo e($v->YAT_CNNAME); ?></option>
              					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            			
							</select>
							</span>
						</div>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box" >
							<select class="select" name="country_id" >
              					<option value="<?php echo e($information->country_id); ?>" selected="selected"><?php echo e($information->info_area->YAT_CNNAME); ?></option>          			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>行业类别：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box" >
							<select class="select" name="industry" >
								<option value="<?php echo e($information->industry); ?>" selected="selected"><?php echo e($information->industry); ?></option>
								<?php $__currentLoopData = $industry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              					<option value="<?php echo e($v->name); ?>"><?php echo e($v->name); ?></option>
              					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>货币类型：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box" >
							<select class="select"  name="currency" size="1">
              					<option value="<?php echo e($information->currency); ?>" selected="selected"><?php if($information->currency =="1"): ?>人民币<?php elseif($information->currency =="2"): ?>美元<?php endif; ?></option>
              					<option value="1">人民币</option>
              					<option value="2">美元</option>
              					<option value="3">欧元</option>             			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>投资金额：：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" placeholder="投资金额" name="investment" id="investment" value="<?php echo e($information->investment); ?>">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资方负责人：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="<?php echo e($information->cont_main); ?>" placeholder="" id="cont_main" name="cont_main">
							<?php $__errorArgs = ['cont_main'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    						<div class="alert alert-danger"><?php echo e($message); ?></div>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>主要投资方：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="<?php echo e($information->cont_unit); ?>" placeholder="" id="cont_unit" name="cont_unit">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资方联系人：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text"  placeholder="" id="cont_name" name="cont_name" value="<?php echo e($information->cont_name); ?>">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>联系方式：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" placeholder="" value="<?php echo e($information->cont_phone); ?>" id="cont_phone" name="cont_phone">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>重大项目：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box">
								<select class="select" name="major_pro" size="1">
								<?php if($information->majorpro == 0): ?>
								<option value="0" selected="selected">非重大项目</option> 
								<?php else: ?>
								<option value="<?php echo e($information->major_pro); ?>" selected="selected"><?php echo e($information->info_major->p_name); ?></option> 
								<?php endif; ?>
							
								
								<?php $__currentLoopData = $majorproject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              					<option value="<?php echo e($s->id); ?>"><?php echo e($s->p_name); ?></option>  
              					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-12" >
						<label class="form-label col-xs-4 col-sm-1">项目简介：</label>
						<div class="form-controls col-xs-8 col-sm-11">
							<textarea name="content"  cols="" rows=""  class="textarea textarea-article"   dragonfly="true" onKeyUp="textarealength(this,800)"><?php echo e($information->content); ?>"</textarea>
							<p class="textarea-numberbar">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-12" >
						<label class="form-label col-xs-4 col-sm-1">项目诉求：</label>
						<div class="form-controls col-xs-8 col-sm-11">
							<textarea name="appeal"  cols="" rows=""  class="textarea textarea-article"  placeholder="项目诉求300个字符以内" dragonfly="true" onKeyUp="textarealength(this,800)"><?php echo e($information->appeal); ?></textarea>
							<p class="textarea-numberbar">
						</div>
					</div>
					<input type="hidden" name="emp_id" value="<?php echo e($information->emp_id); ?>">
					<?php echo e(csrf_field()); ?>

					<?php echo e(method_field('PUT')); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/information/edit.blade.php ENDPATH**/ ?>