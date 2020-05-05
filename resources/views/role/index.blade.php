@extends('layouts.app')
@section('content')
<body>
	<div class="wap-container">
		<nav class="breadcrumb" style="background-color:#fff;padding: 0 24px">
			首页
			<span class="c-gray en">/</span>
			角色管理
			<span class="c-gray en">/</span>
			角色列表
			<a class="btn btn-success radius f-r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
		</nav>
		<article class="Hui-admin-content clearfix">
			<div class="panel">
				<div class="panel-body">
					<div class="clearfix">
						<span class="f-l">
							<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
							<a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','role/creat')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a>
						</span>
					</div>
					<div class="mt-20 clearfix">
						<table class="table table-border table-bordered table-hover table-bg">
							<thead>
								<tr class="text-c">
									<th width="25"><input type="checkbox" value="" name=""></th>
									<th width="40">ID</th>
									<th width="200">角色名</th>
									<th width="">权限id集合</th>
									<th width="">权限ac集合</th>
									<th width="70">操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($role as $val)
								<tr class="text-c">
									<td><input type="checkbox" value="" name=""></td>
									<td>{{$val->id}}</td>
									<td>{{$val->role_name}}</td>
									<td>{{$val->auth_ids}}</td>
									<td>{{$val->auth_ac}}</td>
									<td class="f-14">
										<a title="分配权限" href="javascript:;" onclick="admin_role_assign('分配权限','role/assigin/{{$val->id}}')" style="text-decoration:none"><i class="Hui-iconfont">&#xe603;</i></a> 
										<a title="编辑" href="javascript:;" onclick="admin_role_edit('角色编辑','role/{{$val->id}}/edit')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
										<a title="删除" href="javascript:;" onclick="admin_role_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
	<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="lib/layer/3.1.1/layer.js"></script>
	<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
	<!--/_footer /作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="lib/datatables/1.10.15/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
	<script type="text/javascript" src="static/business/js/main.js"></script>
	<!--/请在上方写此页面业务相关的脚本-->
  <script type="text/javascript">
		$(function(){
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
	</script>
@endsection
