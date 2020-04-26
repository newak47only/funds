@extends('layouts.app')
@section('content')
<body>
	<div class="wap-container">
		<nav class="breadcrumb" style="background-color:#fff;padding: 0 24px">
			首页
			<span class="c-gray en">/</span>
			项目绩效管理
			<span class="c-gray en">/</span>
			项目绩效列表
			<a class="btn btn-success radius f-r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>

		<article class="Hui-admin-content clearfix">

			<div class="panel ">
				<div class="panel-body">
					<div id="tab-system" class="HuiTab">
						<div class="tabBar cl"><span>可流转项目</span><span>流转转出项目</span><span>流转转入项目</span></div>

						<div class="tabCon">
							<div class="mt-20 clearfix">
								<table class="table table-border table-bordered table-bg table-hover table-sort">
									<thead>
										<tr class="text-c">
											<th width="25"><input type="checkbox" name="" value=""></th>
											<th width="40">ID</th>
											<th width="">项目名称</th>
											<th width="120">行业类别</th>
											<th width="130">投资金额</th>
											<th width="120">首谈联系人</th>
											<th width="100">流转方向</th>
											<th width="140">流转时间</th>
											<th width="140">流转状态</th>
											<th width="250">操作</th>
										</tr>
									</thead>
									<tbody>
										@foreach($nego1 as $v)
										<tr class="text-c">
											<td><input type="checkbox" value="{{$v->nego_info->id}}" name="ID"></td>
											<td>{{$v->nego_info->id}}</td>
											<td class="text-l">{{$v->nego_info->name}}</td>
											<td>{{$v->nego_info->industry}}</td>
											<td>{{$v->nego_info->investment}}@if($v->nego_info->currency =="1")万人民币@elseif($v->nego_info->currency =="2")万美元@elseif($v->nego_info->currency =="3")万欧元@endif</td>
											<td>
												@foreach($emps as $n)
												@if($n->id == $v->emp_id)
												<u style="cursor:pointer" class="text-primary" onClick="information_show('查看联系人信息','{{route('emp.show',$v->emp_id)}}','$v->emp_id}}')" title="查看联系人信息">{{$n->username}}</u>
												@endif
												@endforeach
											</td>
											<td>
												@foreach($depts as $m)
												@if($m->id == $v->status)
												{{$m->dept_name}}
												@endif
												@endforeach
											</td>
											<td>{{$v->neg_at}}</td>
											<td>@if($v->nego_info->status == 0)暂无流转@else{{$v->nego_info->status}}个区域流转中@endif</td>
											<td class="td-manage">
												<button type="submit"  href="javascript:;" onclick="cricule_view('查看流转详情','{{route('recode.show',$v->id)}}')"  class="btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;查看流转记录&nbsp;&nbsp;&nbsp;</button>		
												<button type="submit"  href="javascript:;" onclick="negotiation_create('申请流转','/circule/start_circule/{{$v->id}}')"  class="btn btn-primary radius size-S"><i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;申请流转&nbsp;&nbsp;</button>		
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="tabCon">
							<div class="mt-20 clearfix">
								<table class="table table-border table-bordered table-bg table-hover table-sort">
									<thead>
										<tr class="text-c">
											<th width="25"><input type="checkbox" name="" value=""></th>
											<th width="40">ID</th>
											<th width="">项目名称</th>
											<th width="120">资方联系人</th>
											<th width="130">资方联系方式</th>
											<th width="120">首谈联系人</th>
											<th width="100">流转方向</th>
											<th width="140">流转时间</th>
											<th width="140">流转状态</th>
											<th width="250">操作</th>
										</tr>
									</thead>
									<tbody>
										@foreach($information1 as $v)
										<tr class="text-c">
											<td><input type="checkbox" value="{{$v->id}}" name="ID"></td>
											<td>{{$v['id']}}</td>
											<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','{{route('information.show',$v->id)}}','{{$v->id}}')" title="查看">{{$v->name}}</u></td>
											<td > {{$v->cont_name}}</td>
											<td > {{$v->cont_phone}}</td>
											<td >
												@foreach($emps as $n)
												@if($n->id == $v->emp_id)
												<u style="cursor:pointer" class="text-primary" onClick="information_show('查看联系人信息','{{route('emp.show',$v->emp_id)}}','$v->emp_id}}')" title="查看联系人信息">{{$v->staff_name}}</u>
												@endif
												@endforeach
											</td>
											@foreach($v->info_nego as $k)
											@if($k->actiontype == 5 && $k->info_id == $v->id && $k->result == 1)
											<td >
												@foreach($depts as $n)
												@if($n->id == $k->status)
												{{$n->dept_name}}
												@endif
												@endforeach
											</td>
											<td >{{$k->neg_at}}</td>
											@endif
											@endforeach
											<td >@if($v->status == 0)暂无流转@else{{$v->status}}个区域流转中@endif</td>
											<td class="td-manage">
												<button type="submit"  href="javascript:;" onclick="cricule_view('查看流转详情','{{route('recode.show',$v->id)}}')"  class="btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;查看流转记录&nbsp;&nbsp;&nbsp;</button>	
								
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="tabCon">
							<div class="mt-20 clearfix">
								<table class="table table-border table-bordered table-bg table-hover table-sort">
									<thead>
										<tr class="text-c">
											<th width="25"><input type="checkbox" name="" value=""></th>
											<th width="40">ID</th>
											<th width="250">项目名称</th>
											<th width="100">首谈联系人</th>
											<th width="100">跟踪负责人</th>
											<th width="80">流转方向</th>
											<th width="120">流转时间</th>
											<th width="80">工作记录</th>
											<th width="100">剩余天数</th>
											<th width="250 ">操作</th>
										</tr>
									</thead>
									<tbody>
										@foreach($nego2 as $k)
										@if($k->check_day > 4)
										<tr class="text-c">
										@elseif($k->check_day > 2 && $k->check_day <= 4 )
										<tr  class="warning text-c">
										@elseif($k->check_day <= 2)
										<tr class="danger text-c">
										@endif
											<td><input type="checkbox" value="{{$k->nego_info->id}}" name="ID"></td>
											<td>{{$k->nego_info->id}}</td>
											<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','{{route('information.show',$k->nego_info->id)}}','{{$k->nego_info->id}}')" title="查看">{{$k->nego_info->name}}</u></td>
											<td>

											<u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目跟踪负责人信息','{{route('emp.show',$k->emp_id)}}','$v->check_id}}')" title="查看项目跟踪负责人信息">{{$k->nego_info->staff_name}}</u>

											</td>
											<td>
											@foreach($emps as $n)
											@if($n->id == $k->nego_info->check_id)
											<u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目跟踪负责人信息','{{route('emp.show',$n->id)}}')" title="查看项目跟踪负责人信息">{{$n->username}}</u>
											@endif
											@endforeach
											<td>
											@foreach($depts as $n)
											@if($n->id == $k->status)
											{{$n->dept_name}}
											@endif
											@endforeach
											</td>
											<td >{{$k->neg_at}}</td>
											<td>
												@foreach($num as $kk)
												@if($kk['nego_id']==$k->id)
												<u style="cursor:pointer" class="text-primary" onClick="cricule_view('查看工作记录','{{route('recode.show',$k->nego_info->id)}}','{{$k->nego_info->id}}')" title="查看工作记录">{{$kk['count']}}条</u>
												@endif
												@endforeach
											</td>
											@if($k->check_day > 4)
											<td ><span class="badge badge-success radius">洽谈剩余{{$k->check_day}}天</span></td>
											@elseif($k->check_day > 2 && $k->check_day <= 4 )
											<td  class="warning"><span class="label label-warning radius">洽谈剩余{{$k->check_day}}天</span></td>
											@elseif($k->check_day <= 2)
											<td  class="danger"><span class="label badge-danger radius">洽谈剩余{{$k->check_day}}天</span></td>
											@endif

											<td class="td-manage">
												<button type="submit"  href="javascript:;" onclick="information_show('进度记录','/recode/ciradd/{{$k->id}}')"  class="btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;进度记录&nbsp;&nbsp;&nbsp;</button>
												<button type="submit"  href="javascript:;" onclick="information_show('流转结果','/circule/redit/{{$k->id}}')"  class="btn btn-primary radius size-S"><i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;流转结果&nbsp;&nbsp;</button>
												
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							
						</div>
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
  		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
