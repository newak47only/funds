
<?php $__env->startSection('content'); ?>
<body>
	<div class="wap-container">
		

		<article class="Hui-admin-content clearfix">

			<div class="panel ">
				<div class="panel-body">
					
					<div class=" clearfix text-c"><h3><?php echo e($information->name); ?></h3><br/>
					<h4>
					<?php if($information->circule_id == 0): ?>
					实际到位资金
					<?php else: ?>
					实际到位资金（首谈地 <?php echo e($information->circule_f_dept); ?> 10%；落户地 <?php echo e($information->circule_n_dept); ?> 90%）
					<?php endif; ?>
					</h4>
						<table class="table table-border table-bordered table-bg table-hover table-sort">
							<thead>
								<tr class="text-c">
									<?php $__currentLoopData = $fund; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><?php echo e($v['year']); ?>年度</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</thead>
							<tbody>
								<tr class="text-c">
									<?php $__currentLoopData = $fund; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><a href="/statistics/edit/<?php echo e($v['id']); ?>" > <?php echo e($v['data']); ?></a>
										<?php if($v['currency'] =='0'): ?>万人民币
										<?php elseif($v['currency'] =='1'): ?>万美元
										<?php elseif($v['currency'] =='2'): ?>万欧元
										<?php endif; ?>
									</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</tbody>
						</table>
					</div>
					<div class=" clearfix text-c">
						<h4>
							<?php if($information->circule_id == 0): ?>
							GDP
							<?php else: ?>
							GDP（首谈地 <?php echo e($information->circule_f_dept); ?> 50%；落户地 <?php echo e($information->circule_n_dept); ?> 50%）
							<?php endif; ?>
						</h4>
						<table class="table table-border table-bordered table-bg table-hover table-sort">
							<thead>
								<tr class="text-c">
									<?php $__currentLoopData = $gdp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><?php echo e($v['year']); ?>年度</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</thead>
							<tbody>
								<tr class="text-c">
									<?php $__currentLoopData = $gdp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><a href="/statistics/edit/<?php echo e($v['id']); ?>" > <?php echo e($v['data']); ?></a>
										<?php if($v['currency'] =='0'): ?>万人民币
										<?php elseif($v['currency'] =='1'): ?>万美元
										<?php elseif($v['currency'] =='2'): ?>万欧元
										<?php endif; ?>
									</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</tbody>
						</table>
					</div>
					<div class=" clearfix text-c"><h4>土地指标</h4>
						<table class="table table-border table-bordered table-bg table-hover table-sort">
							<thead>
								<tr class="text-c">
									<?php $__currentLoopData = $land; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><?php echo e($v['year']); ?>年度</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</thead>
							<tbody>
								<tr class="text-c">
									<?php $__currentLoopData = $land; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><a href="/statistics/edit/<?php echo e($v['id']); ?>" > <?php echo e($v['data']); ?></a>
										<?php if($v['currency'] =='0'): ?>万人民币
										<?php elseif($v['currency'] =='1'): ?>万美元
										<?php elseif($v['currency'] =='2'): ?>万欧元
										<?php endif; ?>
									</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</tbody>
						</table>
					</div>
					<div class=" clearfix text-c">
						<h4>
							<?php if($information->circule_id == 0): ?>
							留存部分税收
							<?php else: ?>
							留存部分税收（首谈地<?php echo e($information->circule_f_dept); ?> 10%；落户地 <?php echo e($information->circule_n_dept); ?> 90%）
							<?php endif; ?>
						</h4>
						<table class="table table-border table-bordered table-bg table-hover table-sort">
							<thead>
								<tr class="text-c">
									<?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><?php echo e($v['year']); ?>年度</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</thead>
							<tbody>
								<tr class="text-c">
									<?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><a href="/statistics/edit/<?php echo e($v['id']); ?>" > <?php echo e($v['data']); ?></a>
										<?php if($v['currency'] =='0'): ?>万人民币
										<?php elseif($v['currency'] =='1'): ?>万美元
										<?php elseif($v['currency'] =='2'): ?>万欧元
										<?php endif; ?>
									</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</tbody>
						</table>
					</div>
					<div class=" clearfix text-c">
						<h4>
						总投入
						</h4>
						<table class="table table-border table-bordered table-bg table-hover table-sort">
							<thead>
								<tr class="text-c">
									<?php $__currentLoopData = $putinto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><?php echo e($v['year']); ?>年度</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</thead>
							<tbody>
								<tr class="text-c">
									<?php $__currentLoopData = $putinto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<th width=""><a href="/statistics/edit/<?php echo e($v['id']); ?>" > <?php echo e($v['data']); ?></a>
										<?php if($v['currency'] =='0'): ?>万人民币
										<?php elseif($v['currency'] =='1'): ?>万美元
										<?php elseif($v['currency'] =='2'): ?>万欧元
										<?php endif; ?>
									</th>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</article>
	</div>

	<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/lib/layer/3.1.1/layer.js"></script>
	<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
	<!--/_footer /作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="/lib/datatables/1.10.15/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="/lib/laypage/1.2/laypage.js"></script>
	<script type="text/javascript" src="/static/business/js/main.js"></script>
	<script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
	<script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
	<script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>


	<script type="text/javascript">
	$(function(){
			runDatetimePicker();
      // 全选 页面调用
  
			function information_add(title,url){
  			var index = layer.open({
    		type: 2,
    		title: title,
    		content: url,
  		});
  			layer.full(index);
		}

		function information_edit(title,url,id){
			var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
			layer.full(index);
		}

										
		function negotiation_create(title,url){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
	}
  		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/statistics/show.blade.php ENDPATH**/ ?>