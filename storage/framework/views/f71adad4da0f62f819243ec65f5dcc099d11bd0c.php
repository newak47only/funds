﻿
<?php $__env->startSection('content'); ?>
<body>
	<div class="wap-container">
		<nav class="breadcrumb" style="background-color:#fff;padding: 0 24px">
			首页
			<span class="c-gray en">/</span>
			全市流转项目管理
			<span class="c-gray en">/</span>
			本人跟踪项目列表
			<a class="btn btn-success radius f-r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>

		<article class="Hui-admin-content clearfix">

			<div class="panel ">
				<div class="panel-body">
					<div class="mt-20 clearfix">
						<span class="f-l">
							<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 项目终止</a>
						</span>
						
					</div>		
					<div class="mt-20 clearfix">
						<table class="table table-border table-bordered table-bg table-hover table-sort">
							<thead>
								<tr class="text-c">
									<th width="25"><input type="checkbox" name="" value=""></th>
									<th width="40">ID</th>
									<th width="200">项目名称</th>
									<th width="80">项目国别</th>
									<th width="100">资方联系人</th>
									<th width="100">资方联系方式</th>
									<th width="100">首谈联系人</th>
									<th width="100">跟踪负责人</th>
									<th width="80">流转方向</th>
									<th width="100">流转时间</th>
									<th width="120">流转状态</th>
									<th width="330 ">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<tr class="text-c">
									<td ><input type="checkbox" value="<?php echo e($v->id); ?>" name="ID"></td>
									<td ><?php echo e($v->id); ?></td>
									<td class="text-l" ><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','<?php echo e(route('information.show',$v->id)); ?>','$v->id}}')" title="查看"><?php echo e($v->name); ?></u></td>
									<td><?php echo e($v->info_area->YAT_CNNAME); ?></td>
									<td > <?php echo e($v->cont_name); ?></td>
									<td > <?php echo e($v->cont_phone); ?></td>
									<td >
									<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($n->id == $v->emp_id): ?>
									<u style="cursor:pointer" class="text-primary" onClick="information_show('查看首谈联系人信息','<?php echo e(route('emp.show',$v->emp_id)); ?>','$v->emp_id}}')" title="查看首谈联系人信息"><?php echo e($v->staff_name); ?></u>
									<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</td>
									<td>
										<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($m->id == $v->check_id): ?>
												<u style="cursor:pointer" class="text-primary" onClick="information_show('查看跟踪人信息','<?php echo e(route('emp.show',$m->id)); ?>','$m->id}}')" title="查看跟踪人信息"><?php echo e($m->username); ?></u>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
									</td>
									<td >
										<?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($n->id == $v->circule_to): ?>
												<?php echo e($n->dept_name); ?>

											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</td>
									<td>
										<?php $__currentLoopData = $v->info_nego; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($k->actiontype == 1 ): ?>
												<?php echo e($k->created_at->format('y-m-d')); ?>

											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</td>
									<td>
										<?php if($v->process == 4): ?>
										等待认领...
										<?php elseif($v->process == 5): ?>
											<?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($m->id == $v->circule_to): ?>
													等待<?php echo e($m->dept_name); ?>分发
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php elseif($v->process == 6): ?>
											<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($m->id == $v->circule_id): ?>
													<u style="cursor:pointer" class="text-primary" onClick="information_show('查看联系人信息','<?php echo e(route('emp.show',$m->id)); ?>','$m->id}}')" title="查看联系人信息"><?php echo e($m->username); ?></u>流转中
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									</td>
									
									<td class="td-manage">
										<button type="submit"  href="javascript:;" onclick="cricule_view('查看流转详情','/recode/<?php echo e($v->id); ?>')"  class="btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;查看记录&nbsp;&nbsp;&nbsp;</button>
										<button type="submit"  href="javascript:;" onclick="recode_add('添加推进记录','/recode/add/<?php echo e($v->id); ?>')"  class="btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6e6;</i>&nbsp;&nbsp;推进记录&nbsp;&nbsp;&nbsp;</button>
										<?php if($v->process == '4' || $v->process == '5' ): ?>	
										<button type="submit"  href="javascript:;" onclick="information_show('重置流转','/circule/cirreset/<?php echo e($v->id); ?>')"  class="btn btn-danger radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6bd;</i>&nbsp;&nbsp;重置流转&nbsp;&nbsp;&nbsp;</button>
										<?php else: ?>
										<button type="submit"  href="javascript:;" onclick=""  class="btn btn-disabled radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6bd;</i>&nbsp;&nbsp;重置流转&nbsp;&nbsp;&nbsp;</button>
										<?php endif; ?>	
									</td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      $(".table").HuicheckAll(
        {
          checkboxAll: 'thead input[type="checkbox"]',
          checkbox: 'tbody input[type="checkbox"]'
        },
        function(checkedInfo) {
          console.log(checkedInfo);
        }
      )
		});
		$("#tab-system").Huitab();

		$('table').dataTable({
			//禁掉第一列排序
			"aoColumnDefs":[{"bSortable":false,"aTargets":[0]}],
			//默认在初始化的时候按照指定列排序
			"aaSorting":[[1,"asc"]],

		});


		function negotiation_create(title,url,id){

			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
	}
										
		function cricule_view(title,url){
  			var index = layer.open({
    		type: 2,
    		title: title,
    		content: url,
  		});
  			layer.full(index);
		};


	function information_show(title,url,id){
  		var index = layer.open({
		type: 2,
		title: title,
		content: url,
    	area: ['800px', '600px'],
  		});
	}

	function recode_add(title,url,id){
  		var index = layer.open({
		type: 2,
		title: title,
		content: url,
    	area: ['800px', '600px'],
  		});
	}
  		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/circule/tctracklist.blade.php ENDPATH**/ ?>