﻿@extends('layouts.app')
@section('content')
<body>
	<div class="wap-container">
		<nav class="breadcrumb" style="background-color:#fff;padding: 0 24px">
			首页
			<span class="c-gray en">/</span>
			落地项目管理
			<span class="c-gray en">/</span>
			落地项目列表
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
											<th width="80">项目国别</th>
											<th width="150">注册企业名称</th>
											<th width="100">行业类别</th>
											<th width="100">注册资金</th>
											<th width="100">项目进度</th>
											<th width="100">项目落户地</th>
											<th width="100">首谈人</th>
											<th width="480">操作</th>
										</tr>
									</thead>
									<tbody>
										@foreach($information as $v)
										<tr class="text-c">
											<td><input type="checkbox" value="{{$v->id}}" name="ID"></td>
											<td>{{$v['id']}}</td>
											<td class="text-l" ><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','{{route('information.show',$v->id)}}','$v->id}}')" title="查看">{{$v->name}}</u></td>
											<td>{{$v->info_area->YAT_CNNAME}}</td>
											<td>{{$v['company']}}</td>
											<td>{{$v['industry']}}</td>
											<td>{{$v['reg_cap']}}@if($v['currency'] =='0')万人民币
										@elseif($v['currency'] =='1')万美元
										@elseif($v['currency'] =='2')万欧元
										@endif</td>
											<td>@if($v['process'] == '7')
												<span class="badge badge-success radius" >已落地</span>
												@elseif($v['process'] == '8')
												<span class="badge badge-success radius">已开工</span>
												@elseif($v['process'] == '9')
												<span class="badge badge-success radius">已投产</span>
												@endif
											</td>
											<td>{{$v['dept']}}</td>
											<td>
												@foreach($emps as $m)
													@if($m->id == $v['emp_id'])
														<u style="cursor:pointer" class="text-primary" onClick="information_show('查看首谈人信息','{{route('emp.show',$v['emp_id'])}}','{{$v['emp_id']}}')" title="查看首谈人信息">{{$m->username}}</u>
													@endif
												@endforeach
											</td>
											<td class="td-manage">
												<button type="submit"  href="javascript:;" onclick="negotiation_create('进度记录','/recode/add/{{$v['id']}}')"  class="btn btn-primary radius size-S f-l ml-10  mt-5 mb-5">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;进程记录&nbsp;&nbsp;&nbsp;</button>
												@if($v['process']==7)
												<button type="submit"  href="javascript:;" onclick="negotiation_create('项目开工','/landing/add/{{$v['id']}}')"  class="btn btn-primary radius size-S f-l ml-10  mt-5 mb-5"><i class="Hui-iconfont" style="font-size: 14px;">&#xe640;</i>&nbsp;&nbsp;项目开工&nbsp;&nbsp;</button>
												@elseif($v['process']==8)
												<button type="submit"  href="javascript:;" onclick="negotiation_create('项目投产','/completion/add/{{$v['id']}}')"  class="btn btn-primary radius size-S f-l ml-10  mt-5 mb-5"><i class="Hui-iconfont" style="font-size: 14px;">&#xe640;</i>&nbsp;&nbsp;项目投产&nbsp;&nbsp;</button>
												@elseif($v['process']==9)
												<button type="submit"  href="javascript:;" onclick="')" class="btn btn-success radius size-S f-l ml-10  mt-5 mb-5"><i class="Hui-iconfont" style="font-size: 14px;">&#xe640;</i>&nbsp;&nbsp;&nbsp;&nbsp;已投产&nbsp;&nbsp;</button>
												@endif
												<button type="submit"  href="javascript:;" onclick="negotiation_create('添加数据','/statistics/add/{{$v['id']}}')"  class="btn btn-primary radius size-S f-l ml-10  mt-5 mb-5">&nbsp;&nbsp;<i class="Hui-iconfont" style="font-size: 16px">&#xe61e;</i>&nbsp;&nbsp;添加数据&nbsp;&nbsp;&nbsp;</button>
												
												<button type="submit"  href="javascript:;" onclick="negotiation_create('查看数据','/statistics/{{$v['id']}}')"  class="btn btn-primary radius size-S f-l ml-10  mt-5 mb-5"><i class="Hui-iconfont" style="font-size: 14px">&#xe61c;</i>&nbsp;&nbsp;查看数据&nbsp;&nbsp;</button>											
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
			function information_add(title,url){
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
    		area: ['800px', '600px']
			});
		};

										
		function negotiation_create(title,url){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
	};
  		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
