@extends('layouts.app')
@section('content')
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">

				
				<form action="{{route('circule.update',$information->id)}}" method="post"  class="form form-horizontal" id="form-admin-add" >
					<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>流转结果：</label>
						<div class="form-controls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
							<select class="select" name="result" size="1">
								
								<option value="1">流转失败</option>
								<option value="0">流转成功</option>
							</select>
							</span> 
						</div>
					</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>项目名称：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{$information->name}}" placeholder="{{$information->name}}" id="name" name="  " datatype="*4-16" >
					</div>
				</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>注册企业名称：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value=" " placeholder=" " id="company" name="company" datatype="*4-16" >
					</div>
				</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>注册资金：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="{{$information->investment}} " placeholder="{{$information->investment}}" id="reg_cap" name="reg_cap" datatype="*4-16" >
						@if($information->currency == '1')该项目注册资金单位为：万人民币@elseif($information->currency == '2')该项目注册资金单位为：万美元@elseif($information->currency == '3')该项目注册资金单位为：万欧元@endif
					</div>					
				</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>注册时间：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						<input type="text" class="input-text datetimepicker-input" value="" placeholder="" id="neg_at" name="neg_at" datatype="*4-16" >
					</div>
				</div>

				<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上传文件：</label>
						<div class="form-controls col-xs-8 col-sm-9">
							<div id="uploader" class="wu-example" >
							    <!--用来存放文件信息-->
							   
							    <div class="btns">
							        <div id="picker" >选择文件</div>
							        <div id="ctlBtn" class="btn btn-success radius" >开始上传</div>
							    </div>
							     <div id="thelist" class="uploader-list" >
							    	<input type="hidden" name="contract_file" value="" />
							    </div>

							</div>
						</div>
				</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>结果说明：</label>
					<div class="form-controls col-xs-8 col-sm-9">
						<textarea type="text" class="textarea" value="" placeholder="" id="remark" name="remark" datatype="*4-16" ></textarea>
					</div>
				</div>
        				</tr>
        				<input type="hidden" name="investment" value="{{$information->investment}}">
        				<input type="hidden" name="currency" value="{{$information->currency}}">
						<input type="hidden" name="name" value="{{$information->name}}">
						<input type="hidden" name="info_id" value="{{$information->id}}">
						<input type="hidden" class="input-text" value="{{$actiontype}}"   name="actiontype" >

						{{csrf_field()}}
						{{method_field('PUT')}}
					
          			<div class="row clearfix">
						<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
								<button class="btn btn-primary radius" type="submit"  >提交</button>
						</div>
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
  <script type="text/javascript" src="/webuploader-0.1.5/webuploader.js"></script>
  <script type="text/javascript" src="/static/business/js/main.js"></script>
  <script type="text/javascript" src="/lib/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
		$(function(){

			$('#name,#company,#reg_cap,#neg_at,#uploader').parents('.row').hide();
			//给下拉的列表帮定切换事件
			$('select').change(function(){
				//获取当前选中的值
				var _val = $(this).val();

				//判断值
				if(_val > 0){
					//显示
					$('#name,#company,#reg_cap,#neg_at,#uploader').parents('.row').hide(500);
				}else{

					$('#name,#company,#reg_cap,#neg_at,#uploader').parents('.row').show(500);
				}
			});
			/* 通过iCheck插件，美化checkbox */
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			/* 表单验证，提交 */
			$("#form-admin-add").validate({
				rules:{
					name:{
						required:true,
						minlength:2,
						maxlength:16
					},

					
					phone:{
						required:true,
						isPhone:true,
					},
					email:{
						required:true,
						email:true,
					},
					
					
				},
				onkeyup:false,
				focusCleanup:true,
				success:"valid",
				submitHandler:function(form){
					$(form).ajaxSubmit({
						success:function(data){
							if( data == '0'){
								layer.msg('流转成功转，入落地项目库！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('流转失败，区级管理员重新分发！',{ icon: 2,time:2000});
							}
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg('项目洽谈转入错误！',{ icon: 1,time:1000});
						}
					});
				}
			});
		});
		function admin_add(title,url){
  			var index = layer.open({
			type: 2,
			title: title,
			content: url,
   	 		area: ['800px', '600px']
		});
		}

		jQuery(function() {
    var $ = jQuery,
        $list = $('#thelist'),
        $btn = $('#ctlBtn'),
        state = 'pending',
        uploader;

    uploader = WebUploader.create({

    	formData:{
    		_token:"{{csrf_token()}}",
    		emp_id:"{{$information->emp_id}}",
    		actiontype:"{{$actiontype}}",
    		info_id:"{{$information->id}}",
    	},

        // 不压缩image
        resize: false,

        // swf文件路径
        swf: '/webuploader-0.1.5/Uploader.swf',

        // 文件接收服务端。
        server: '/uploader/webuploader',

        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#picker',

        accept: {  
            title: 'Files',  
            extensions: 'pdf,doc,docx',
            mimeTypes: 'application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'  
                       +',application/pdf'  
        },
        fileNumLimit: 5,                              //最大上传数量为10
        fileSingleSizeLimit: 20 * 1024 * 1024,         //限制上传单个文件大小20M
        fileSizeLimit: 200 * 1024 * 1024,              //限制上传所有文件大小200M
        resize: false                                  // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！

    });

    // 当有文件添加进来的时候
    uploader.on( 'fileQueued', function( file ) {
        $list.append( '<div id="' + file.id + '" class="item "  style="margin-top:10px">' +
            '<h5 class="info" style="display:block;float:left;" >' + file.name + '</h5>' +
            '<p class="state" style="display:block;float:left;margin-left:30px;padding-top:4px">等待上传...</p>' +
        '</div>' );
    });

    // 文件上传过程中创建进度条实时显示。
    uploader.on( 'uploadProgress', function( file, percentage ) {
        var $li = $( '#'+file.id ),
            $percent = $li.find('.progress .progress-bar');

        // 避免重复创建
        if ( !$percent.length ) {
            $percent = $('<div class="progress progress-striped active">' +
              '<div class="progress-bar" role="progressbar" style="width: 0%">' +
              '</div>' +
            '</div>').appendTo( $li ).find('.progress-bar');
        }

        $li.find('p.state').text('上传中');

        $percent.css( 'width', percentage * 100 + '%' );
    });

    uploader.on( 'uploadSuccess', function( file,response ) {
        $( '#'+file.id ).find('p.state').text('已上传');
        $('input[name=contract_file]').val(response.path);

    });

    uploader.on( 'uploadError', function( file ) {
        $( '#'+file.id ).find('p.state').text('上传出错');
    });

    uploader.on( 'uploadComplete', function( file ) {
        $( '#'+file.id ).find('.progress').fadeOut();
    });

    uploader.on( 'all', function( type ) {
        if ( type === 'startUpload' ) {
            state = 'uploading';
        } else if ( type === 'stopUpload' ) {
            state = 'paused';
        } else if ( type === 'uploadFinished' ) {
            state = 'done';
        }

        if ( state === 'uploading' ) {
            $btn.text('暂停上传');
        } else {
            $btn.text('开始上传');
        }
    });

    $btn.on( 'click', function() {
        if ( state === 'uploading' ) {
            uploader.stop();
        } else {
            uploader.upload();
        }
    });
});	

	</script>
	<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
