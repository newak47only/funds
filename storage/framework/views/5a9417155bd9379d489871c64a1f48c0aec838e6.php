
<?php $__env->startSection('content'); ?>
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">
				<table class="table table-border table-bordered table-hover">
      				<tbody>
      					<tr>
      						<th class="text-c">相似比率</th>
      						<th class="text-c">相似数量</th>
      					</tr>
      					<tr>
      						<td class="text-c">100%</td>
      						<td class="text-c"><?php if($hundredper != 0): ?><u style="cursor:pointer" class="text-primary" onClick="information_show('查看相似项目','/comparison/hundredper/<?php echo e($info_id); ?>')" title="查看相似项目"><?php echo e($hundredper); ?></u><?php else: ?> <?php echo e($hundredper); ?> <?php endif; ?>
                  </td>
      					</tr>
      					<tr>
      						<td class="text-c">80%</td>
      						<td class="text-c"><?php if($eightper != 0): ?><u style="cursor:pointer" class="text-primary" onClick="information_show('查看相似项目','/comparison/eightper/<?php echo e($info_id); ?>')" title="查看相似项目"><?php echo e($eightper); ?></u><?php else: ?> <?php echo e($eightper); ?> <?php endif; ?></td>
      					</tr>
      					<tr>
      						<td class="text-c">60%</td>
      						<td class="text-c"><?php if($sixtyper != 0): ?><u style="cursor:pointer" class="text-primary" onClick="information_show('查看相似项目','/comparison/sixtyper/<?php echo e($info_id); ?>')" title="查看相似项目"><?php echo e($sixtyper); ?></u><?php else: ?> <?php echo e($sixtyper); ?> <?php endif; ?></td>
      					</tr>
      					<tr>
      						<td class="text-c">40%</td>
      						<td class="text-c"><?php if($fourtyper != 0): ?><u style="cursor:pointer" class="text-primary" onClick="information_show('查看相似项目','/comparison/fourtyper/<?php echo e($info_id); ?>')" title="查看相似项目"><?php echo e($fourtyper); ?></u><?php else: ?> <?php echo e($fourtyper); ?> <?php endif; ?></td>
      					</tr>
      					<tr>
      						<td class="text-c">20%</td>
      						<td class="text-c"><?php if($twoper != 0): ?><u style="cursor:pointer" class="text-primary" onClick="information_show('查看相似项目','/comparison/twoper/<?php echo e($info_id); ?>')" title="查看相似项目"><?php echo e($twoper); ?></u><?php else: ?> <?php echo e($twoper); ?> <?php endif; ?></td>
      					</tr>
      					
      				</tbody>
      			</table>

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


		function information_show(title,url){
  			var index = layer.open({
    		type: 2,
    		title: title,
    		content: url,
    		area: ['800px', '600px'],
        maxmin: true,

			});
		}
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/comparison/comresult.blade.php ENDPATH**/ ?>