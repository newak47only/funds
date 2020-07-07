﻿
<?php $__env->startSection('content'); ?>
<body>
	<div class="wap-container">
		<nav class="breadcrumb" style="background-color:#fff;padding: 0 24px">
			首页
			<span class="c-gray en">/</span>
			全市流转项目管理
			<span class="c-gray en">/</span>
			本人发布项目表
			<a class="btn btn-success radius f-r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>

		<article class="Hui-admin-content clearfix">

			<div class="panel ">
				<div class="panel-body">
					<div class="mt-20 clearfix">
						<span class="f-l">
							<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 项目终止</a>
							<a href="javascript:;" onclick="information_add('添加洽谈项目','/information/tccreate')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加洽谈项目</a>
						</span>	
					</div>
					<div class="mt-20 clearfix">
						<table class="table table-border table-bordered table-bg table-hover table-sort">
									<thead>
										<tr class="text-c">
											<th width="25"><input type="checkbox" name="" value=""></th>
											<th width="40">ID</th>
											<th width="220">项目名称</th>
											<th width="80">项目国别</th>
											<th width="110">所属行业</th>
											<th width="100">首谈地</th>
											<th width="100">首谈联系人</th>
											<th width="100">流转方向</th>
											<th width="100">流转时间</th>
											<th width="120">流转状态</th>
											<th width="480">操作</th>
										</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $information1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr class="text-c">
											<td ><input type="checkbox" value="<?php echo e($v->id); ?>" name="ID"></td>
											<td ><?php echo e($v->id); ?></td>
											<td class="text-l" ><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','<?php echo e(route('information.show',$v->id)); ?>','<?php echo e($v->id); ?>')" title="查看"><?php echo e($v->name); ?></u></td>
											<td><?php echo e($v->country); ?></td>
											<td><?php echo e($v->industry); ?></td>
											<td > 
											<?php if(empty($v->emp_id) && $v->process == 21): ?>
													等待分派
											<?php elseif(empty($v->emp_id) && $v->process == 22): ?>
													等待分派审核
											<?php else: ?>
												<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($n->id == $v->emp_id): ?>
													<?php echo e($n->dept->dept_name); ?>

													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											</td>
		
											<td>
											<?php if(empty($v->emp_id) && $v->process == 21): ?>
											等待分派
											<?php elseif(empty($v->emp_id) && $v->process == 22): ?>
											等待分派审核
											<?php elseif(empty($v->emp_id) && $v->process == 23): ?>
												等待	<?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($n->id == $v->status): ?>
														<?php echo e($n->dept_name); ?>

													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												分派
											<?php else: ?>
												<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($n->id == $v->emp_id): ?>
														<u style="cursor:pointer" class="text-primary" onClick="information_show('查看首谈联系人信息','<?php echo e(route('emp.show',$v->emp_id)); ?>','$v->emp_id}}')" title="查看首谈联系人信息"><?php echo e($n->username); ?></u>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											</td>

											<td> 
											<?php if(empty($v->circule_to)): ?>

											暂无流转方向
											<?php else: ?>
												<?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($n->id == $v->circule_to): ?>
														<span class="badge badge-success radius"><?php echo e($n->dept_name); ?></span>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											</td>
											<td>
											<?php if($v->process > 0 && $v->process < 21 ): ?>
												<?php $__currentLoopData = $v->info_nego; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($k->actiontype == 1 ): ?>
														<?php echo e($k->created_at->format('y-m-d')); ?>

													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php else: ?>
													暂无流转
											<?php endif; ?>
											</td>
											<td>
												<?php if($v->process ==0 ): ?>
												暂无流转
												<?php elseif($v->process == 1): ?>
												等待区流转审核
												<?php elseif($v->process == 2): ?>
												等待市流转审核
												<?php elseif($v->process == 3): ?>
												等待分派项目跟踪人
												<?php elseif($v->process == 4): ?>
												等待项目认领
												<?php elseif($v->process >20 && $v->process <22): ?>
												暂无流转

												<?php elseif($v->process == 23): ?>
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
												<button type="submit"  href="javascript:;" onclick="recode_add('查看流转详情','/recode/add/<?php echo e($v->id); ?>')"  class="btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6e6;</i>&nbsp;&nbsp;推进记录&nbsp;&nbsp;&nbsp;</button>
												<?php if($v->process == 21): ?>
												<button type="submit"  href="javascript:;" onclick="recode_add('项目分派','/circule/tcadd/<?php echo e($v->id); ?>')"  class="btn btn-danger radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe666;</i>&nbsp;&nbsp;项目分派&nbsp;&nbsp;&nbsp;</button>
												<?php elseif($v->process == 22): ?>
												<button type="submit"  href="javascript:;" onclick=""  class="btn btn-disabled radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe666;</i>&nbsp;&nbsp;等待审核&nbsp;&nbsp;&nbsp;</button>
												<?php else: ?>
												<button type="submit"  href="javascript:;" onclick=""  class="btn btn-disabled radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe666;</i>&nbsp;&nbsp;项目分派&nbsp;&nbsp;&nbsp;</button>
												<?php endif; ?>
												<?php if($v->process == 4): ?>
												<button type="submit"  href="javascript:;" onclick="recode_add('重置流转','/cirreset/<?php echo e($v->id); ?>')"  class="btn btn-danger radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6bd;</i>&nbsp;&nbsp;重置流转&nbsp;&nbsp;&nbsp;</button>
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
	function information_add(title,url){
  			var index = layer.open({
    		type: 2,
    		title: title,
    		content: url,
  		});
  			layer.full(index);
		};
  		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/circule/tclist.blade.php ENDPATH**/ ?>