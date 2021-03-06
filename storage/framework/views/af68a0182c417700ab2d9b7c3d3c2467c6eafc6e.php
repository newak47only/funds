
<?php $__env->startSection('content'); ?>
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">

				
				<form action="/circule/tccheckupdate/<?php echo e($information->id); ?>" method="POST"  class="form form-horizontal" id="form-admin-add" >
				<div class="row clearfix">
					<table class="table table-border table-bordered" style="width: 600px; margin-left: 100px">
      				<tbody>
       					 <tr>
          					<th class="text-r" width="80">项目名称：</th>
          					<td><?php echo e($information->name); ?></td>
        				</tr>
        				<tr>
          					<th class="text-r">投资金额：</th>
          					<td><?php echo e($information->investment); ?><?php if($information->currency == '1'): ?>万人民币<?php elseif($information->currency == '2'): ?>万美元<?php elseif($information->currency == '3'): ?>万欧元<?php endif; ?>
          					</td>
        				</tr>
        				<tr>
          					<th class="text-r">入库日期：</th>
          					<td><?php echo e($information->created_at); ?></td>
        				</tr>

        				<tr>
          					<th class="text-r">分派方向：</th>
          					<td>
          						<?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($n->id == $information->status): ?>
										<?php echo e($n->dept_name); ?>

									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          					</td>
        				</tr>

        				<tr>
          					<th class="text-r">分派说明：</th>
          					<td><?php echo e($remark); ?></td>
        				</tr>
        				<tr>
          					<th class="text-r">审核意见：</th>
          					<td>
									<textarea type="text" class="textarea" value="" placeholder="" id="remark" name="remark" datatype="*4-16" ></textarea>

							</td>
        				</tr>
      				</tbody>
    				</table>
    			</div>

    				<input type="hidden" name="info_id" value="<?php echo e($information->id); ?>">
    				<input type="hidden" name="investment" value="<?php echo e($information->investment); ?>">
					<input type="hidden" name="currency" value="<?php echo e($information->currency); ?>">
    				<input type="hidden" name="eaction" value="<?php echo e($eaction); ?>">
    				<input type="hidden" name="actiontype" value="<?php echo e($actiontype); ?>">

					<?php echo e(csrf_field()); ?>

					<?php echo e(method_field('POST')); ?>



					<div class="row clearfix">
						<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
							<button class="btn btn-primary radius" type="submit" name="result" value="0">同意分派</button>
							<button class="btn btn-primary radius" type="submit" name="result" value="1">不同意分派</button>
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
								layer.msg('项目分派审核完成！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('项目分派审核失败！',{ icon: 2,time:2000});
							}
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg('项目分派审核错误！',{ icon: 1,time:1000});
						}
					});
				}
			});

			
		});

		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/circule/tccheck.blade.php ENDPATH**/ ?>