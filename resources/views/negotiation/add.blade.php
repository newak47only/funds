@extends('layouts.app')
@section('content')
        <body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">
				<form action="{{route('negotiation.store')}}" method="post" class="form form-horizontal" id="form-admin-add">
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>项目名称：</label>
					<div class="form-controls col-xs-8 col-sm-8">
						<input style="height: 40px" type="text" class="input-text" value="{{$informations->name}}" placeholder="{{$informations->name}}" id="negotiation_name" name="name" datatype="*4-16" >
					</div>
				</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>注册企业名称：</label>
					<div class="form-controls col-xs-8 col-sm-8">
						<input style="height: 40px" type="text" class="input-text" value=" " placeholder=" " id="negotiation_name" name="company" datatype="*4-16" >
					</div>
				</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>注册资金：</label>
					<div class="form-controls col-xs-8 col-sm-6">
						<input style="height: 40px" type="text" class="input-text" value=" " placeholder="{{$informations->investment}}" id="negotiation_investment" name="reg_cap" datatype="*4-16" >
					</div>	
					<div class="form-controls col-xs-8 col-sm-2">
						<span class="select-box" >
							<select class="select"  name="reg_currency" size="1">
              					<option value="" selected="selected">选择货币单位</option>
              					<option value="1">万人民币</option>
              					<option value="2">万美元</option>
              					<option value="3">万欧元</option>             			
							</select>
						</span>
					</div>				
				</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>投资金额：</label>
					<div class="form-controls col-xs-8 col-sm-6">
						<input style="height: 40px" type="text" class="input-text" value=" " placeholder="{{$informations->investment}}" id="negotiation_investment" name="investment"   datatype="*4-16" >
					</div>
					<div class="form-controls col-xs-8 col-sm-2">
						<span class="select-box"  >
							<select class="select"  name="currency" size="1">
              					<option value="{{$informations->currency}}" selected="selected">@if($informations->currency =="1")万人民币@elseif($informations->currency =="2")万美元@endif</option>
              					<option value="1">万人民币</option>
              					<option value="2">万美元</option>
              					<option value="3">万欧元</option>             			
							</select>
						</span>
					</div>						
				</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>注册时间：</label>
					<div class="form-controls col-xs-8 col-sm-8">
						<input style="height: 40px" type="text" class="input-text datetimepicker-input" value="" placeholder="" id="negotiation-datetime-start" name="neg_at" datatype="*4-16" >
					</div>
				</div>
				<div class="row clearfix">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>经营范围：</label>
					<div class="form-controls col-xs-8 col-sm-8">
						<textarea type="text" class="textarea" value="" placeholder="" id="scope" name="scope" datatype="*4-16" ></textarea>
					</div>
				</div>

				<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上传文件：</label>
						<div class="form-controls col-xs-8 col-sm-8">
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
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>落地说明：</label>
					<div class="form-controls col-xs-8 col-sm-8">
						<textarea type="text" class="textarea" value="" placeholder="" id="remark" name="remark" datatype="*4-16" ></textarea>
					</div>
				</div>

				<input type="hidden" class="input-text" value="{{$actiontype}}"   name="actiontype" >
				<input type="hidden"  value="{{$informations->id}}" placeholder="" id="report_info_id" name="info_id" >
				<input type="hidden"  value="{{$eaction}}" placeholder="" id="report_eaction" name="eaction" >

					{{csrf_field()}}
					{{method_field('POST')}}
					<div class="row clearfix">
						<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
							<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
			/* 通过iCheck插件，美化checkbox */
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			$("#negotiation-datetime-start").datetimepicker({
        		language:  'zh-CN',
		   	 	format: 'yyyy-mm-dd',
		    	minView: "month",
		    	todayBtn:  1,
		    	autoclose: 1,
		    	endDate : new Date(),
		  	});


			/* 表单验证，提交 */
			$("#form-admin-add").validate({
				rules:{

					name:{
						required:true,
						maxlength:50
					},
					company:{
						required:true,
						maxlength:50
					},
					reg_cap:{
						required:true,
						maxlength:16
					},
					investment:{
						required:true,
						maxlength:12
					},
					currency:{
						required:true,
					},
					reg_currency:{
						required:true,
					},
					neg_at:{
						required:true,
					},
					scope:{
						required:true,
					},
					remark:{
						required:true,
						maxlength:800
					},	
				},
				onkeyup:false,
				focusCleanup:true,
				success:"valid",
				submitHandler:function(form){
					$(form).ajaxSubmit({
						success:function(data){
							if( data == '1'){
								layer.msg('成功转入落地项目库！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('转入落地项目库失败！',{ icon: 2,time:2000});
							}
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg('转入落地项目库错误！',{ icon: 1,time:1000});
						},
					});
				},

			});
	});

			jQuery(function() {
    var $ = jQuery,
        $list = $('#thelist'),
        $btn = $('#ctlBtn'),
        state = 'pending',
        uploader;

    uploader = WebUploader.create({

    	formData:{
    		_token:"{{csrf_token()}}",
    		emp_id:"{{$users->id}}",
    		actiontype:"{{$actiontype}}",
    		info_id:"{{$informations->id}}",
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
@endsection
