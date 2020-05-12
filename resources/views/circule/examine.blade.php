@extends('layouts.app')
@section('content')
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">

				
				<form action="/circule/examupdate/{{$information->id}}" method="POST"  class="form form-horizontal" id="form-admin-add" >
				<div class="row clearfix">
					<table class="table table-border table-bordered" style="width: 600px; margin-left: 100px">
      				<tbody>
       					 <tr>
          					<th class="text-r" width="80">项目名称：</th>
          					<td>{{$information->name}}</td>
        				</tr>
        				<tr>
          					<th class="text-r">投资金额：</th>
          					<td>{{$information->investment}}@if($information->currency == '1')万人民币@elseif($information->currency == '2')万美元@elseif($information->currency == '3')万欧元@endif
          					</td>
        				</tr>
        				<tr>
          					<th class="text-r">入库日期：</th>
          					<td>{{$information->created_at}}</td>
        				</tr>
        				<tr>
          					<th class="text-r">相关文件：</th>
          					<td><a href="{{$information->contract_file}}"> {{$information->contract_file}}</td>
        				</tr>
        				<tr>
          					<th class="text-r">流转方向：</th>
          					<td>
          						@foreach($depts as $n)
									@if($n->id == $information->circule_to)
										{{$n->dept_name}}
									@endif
								@endforeach
          					</td>
        				</tr>
        				<tr>
          					<th class="text-r">流转原因：</th>
          					<td>{{$remark}}</td>
        				</tr>
        				<tr>
          					<th class="text-r">审核建议：</th>
          					<td><textarea type="text" class="textarea" value=" " placeholder="" id="check" name="remark" datatype="*4-16" ></textarea></td>
        				</tr>
      				</tbody>
    				</table>
    			</div>
    			

    				<input type="hidden" name="info_id" value="{{$information->id}}">
    				<input type="hidden" name="investment" value="{{$information->investment}}">
					<input type="hidden" name="currency" value="{{$information->currency}}">
    				<input type="hidden" name="eaction" value="{{$eaction}}">
    				<input type="hidden" name="actiontype" value="{{$actiontype}}">

					{{csrf_field()}}
					{{method_field('POST')}}


					<div class="row clearfix">
						<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
							<button class="btn btn-primary radius" type="submit" name="result" value="3">同意流转</button>
							<button class="btn btn-primary radius" type="submit" name="result" value="2">不同意流转</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="/lib/layer/3.1.1/layer.js"></script>
	<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>

	<!--/_footer /作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
  <script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
  <script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
  <script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>
	<script type="text/javascript">
		$(function(){
			/* 通过iCheck插件，美化checkbox */
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

				$("#form-admin-add").validate({
				rules:{
					report:{
						required:true,
					},
					
					
					
				},
				onkeyup:false,
				focusCleanup:true,
				success:"valid",
				submitHandler:function(form){
					$(form).ajaxSubmit({
						success:function(data){
							if( data == '1'){
								layer.msg('项目流转审批成功！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('项目流转审批成功！',{ icon: 2,time:2000});
							}
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg('项目流转审批错误！',{ icon: 1,time:1000});
						}
					});
				}
			});

			
		});

		
	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
