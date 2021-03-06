
<?php $__env->startSection('content'); ?>
<body style="background-color:#fff">
	<div class="wap-container">
		<div class="panel">
			<div class="panel-body">
				<form action="<?php echo e(route('circule.store')); ?>" method="post" class="form form-horizontal" id="form-admin-add">
					<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>项目名称：</label>
						<div class="form-controls col-xs-8 col-sm-9">
							<input type="text" class="input-text" value="<?php echo e($informations->name); ?>" placeholder="<?php echo e($informations->name); ?>" id="Landing_name" name="  " datatype="*4-16" >
						</div>
					</div>
					<div class="row clearfix">
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>投资金额：</label>
						<div class="form-controls col-xs-8 col-sm-9">
							<input type="text" class="input-text" value="<?php echo e($informations->investment); ?> " placeholder="<?php echo e($informations->investment); ?>" id="Landing_investment" name="investment" datatype="*4-16" >
						<?php if($informations->currency == '1'): ?>该项目投资金额单位为：万人民币<?php elseif($informations->currency == '2'): ?>该项目投资金额单位为：万美元<?php elseif($informations->currency == '3'): ?>该项目投资金额单位为：万欧元<?php endif; ?>
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
						<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>流转原因：</label>
						<div class="form-controls col-xs-8 col-sm-9">
							<textarea type="text" class="textarea" value="" placeholder="" id="remark" name="remark" datatype="*4-16" ></textarea>
						</div>
					</div>

					<input type="hidden"  value="<?php echo e($informations->currency); ?>" placeholder="" id="Landing_currency" name="currency" >
					<input type="hidden"  value="<?php echo e($informations->id); ?>" placeholder="" id="report_info_id" name="info_id" >
					<input type="hidden"  value="<?php echo e($eaction); ?>" placeholder="" id="report_eaction" name="eaction" >
					<input type="hidden" class="input-text" value="<?php echo e($actiontype); ?>"   name="actiontype" >
					<?php echo e(csrf_field()); ?>

					<?php echo e(method_field('POST')); ?>

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
	<script type="text/javascript">
		$(function(){
			/* 通过iCheck插件，美化checkbox */
			$('.skin-minimal input').iCheck({
				checkboxClass: 'icheckbox-blue',
				radioClass: 'iradio-blue',
				increaseArea: '20%'
			});

			/* 表单验证，提交 */
			$("#form-admin-add").validate({
				rules:{
					remark:{
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
								layer.msg('项目流转申请成功！',{ icon: 1,time:2000},function(){
								var index = parent.layer.getFrameIndex(window.name);
								parent.location.replace(parent.location.href);
								parent.layer.close(index);
								});

							}else{
								layer.msg('项目流转申请失败！',{ icon: 2,time:2000});
							}
						},
						error:function(XmlHttpRequest,textStatus,errorThrown){
							layer.msg('项目流转错误！',{ icon: 1,time:1000});
						}
					});
				}
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
    		_token:"<?php echo e(csrf_token()); ?>",
    		emp_id:"<?php echo e($informations->emp_id); ?>",
    		actiontype:"<?php echo e($actiontype); ?>",
    		info_id:"<?php echo e($informations->id); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/circule/add.blade.php ENDPATH**/ ?>