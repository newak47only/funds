
<?php $__env->startSection('content'); ?>
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body" >
				<form action="<?php echo e(route('information.store')); ?>" method="post" class="form form-horizontal" id="form-informatian-add">
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目名称：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="<?php echo e(old('name')); ?>" placeholder="" id="name" name="name" >
							<?php $__errorArgs = ['name'];
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
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目国别：</label>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box" >
							<select class="select" name="continent_id" >
								<option value="">洲</option>
								<?php $__currentLoopData = $continent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              					<option value="<?php echo e($v->YAT_ID); ?>"><?php echo e($v->YAT_CNNAME); ?></option>
              					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            			
							</select>
							</span>
						</div>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box" >
							<select class="select" name="country_id" >
              					<option value="">国家</option>          			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>行业类别：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<span class="select-box">
							<select class="select" name="industry" size="1">
								<?php $__currentLoopData = $industry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              					<option value="<?php echo e($i->name); ?>"><?php echo e($i->name); ?></option>  
              					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          			
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
							<input type="text" class="input-text" value="<?php echo e(old('investment')); ?>" placeholder="注意：投资金额货币单位为（万元）" id="investment" name="investment">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资方负责人：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="<?php echo e(old('cont_main')); ?>" placeholder="" id="cont_main" name="cont_main">
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
							<input type="text" class="input-text" value="<?php echo e(old('cont_unit')); ?>" placeholder="" id="cont_unit" name="cont_unit">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-6" >
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资方联系人：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" value="<?php echo e(old('cont_name')); ?>" placeholder="" id="cont_name" name="cont_name">
							<?php $__errorArgs = ['cont_name'];
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
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>联系方式：</label>
						<div class="form-controls col-xs-8 col-sm-10">
							<input type="text" class="input-text" placeholder="" value="<?php echo e(old('cont_phone')); ?>" name="cont_phone" id="cont_phone">
							<?php $__errorArgs = ['cont_phone'];
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
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>重大项目：</label>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box">
							<select class="select" name="level" size="1">
								<option value="0">重大项目类型</option> 
								<?php $__currentLoopData = $projectlevel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              					<option value="<?php echo e($s->id); ?>"><?php echo e($s->name); ?></option>  
              					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          			
							</select>
							</span>
						</div>
						<div class="form-controls col-xs-8 col-sm-5">
							<span class="select-box">
							<select class="select" name="major_pro" size="1">
								<option value="0">主要投资方规模</option> 
								<?php $__currentLoopData = $majorproject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              					<option value="<?php echo e($s->id); ?>"><?php echo e($s->p_name); ?></option>  
              					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          			
							</select>
							</span>
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-12" >
						<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>项目简介：</label>
						<div class="form-controls col-xs-8 col-sm-11">
							<textarea name="content" cols="" rows=""  class="textarea textarea-article" value="<?php echo e(old('content')); ?>"  placeholder="项目简介" dragonfly="true" onKeyUp="textarealength(this,800)"></textarea>
							<p class="textarea-numberbar">
						</div>
					</div>
					<div class="row clearfix col-xs-12 col-sm-12" >
						<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>项目诉求：</label>
						<div class="form-controls col-xs-8 col-sm-11">
							<textarea name="appeal" cols="" rows=""  class="textarea textarea-article" value="<?php echo e(old('appeal')); ?>"  placeholder="项目诉求" dragonfly="true" onKeyUp="textarealength(this,800)"></textarea>
							<p class="textarea-numberbar">
						</div>
					</div>
					<input type="hidden" name="emp_id" value="<?php echo e($emp_id); ?>">
					<input type="hidden" name="issuer_id" value="<?php echo e($emp_id); ?>">
					<input type="hidden" name="staff_name" value="<?php echo e($emp->username); ?>">
					<input type="hidden" name="staff_phone" value="<?php echo e($emp->phone); ?>">
					<?php echo e(csrf_field()); ?>

					<div class="row clearfix">
						<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
							<input class="btn btn-primary radius mt-20" type="submit" value="&nbsp;&nbsp;添  加&nbsp;&nbsp;">
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
					country_id:{
						required:true,
					},
					continent_id:{
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
						url:"<?php echo e(route('information.store')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/information/create.blade.php ENDPATH**/ ?>