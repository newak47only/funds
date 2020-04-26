@extends('layouts.app')
@section('content')
<body>
	<div class="wap-container">


		<article class="Hui-admin-content clearfix">
					{{csrf_field()}}
			<div class="panel ">
				<div class="panel-body">
					<div class="mt-20 clearfix">
						<table class="table table-border table-bordered table-bg table-hover table-sort">
							<thead>
								<tr class="text-c">
									<th width="150">流转人</th>
									<th width="150">流转时间</th>
									<th width="150">流转状态</th>
									<th width="200">操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($nego as $v)
								<tr class="text-c">
									<td><input type="checkbox" value="{{$v->id}}" name="box"></td>
									<td>
										@foreach($emps as $n)
										@if($n->id == $v->director_id)
										<u style="cursor:pointer" class="text-primary" onClick="information_show('查看流转负责人信息','{{route('emp.show',$n->id)}}')" title="查看流转负责人信息">{{$n->username}}</u>
										@endif
										@endforeach
									</td>
									<td>{{$v->created_at}}</td>
									<td><div class="progress"><div class="progress-bar"><span class="sr-only" style="width:{{$v->rate}}"></span></div></div></td>
									<td class="td-manage">


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

		function admin_edit(title,url){
  			
  			var index = layer.open({
				type: 2,
				title: title,
				content:url,
    			area: ['800px', '600px']
			});
		}




	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
