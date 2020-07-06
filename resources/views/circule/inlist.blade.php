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

							<div class="mt-20 clearfix">
								<table class="table table-border table-bordered table-bg table-hover table-sort">
									<thead>
										<tr class="text-c">
											<th width="25"><input type="checkbox" name="" value=""></th>
											<th width="40">ID</th>
											<th width="250">项目名称</th>
											<th width="100">项目国别</th>
											<th width="100">首谈联系人</th>
											<th width="100">跟踪负责人</th>
											<th width="80">流转方向</th>
											<th width="120">流转时间</th>
											<th width="100">进度记录</th>
											<th width="100">剩余天数</th>
											<th width="200 ">操作</th>
										</tr>
									</thead>
									<tbody>
										@foreach($information as $k)
										@if($k->check_day > 4)
										<tr class="text-c">
										@elseif($k->check_day > 2 && $k->check_day <= 4 )
										<tr  class="warning text-c">
										@elseif($k->check_day <= 2)
										<tr class="danger text-c">
										@endif
											<td><input type="checkbox" value="{{$k->id}}" name="ID"></td>
											<td>{{$k->id}}</td>
											<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','{{route('information.show',$k->id)}}','{{$k->id}}')" title="查看">{{$k->name}}</u></td>
											<td>{{$k->info_area->YAT_CNNAME}}</td>
											<td>
												@foreach($emps as $n)
												@if($n->id == $k->emp_id)
												<u style="cursor:pointer" class="text-primary" onClick="information_show('查看联系人信息','{{route('emp.show',$k->emp_id)}}','$k->emp_id}}')" title="查看联系人信息">{{$n->username}}</u>
												@endif
												@endforeach
											</td>
											<td>
											@foreach($emps as $n)
											@if($n->id == $k->check_id)
											<u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目跟踪负责人信息','{{route('emp.show',$n->id)}}')" title="查看项目跟踪负责人信息">{{$n->username}}</u>
											@endif
											@endforeach
											<td>
											@foreach($depts as $n)
											@if($n->id == $k->circule_to)
											{{$n->dept_name}}
											@endif
											@endforeach
											</td>
											<td >
												<!--@if($k->emp_id == $k->issuer_id)
														{{$k->updated_at}}
												@else
													@foreach($k->info_nego as $v)
													@if($v->actiontype == 6 && $v->status == $k->circule_id)
														{{$v->created_at}} 
														@break
													@endif
												@endforeach

												@endif -->

												{{$k->updated_at->format('Y-m-d')}}
											</td>
											<td>
												<u style="cursor:pointer" class="text-primary" onClick="recode_show('查看工作记录','{{route('recode.show',$k->id)}}','{{$k->id}}')" title="查看工作记录">{{$k->num}}条</u>
											</td>
											@if($k->check_day > 4)
											<td ><span class="badge badge-success radius">洽谈剩余{{$k->check_day}}天</span></td>
											@elseif($k->check_day > 2 && $k->check_day <= 4 )
											<td  class="warning"><span class="label label-warning radius">洽谈剩余{{$k->check_day}}天</span></td>
											@elseif($k->check_day <= 2)
											<td  class="danger"><span class="label badge-danger radius">洽谈剩余{{$k->check_day}}天</span></td>
											@endif

											<td class="td-manage">
												<button type="submit"  href="javascript:;" onclick="information_show('进度记录','/recode/add/{{$k->id}}')"  class="btn btn-primary radius size-S">&nbsp;&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;&nbsp;进度记录&nbsp;&nbsp;&nbsp;</button>
												<button type="submit"  href="javascript:;" onclick="recode_show('流转结果','/circule/redit/{{$k->id}}')"  class="btn btn-danger radius size-S ml-10"><i class="Hui-iconfont" style="font-size: 16px">&#xe6bd;</i>&nbsp;&nbsp;流转结果&nbsp;&nbsp;</button>
												
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
										
		function recode_show(title,url){
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
