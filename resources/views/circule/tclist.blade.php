@extends('layouts.app')
@section('content')
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
										@foreach($information1 as $v)
										<tr class="text-c">
											<td ><input type="checkbox" value="{{$v->id}}" name="ID"></td>
											<td >{{$v->id}}</td>
											<td class="text-l" ><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','{{route('information.show',$v->id)}}','{{$v->id}}')" title="查看">{{$v->name}}</u></td>
											<td>{{$v->info_area->YAT_CNNAME}}</td>
											<td>{{$v->industry}}</td>
											<td > 
											@if(empty($v->emp_id) && $v->process == 21)
													等待分派
											 @elseif(!empty($v->emp_id) && $v->process == 21)
												@foreach($emps as $n)
													@if($n->id == $v->emp_id)
													{{$n->dept->dept_name}}
													@endif
												@endforeach
											@elseif(empty($v->emp_id) && $v->process == 22)
													等待分派审核
											@else(empty($v->emp_id) && $v->process == 23)
												@foreach($emps as $n)
													@if($n->id == $v->emp_id)
													{{$n->dept->dept_name}}
													@endif
												@endforeach
											@endif
											</td>
		
											<td>
											@if(empty($v->emp_id) && $v->process == 21)
											等待分派
											@elseif(!empty($v->emp_id) && $v->process == 21)
												@foreach($emps as $n)
													@if($n->id == $v->emp_id)
														<u style="cursor:pointer" class="text-primary" onClick="information_show('查看首谈联系人信息','{{route('emp.show',$v->emp_id)}}','$v->emp_id}}')" title="查看首谈联系人信息">{{$n->username}}</u>
													@endif
												@endforeach
											@elseif(empty($v->emp_id) && $v->process == 22)
											等待分派审核
											@elseif(empty($v->emp_id) && $v->process == 23)
												等待	@foreach($depts as $n)
													@if($n->id == $v->status)
														{{$n->dept_name}}
													@endif
												@endforeach
												分派
											@else
												@foreach($emps as $n)
													@if($n->id == $v->emp_id)
														<u style="cursor:pointer" class="text-primary" onClick="information_show('查看首谈联系人信息','{{route('emp.show',$v->emp_id)}}','$v->emp_id}}')" title="查看首谈联系人信息">{{$n->username}}</u>
													@endif
												@endforeach
											@endif
											</td>

											<td> 
											@if(empty($v->circule_to))

											暂无流转方向
											@else
												@foreach($depts as $n)
													@if($n->id == $v->circule_to)
														<span class="badge badge-success radius">{{$n->dept_name}}</span>
													@endif
												@endforeach
											@endif
											</td>
											<td>
											@if($v->process > 0 && $v->process < 21 )
												@foreach($v->info_nego as $k)
													@if($k->actiontype == 1 )
														{{$k->created_at->format('y-m-d')}}
													@endif
												@endforeach
											@else
													暂无流转
											@endif
											</td>
											<td>
												@if($v->process ==0 )
												暂无流转
												@elseif($v->process == 1)
												等待区流转审核
												@elseif($v->process == 2)
												等待市流转审核
												@elseif($v->process == 3)
												等待分派项目跟踪人
												@elseif($v->process == 4)
												等待项目认领
												@elseif($v->process >20 && $v->process <22)
												暂无流转

												@elseif($v->process == 23)
													@foreach($depts as $m)
														@if($m->id == $v->circule_to)
															等待{{$m->dept_name}}分发
														@endif
													@endforeach
												@elseif($v->process == 6)
													@foreach($emps as $m)
														@if($m->id == $v->circule_id)
															<u style="cursor:pointer" class="text-primary" onClick="information_show('查看联系人信息','{{route('emp.show',$m->id)}}','$m->id}}')" title="查看联系人信息">{{$m->username}}</u>流转中
														@endif
													@endforeach
												@endif	
											</td>
											<td class="td-manage">
												<button type="submit"  href="javascript:;" onclick="cricule_view('查看流转详情','/recode/{{$v->id}}')"  class="btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;查看记录&nbsp;&nbsp;&nbsp;</button>
												<button type="submit"  href="javascript:;" onclick="recode_add('查看流转详情','/recode/add/{{$v->id}}')"  class="btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6e6;</i>&nbsp;&nbsp;推进记录&nbsp;&nbsp;&nbsp;</button>
												@if($v->process == 21)
												<button type="submit"  href="javascript:;" onclick="recode_add('项目分派','/circule/tcadd/{{$v->id}}')"  class="btn btn-danger radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe666;</i>&nbsp;&nbsp;项目分派&nbsp;&nbsp;&nbsp;</button>
												@elseif($v->process == 22)
												<button type="submit"  href="javascript:;" onclick=""  class="btn btn-disabled radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe666;</i>&nbsp;&nbsp;等待审核&nbsp;&nbsp;&nbsp;</button>
												@else
												<button type="submit"  href="javascript:;" onclick=""  class="btn btn-disabled radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe666;</i>&nbsp;&nbsp;项目分派&nbsp;&nbsp;&nbsp;</button>
												@endif
												@if($v->process == 4)
												<button type="submit"  href="javascript:;" onclick="recode_add('重置流转','/cirreset/{{$v->id}}')"  class="btn btn-danger radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6bd;</i>&nbsp;&nbsp;重置流转&nbsp;&nbsp;&nbsp;</button>
												@else
												<button type="submit"  href="javascript:;" onclick=""  class="btn btn-disabled radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6bd;</i>&nbsp;&nbsp;重置流转&nbsp;&nbsp;&nbsp;</button>
												@endif
											</td>
										</tr>
										@endforeach
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
@endsection
