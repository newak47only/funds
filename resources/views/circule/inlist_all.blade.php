@extends('layouts.app')
@section('content')
<body>
	<div class="wap-container">
		<nav class="breadcrumb" style="background-color:#fff;padding: 0 24px">
			首页
			<span class="c-gray en">/</span>
			洽谈项目库
			<span class="c-gray en">/</span>
			本区转入项目列表
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
											<th width="220">项目名称</th>
											<th width="100">项目国别</th>
											<th width="120">所属行业</th>
											<th width="100">首谈地</th>
											<th width="100">首谈联系人</th>
											<th width="100">跟踪负责人</th>
											<th width="100">流转方向</th>
											<th width="140">流转时间</th>
											<th width="100">流转状态</th>
											<th width="430">操作</th>
										</tr>
									</thead>
									<tbody>
										@foreach($information as $v)
										<tr class="text-c">
											<td><input type="checkbox" value="{{$v->id}}" name="ID"></td>
											<td>{{$v->id}}</td>
											<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','{{route('information.show',$v->id)}}','{{$v->id}}')" title="查看">{{$v->name}}</u></td>
											<td>{{$v->country}}</td>
											<td>{{$v->industry}}</td>
											<td>
												@foreach($depts as $n)
													@if($n->id == $v->info_emp->dept_id)
														{{$n->dept_name}}
													@endif
												@endforeach
											</td>
											<td >
												@foreach($emps as $n)
												@if($n->id == $v->emp_id)
												<u style="cursor:pointer" class="text-primary" onClick="information_show('查看联系人信息','{{route('emp.show',$v->emp_id)}}','$v->emp_id}}')" title="查看联系人信息">{{$n->username}}</u>
												@endif
												@endforeach
											</td>
											<td>
												@foreach($emps as $n)
												@if($n->id == $v->check_id)
												<u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目跟踪人信息','{{route('emp.show',$v->check_id)}}','$v->check_id}}')" title="查看项目跟踪人信息">{{$n->username}}</u>
												@endif
												@endforeach

											</td>
											<td >
												@foreach($depts as $n)
													@if($n->id == $v->circule_to)
														{{$n->dept_name}}
													@endif
												@endforeach
											</td>
											<td>
												@foreach($v->info_nego as $k)
													@if($k->actiontype == 1 )
														{{$k->created_at->format('y-m-d')}}
													@endif
												@endforeach
											</td>
											<td>
												@if($v->circule_id == 0)
												等待分发
												@else
													@foreach($emps as $m)
														@if($m->id == $v->circule_id)
															<u style="cursor:pointer" class="text-primary" onClick="information_show('查看联系人信息','{{route('emp.show',$m->id)}}','$m->id}}')" title="查看联系人信息">{{$m->username}}</u>流转中
														@endif
													@endforeach
												@endif
											</td>	

											<td class="td-manage">
												<button type="submit"  href="javascript:;" onclick="cricule_view('查看流转详情','{{route('recode.show',$v->id)}}')"  class="btn btn-primary radius size-S f-l ml-10  mt-5 mb-5">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;查看流转记录&nbsp;&nbsp;&nbsp;</button>	
												@if($v->process == 5 )
												<button type="submit"  href="javascript:;" onclick="circule_owncheck('项目分发','/circule/owncheck/{{$v->id}}')"  class="f-l ml-10  mt-5 mb-5 btn btn-danger radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6bd;</i>&nbsp;&nbsp;项目分发&nbsp;&nbsp;&nbsp;</button>

												<button type="submit"  href="javascript:;" onclick="circule_stop(this,'{{$v->id}}')"  class="f-l ml-10  mt-5 mb-5 btn btn-danger radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6e4;</i>&nbsp;&nbsp;终止流转&nbsp;&nbsp;&nbsp;</button>
												@elseif($v->process == 6)
												<button type="submit"  href="javascript:;" onclick=""  class="f-l ml-10  mt-5 mb-5 btn disabled radius size-S ">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6bd;</i>&nbsp;&nbsp;项目分发&nbsp;&nbsp;&nbsp;</button>
												<button type="submit"  href="javascript:;" onclick=""  class="f-l ml-10  mt-5 mb-5 btn disabled radius size-S ">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe6e4;</i>&nbsp;&nbsp;终止流转&nbsp;&nbsp;&nbsp;</button>

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

	function circule_owncheck(title,url,id){
  		var index = layer.open({
		type: 2,
		title: title,
		content: url,
    	area: ['800px', '600px'],
  		});
	}

	function circule_stop(obj,id){
  		layer.confirm('确认要终止该流转项目吗？',{title:'项目终止流转确认'},function(index){
            $.ajax({
				type: 'GET',
				url: '/circule/cirstop/'+id,
				dataType: 'json',
				success: function(data){
					$(obj).parents("tr").remove();
					layer.msg('项目终止流转成功!',{icon:1,time:2000});
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
@endsection
