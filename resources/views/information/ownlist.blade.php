@extends('layouts.app')
@section('content')
<body>
	<div class="wap-container">
		<nav class="breadcrumb" style="background-color:#fff;padding: 0 24px">
			首页
			<span class="c-gray en">/</span>
			洽谈项目管理
			<span class="c-gray en">/</span>
			洽谈项目列表
			<a class="btn btn-success radius f-r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>

		<article class="Hui-admin-content clearfix">

			<div class="panel ">
				<div class="panel-body">
					<div class="clearfix">
						<span class="f-l">
							<a href="javascript:;" onclick="termination()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 项目终止</a>
							<a href="javascript:;" onclick="information_add('添加洽谈项目','/information/create')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加洽谈项目</a>
							<a href="javascript:;" onclick="location.href='/excel/export' " class="btn btn-primary radius"><i class="Hui-iconfont">&#xe644;</i>导出EXCEL </a>
						</span>
						
					</div>
							<div class="mt-20 clearfix">
								<table class="table table-border table-bordered table-bg table-hover table-sort">
									<thead>
										<tr class="text-c">
											<th width="25"><input type="checkbox" name="" value=""></th>
											<th width="40">ID</th>
											<th width="240">项目名称</th>
											<th width="80">项目国别</th>
											<th width="100">行业类别</th>
											<th width="100">投资金额</th>
											<th width="100">资方姓名</th>
											<th width="120">资方联系方式</th>
											<th width="100">入库时间</th>
											<th width="80">工作记录</th>
											<th width="80">上报状态</th>
											<th width=" ">操作</th>
										</tr>
									</thead>
									<tbody>
										@foreach($information as $v)
										<tr class="text-c">
											<td><input type="checkbox" value="{{$v->id}}" name="ID"></td>
											<td>{{$v->id}}</td>
											<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="information_edit('编辑项目','{{route('information.edit',$v->id)}}','{{$v->id}}')" title="编辑项目">{{$v->name}}</u></td>
											<td>{{$v->info_area->YAT_CNNAME}}</td>
											<td>{{$v->industry}}</td>
											<td>{{$v->investment}}@if($v->currency =="1")万人民币@elseif($v->currency =="2")万美元@elseif($v->currency =="3")万欧元@endif</td>
											<td>{{$v->cont_name}}</td>
											<td>{{$v->cont_phone}}</td>
											<td>{{$v->created_at->format('Y-m-d')}}</td>
											<td><u style="cursor:pointer" class="text-primary" onClick="recode_show('查看工作记录','{{route('recode.show',$v->id)}}','{{$v->id}}')" title="查看工作记录">{{$v->recodenum}}条</u></td>
											@if($v->is_show==0)
											<td>未上报</td>
											@elseif($v->is_show==1)
											<td>已上报</td>
											@endif
											
											<td class="td-manage">
												
												<button type="submit"  href="javascript:;" onclick="info_recode_add('进度记录','/recode/add/{{$v->id}}')"  class=" f-l ml-10  mt-5 mb-5 btn btn-primary radius size-S ">&nbsp;<i class="Hui-iconfont">&#xe6df;</i>&nbsp;进度记录&nbsp;&nbsp;</button>
												<button type="submit"  href="javascript:;" onclick="info_nego_add('项目落地','/negotiation/add/{{$v->id}}')"  class=" f-l ml-10 btn btn-primary radius size-S mt-5 mb-5">&nbsp;<i class="Hui-iconfont">&#xe640;</i>&nbsp;项目落地&nbsp;&nbsp;</button>
												@if($v->recodenum >= 3)
												<button type="submit"  href="javascript:;" onclick="info_cir_add('项目流转','/circule/add/{{$v->id}}')"  class="f-l ml-10 btn btn-primary radius size-S mt-5 mb-5">&nbsp;<i class="Hui-iconfont">&#xe6bd;</i>&nbsp;项目流转&nbsp;&nbsp;</button>
												@elseif($v->recodenum < 3)
												<button type="submit"  href="javascript:;" onclick="info_cir_add('项目流"  class="f-l ml-10 btn disabled  radius size-S mt-5 mb-5">&nbsp;<i class="Hui-iconfont" style="font-size: 14px">&#xe6bd;</i>&nbsp;项目流转&nbsp;&nbsp;</button>
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

										
		function negotiation_create(title,url,id){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
		};

		function recode_add(title,url){
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
    			area: ['800px', '600px'],
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

		function info_recode_add(title,url,id){
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
		});
			layer.full(index);
		};

		function info_cir_add(title,url,id){
			var index = layer.open({
			type: 2,
			title: title,
			content: url,
    		area: ['800px', '600px']
			});
		};

		function  termination(){

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
  			layer.confirm('确认要终止项目吗？',{title:'终止项目'},function(index){
                $.ajax({
					type: 'GET',
					url: '/information/termination/'+str,
					dataType: 'json',
					success:function(data){
							if( data == '1'){
								layer.msg('项目终止成功！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('项目终止失败！',{ icon: 2,time:2000});
							}
						},
					error:function(XmlHttpRequest,textStatus,errorThrown){
						layer.msg('项目终止错误！',{ icon: 1,time:1000});
					},
				});
  			});
		}
  		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>

@endsection