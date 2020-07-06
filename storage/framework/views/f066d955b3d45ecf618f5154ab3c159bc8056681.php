
<?php $__env->startSection('content'); ?>
<body>
	<div class="wap-container">
		<nav class="breadcrumb" style="background-color:#fff;padding: 0 24px">
			首页
			<span class="c-gray en">/</span>
			全市流转项目库
			<span class="c-gray en">/</span>
			全市流转项目库列表
			<a class="btn btn-success radius f-r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>

		<article class="Hui-admin-content clearfix">

			<div class="panel ">
				<div class="panel-body">
				
							<div class="mt-20 clearfix">
								<table class="table table-border table-bordered table-bg table-hover table-sort">
									<thead>
										<tr class="text-c">
											<th width="25"><input type="checkbox" name="" value=""></th>
											<th width="40">ID</th>
											<th width="">项目名称</th>
											<th width="100">项目国别</th>
											<th width="100">所属行业</th>
											<th width="130">投资金额</th>
											<th width="120">首谈联系人</th>
											<th width="120">项目跟踪人</th>
											<th width="100">流转方向</th>
											<th width="140">流转时间</th>
											<th width="260">操作</th>
										</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr class="text-c">
											<td><input type="checkbox" value="<?php echo e($v->id); ?>" name="ID"></td>
											<td><?php echo e($v->id); ?></td>
											<td class="text-l"><?php echo e($v->name); ?></td>
											<td><?php echo e($v->country); ?></td>
											<td><?php echo e($v->industry); ?></td>
											<td><?php echo e($v->investment); ?><?php if($v->currency =="1"): ?>万人民币<?php elseif($v->currency =="2"): ?>万美元<?php elseif($v->currency =="3"): ?>万欧元<?php endif; ?></td>
											<td>
												<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($n->id == $v->emp_id): ?>
												<u style="cursor:pointer" class="text-primary" onClick="information_show('查看联系人信息','<?php echo e(route('emp.show',$v->emp_id)); ?>','$v->emp_id}}')" title="查看联系人信息"><?php echo e($n->username); ?></u>
												<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</td>
											<td>
												<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($n->id == $v->check_id): ?>
												<u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目跟踪人信息','<?php echo e(route('emp.show',$v->check_id)); ?>','$v->check_id}}')" title="查看项目跟踪人信息"><?php echo e($n->username); ?></u>
												<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</td>
											<td>
												<?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($m->id == $v->circule_to): ?>
												<span class="badge badge-success radius"><?php echo e($m->dept_name); ?></span>
												<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</td>
											<td>
												<?php $__currentLoopData = $v->info_nego; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($k->actiontype == 3 ): ?>
														<?php echo e($k->created_at->format('Y-m-d')); ?>

													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</td>

											<td class="td-manage">
												<button type="submit"  href="javascript:;" onclick="cricule_view('查看流转详情','/recode/<?php echo e($v->id); ?>')"  class="f-l ml-10  mt-5 mb-5 btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;查看流转记录&nbsp;&nbsp;&nbsp;</button>
												<?php if($v->is_claim == '0' ): ?>
												<button type="submit"  href="javascript:;" onclick="circule_claim(this,'<?php echo e($v->id); ?>')"  class="f-l ml-10  mt-5 mb-5 btn btn-danger radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size:16px">&#xe640;</i>&nbsp;&nbsp;项目认领&nbsp;&nbsp;&nbsp;</button>
												<?php elseif($v->is_claim == '1' ): ?>
												<button type="submit"  href="javascript:;" onclick=""  class="f-l ml-10  mt-5 mb-5 btn btn-disabled radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size:16px">&#xe640;</i>&nbsp;&nbsp;项目认领&nbsp;&nbsp;&nbsp;</button>
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
			//禁用搜索
			"searching":false,
		});
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

										
		function cricule_view(title,url){
			var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
			layer.full(index);
		}

	function information_show(title,url,id){
  		var index = layer.open({
		type: 2,
		title: title,
		content: url,
    	area: ['800px', '600px'],
  		});
	}

	function circule_claim(obj,id){
  		layer.confirm('确认要认领项目吗？',{title:'项目认领'},function(index){
            $.ajax({
				type: 'GET',
				url: '/circule/claim/'+id,
				dataType: 'json',
				success: function(data){
					$(obj).parents("tr").remove();
					layer.msg('项目认领成功!',{icon:1,time:2000});
				},
				error:function(data) {
					console.log(data.msg);
				},
			});
  		});
	}
  		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/circule/list_all.blade.php ENDPATH**/ ?>