
<?php $__env->startSection('content'); ?>
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">

				
				<form action="/circule/rupdate/<?php echo e($information->id); ?>" method="POST"  class="form form-horizontal" id="form-admin-add" >
						<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>流转方向：</label>
						<div class="form-controls col-xs-8 col-sm-9 skin-minimal">
							<?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($val->id == 0): ?>
							<div class="radio-box">
								<input type="radio"  placeholder="" id="radio-2" name="status" value="<?php echo e($val->id); ?>" checked>
								<label for="radio-2"><?php echo e($val->dept_name); ?></label>
							</div>

							<?php elseif($val->id != 6 && $val->id != 13 && $val->id != 1 && $val->id != 2 && $val->id != $admin_deptid  ): ?>
							<div class="radio-box">
								<input type="radio"  placeholder="" id="radio-2" name="status" value="<?php echo e($val->id); ?>">
								<label for="radio-2"><?php echo e($val->dept_name); ?></label>
							</div>
							<?php endif; ?>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</div>
					</div>

    				<input type="hidden" name="info_id" value="<?php echo e($information->id); ?>">
    				<input type="hidden" name="investment" value="<?php echo e($information->investment); ?>">
					<input type="hidden" name="currency" value="<?php echo e($information->currency); ?>">
    				<input type="hidden" name="eaction" value="<?php echo e($eaction); ?>">
    				<input type="hidden" name="actiontype" value="<?php echo e($actiontype); ?>">
    				<input type="hidden" name="remark" value="<?php echo e($remark); ?>">

					<?php echo e(csrf_field()); ?>

					<?php echo e(method_field('POST')); ?>



					<div class="row clearfix">
						<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
							<button class="btn btn-primary radius" type="submit" name="result" value="1">项目分发</button>
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
	<script type="text/javascript">
		$(function(){
			/* 通过iCheck插件，美化checkbox */
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			$("#form-admin-add").validate({
				rules:{
					report:{
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
								layer.msg('项目分发成功！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('项目分发失败！',{ icon: 2,time:2000});
							}
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg('项目分发错误！',{ icon: 1,time:1000});
						}
					});
				}
			});

			
		});

		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/circule/check.blade.php ENDPATH**/ ?>