
<?php $__env->startSection('content'); ?>
<body>
	<div class="wap-container">

		<article class="Hui-admin-content clearfix">

			<div class="panel ">
				<div class="panel-body">	
					<div class="mt-20 clearfix">
						<table class="table table-border table-bordered table-bg table-hover table-sort">
							<thead>
								<tr class="text-c">
									<th width="25"><input type="checkbox" name="" value=""></th>
									<th width="40">ID</th>
									<th width="200">项目名称</th>
									<th width="100">项目国别</th>
									<th width="100">所属行业</th>
									<th width="120">项目发布人</th>
									<th width="100">首谈地</th>
									<th width="100">跟踪负责人</th>
									<th width="120">项目状态</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $hundredper; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<tr class="text-c">
									<td ><input type="checkbox" value="<?php echo e($v->id); ?>" name="box"></td>
									<td ><?php echo e($v->id); ?></td>
									<td class="text-l" ><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','<?php echo e(route('information.show',$v->id)); ?>','$v->id}}')" title="查看"><?php echo e($v->name); ?></u></td>
									<td><?php echo e($v->country); ?></td>
									<td><?php echo e($v->industry); ?></td>
									<td >
									<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($n->id == $v->issuer_id): ?>
									<u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目发布人信息','<?php echo e(route('emp.show',$n->id)); ?>','$n->id}}')" title="查看项目发布人信息"><?php echo e($n->username); ?></u>
									<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</td>
									<td >
									<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($n->id == $v->emp_id): ?>
									<?php echo e($n->dept->dept_name); ?>

									<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</td>
									<td >
									<?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($n->id == $v->check_id): ?>
									<u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目跟踪负责人信息','<?php echo e(route('emp.show',$v->check_id)); ?>','$v->check_id}}')" title="查看项目跟踪负责人信息"><?php echo e($n->username); ?></u>
									<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								    </td>

									<td>
									<?php if($v->process == 2): ?>
									等待市商务局审核
									<?php elseif($v->process == 3): ?>
									等待分派跟踪人
									<?php elseif($v->process == 4): ?>
									等待认领...
									<?php elseif($v->process == 5): ?>
										<?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($m->id == $v->status): ?>
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

	function  comparison(){

		//获取到所有的input
        var  box = $("input[name='box']");
           	//去所有的input长度
           	length =box.length;
           		//alert(length);
           	var str ="";
           	for(var i=0;i<length;i++){
               	//如果数组中的checked 为true  就将他的id进行拼接
               	if(box[i].checked==true){
                   	str =str+","+box[i].value;
               	}
           	}
           		//将拼接的字符串第一个，号删除
           	str= str.substr(1);
           	var index = layer.open({
			type: 2,
			title: '项目比对',
			content: '/comparison/comresult/'+str,
    		area: ['800px', '600px'],
    		});
  			
		}	



  		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/comparison/hundredper.blade.php ENDPATH**/ ?>