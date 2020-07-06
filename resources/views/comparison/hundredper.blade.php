﻿@extends('layouts.app')
@section('content')
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
								@foreach($hundredper as $v)

								<tr class="text-c">
									<td ><input type="checkbox" value="{{$v->id}}" name="box"></td>
									<td >{{$v->id}}</td>
									<td class="text-l" ><u style="cursor:pointer" class="text-primary" onClick="information_show('查看','{{route('information.show',$v->id)}}','$v->id}}')" title="查看">{{$v->name}}</u></td>
									<td>{{$v->country}}</td>
									<td>{{$v->industry}}</td>
									<td >
									@foreach($emps as $n)
									@if($n->id == $v->issuer_id)
									<u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目发布人信息','{{route('emp.show',$n->id)}}','$n->id}}')" title="查看项目发布人信息">{{$n->username}}</u>
									@endif
									@endforeach
									</td>
									<td >
									@foreach($emps as $n)
									@if($n->id == $v->emp_id)
									{{$n->dept->dept_name}}
									@endif
									@endforeach
									</td>
									<td >
									@foreach($emps as $n)
									@if($n->id == $v->check_id)
									<u style="cursor:pointer" class="text-primary" onClick="information_show('查看项目跟踪负责人信息','{{route('emp.show',$v->check_id)}}','$v->check_id}}')" title="查看项目跟踪负责人信息">{{$n->username}}</u>
									@endif
									@endforeach
								    </td>

									<td>
									@if($v->process == 2)
									等待市商务局审核
									@elseif($v->process == 3)
									等待分派跟踪人
									@elseif($v->process == 4)
									等待认领...
									@elseif($v->process == 5)
										@foreach($depts as $m)
											@if($m->id == $v->status)
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
@endsection
