

<?php $__env->startSection('content'); ?>
<body>
  <input type="hidden" id="TenantId" name="TenantId" value="" />
  <div class="header"></div>
  <div class="loginWraper">
    <div class="loginBox">
      <form id="form-admin-login" class="form form-horizontal" action="<?php echo e(route('login')); ?>" role="form" method="post">
         <?php echo csrf_field(); ?>
        <div class="row clearfix">
          <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
          <div class="form-controls col-xs-7">
            <input id="name" name="name" type="name" placeholder="用户名" class="input-text size-L" value="<?php echo e(old('name')); ?>" required autofocus>
                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                     <?php endif; ?>        
          </div>
        </div>
        <div class="row clearfix">
          <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
          <div class="form-controls col-xs-7">
            <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L" required>
            <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
             
          </div>
        </div>
        <div class="row clearfix">
          <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe6b3;</i></label>
          <div class="form-controls  col-xs-7">
            <input id="verificationCode" name="captcha"  class="input-text size-L" type="text" placeholder="验证码" onclick="if(this.value=='验证码:'){this.value='';}" value="" style="width:170px;" >
            <img src="<?php echo e(captcha_src('flat')); ?>" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码" style="cursor: pointer;border: 1px solid #ced4da;border-radius: 4px;padding: 3px;margin-left: 4px" />
                                <?php if($errors->has('captcha')): ?>
                                <span class="invalid-feedback" role="alert">
                                 <strong><?php echo e($errors->first('captcha')); ?></strong>
                                </span>
                                <?php endif; ?>
          </div>
        </div>
        <div class="row clearfix">
          <div class="form-controls col-xs-7 col-xs-offset-3">
            <label for="online">
              <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
          使我保持登录状态
            </label>
          </div>
        </div>
        <div class="row clearfix">
          <div class="form-controls col-xs-8 col-xs-offset-3">
            <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
            <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="footer">Copyright 宁波市商务局 </div>

  <script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
  <script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
  <script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
  <script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>


</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/auth/login.blade.php ENDPATH**/ ?>