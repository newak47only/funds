﻿@extends('layouts.app')
@section('content')
<body>
	<div class="wap-container">
		<nav class="breadcrumb" style="background-color:#fff;padding: 0 24px">
			首页
			<span class="c-gray en">/</span>
			洽谈项目库
			<span class="c-gray en">/</span>
			本区首谈项目列表
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
											<th width="250">项目名称</th>
											<th width="80">项目国别</th>
											<th width="100">行业类别</th>
											<th width="120">投资金额</th>
											<th width="120">主要投资方</th>
											<th width="120">重大项目类型</th>
											<th width="120">资方规模</th>
											<th width="120">首谈联系人</th>
											<th width="100">入库时间</th>
											<th width="100">工作记录</th>
											<th width="140 ">操作</th>
										</tr>
									</thead>
									<tbody>
										@foreach($information as $v)
										<tr class="text-c">
											<td><input type="checkbox" value="{{$v['id']}}" name="ID"></td>
											<td>{{$v['id']}}</td>
											<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目','{{route('information.show',$v->id)}}','{{$v['id']}}')" title="查看项目">{{$v['name']}}</u></td>
											<td>{{$v->info_area->YAT_CNNAME}}</td>
											<td>{{$v['industry']}}</td>
											<td>{{$v['investment']}}@if($v['currency'] =="1")万人民币@elseif($v['currency'] =="2")万美元@elseif($v['currency'] =="3")万欧元@endif</td>
											<td>{{$v['cont_unit']}}</td>
											<td>{{$v->info_level->name}}</td>
											<td>
												{{$v->info_major->p_name}}
											</td>
											<td>
											@foreach($emps as $m)
												@if($m->id == $v->emp_id)
												<u style="cursor:pointer" class="text-primary" onClick="information_show('查看首谈联系人信息','{{route('emp.show',$v->emp_id)}}','$v->emp_id}}')" title="查看首谈联系人信息">{{$m->username}}</u>
												@endif
											@endforeach

											</td>
											<td>{{$v->created_at->format('Y-m-d')}}</td>
											<td><u style="cursor:pointer" class="text-primary" onClick="recode_show('查看工作记录','/recode/show/{{$v['id']}}','{{$v['id']}}')" title="查看工作记录">{{$v['recodenum']}}条</u></td>
											<td class="td-manage">
												<button type="submit"  href="javascript:;" onclick="recode_show('查看记录','/recode/{{$v['id']}}')"  class=" f-l ml-10  mt-5 mb-5 btn btn-primary radius size-S ">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;查看记录&nbsp;&nbsp;&nbsp;</button>
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
		});
			function information_add(title,url){
  			var index = layer.open({
    		type: 2,
    		title: title,
    		content: url,
  		});
  			layer.full(index);
		};

		function information_edit(title,url,id){
			var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
			layer.full(index);
		};

										
		function info_recode_add(title,url,id){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
		};

		function report_add(title,url){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
		};

		function info_nego_add(title,url,id){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
		};

		function info_cir_add(title,url,id){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '700px']
			});
		};
		function info_report_edit(title,url,id){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
		};

		function recode_show(title,url){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
			});
			layer.full(index);
		};
		function info_recode_show(title,url){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
		};
		function circule_cheack(title,url){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
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