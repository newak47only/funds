
<?php $__env->startSection('content'); ?>
  <aside class="Hui-admin-aside-wrapper">
    <div class="Hui-admin-logo-wrapper">
      <a class="logo navbar-logo" href="/aboutHui.shtml">
        <i class="va-m iconpic global-logo"></i>
        <span class="va-m">项目库管理</span>
      </a>
    </div>
    <div class="Hui-admin-menu-dropdown bk_2">
      <?php if($status == 0): ?>
        <dl id="menu-negotiation" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe616;</i>&nbsp;全市洽谈项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>
            <li><?php if($checkcount != 0): ?><a data-href="circule/list_city" data-title="流转项目列表" href="javascript:void(0)">流转项目列表<span  class=" badge badge-danger radius " style=" display: block; overflow: hidden; float:right; margin-right:94px; margin-top:8px;  padding-right:5px;padding-left:5px;  border-radius:12px ;  color:#fff;"><?php echo e($checkcount); ?></a></span>
              <?php else: ?>
              <a data-href="circule/list_city" data-title="流转项目列表" href="javascript:void(0)">流转项目列表</a>
              <?php endif; ?>
            </li>
            <li><a data-href="information/report_list" data-title="上报项目列表" href="javascript:void(0)">上报项目列表&nbsp;</a></li>
            <li><a data-href="information/important_list" data-title="重大项目列表" href="javascript:void(0)">重大项目列表&nbsp;</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-landing" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe613;</i>&nbsp;全市落地项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
         <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="negotiation/outlist_city" data-title="流转项目落地列表" href="javascript:void(0)">流转项目落地列表</a></li>
            <li><a data-href="negotiation/ownlist_city" data-title="首谈项目落地列表" href="javascript:void(0)">首谈项目落地列表</a></li>
            <li><a data-href="negotiation/important_list" data-title="重大项目落地列表" href="javascript:void(0)">重大项目落地列表</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-paper" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe60d;</i>&nbsp;项目资料库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>

            <li><a data-href="uploader/index2" data-title="项目资料列表" href="javascript:void(0)">项目资料列表</a></li>

          </ul>
        </dd>
      </dl>
      <dl id="menu-admin" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe62d;</i>&nbsp;管理员管理<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="/emp" data-title="管理员列表" href="javascript:void(0)">本部门管理员列表</a></li>
          </ul>
        </dd>
      </dl>
      <?php elseif($status == 1): ?>
        <dl id="menu-negotiation" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe616;</i>&nbsp;全市流转项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="circule/list_all" data-title="全市流转库列表" href="javascript:void(0)">全市流转项目库列表</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-circule" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe616;</i>&nbsp;洽谈项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="information/list_all" data-title="本区首谈项目列表" href="javascript:void(0)">本区首谈项目列表</a></li>
            <li><a data-href="circule/inlist_all" data-title="本区转入项目列表" href="javascript:void(0)">本区转入项目列表<?php if($inlistcount != 0): ?><span  class=" badge badge-danger radius " style=" display: block; overflow: hidden; float:right; margin-right:65px; margin-top:8px;  padding-right:5px;padding-left:5px;  border-radius:12px ;  color:#fff;"><?php echo e($inlistcount); ?></a></span><?php endif; ?></li>
            <li><a data-href="circule/outlist_all" data-title="本区转出项目列表" href="javascript:void(0)">本区转出项目列表<?php if($outcount !=0): ?><span  class=" badge badge-danger radius " style=" display: block; overflow: hidden; float:right; margin-right:65px; margin-top:8px;  padding-right:5px;padding-left:5px;  border-radius:12px ;  color:#fff;"><?php echo e($outcount); ?></a></span><?php endif; ?></li>
            <li><a data-href="information/tctolist" data-title="投促中心分派项目" href="javascript:void(0)">投促中心分派项目&nbsp;</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-landing" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe613;</i>&nbsp;落地项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
         <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="negotiation/ownlist_all" data-title="全程落地项目列表" href="javascript:void(0)">全程落地项目列表</a></li>
            <li><a data-href="negotiation/inlist_all" data-title="转入落地项目列表" href="javascript:void(0)">转入落地项目列表</a></li>
            <li><a data-href="negotiation/outlist_all" data-title="转出落地项目列表" href="javascript:void(0)">转出落地项目列表</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-paper" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe60d;</i>&nbsp;项目资料库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>

            <li><a data-href="uploader/index2" data-title="项目资料列表" href="javascript:void(0)">项目资料列表</a></li>

          </ul>
        </dd>
      </dl>
      <dl id="menu-admin" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe62d;</i>&nbsp;管理员管理<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="/emp" data-title="管理员列表" href="javascript:void(0)">本部门管理员列表</a></li>
          </ul>
        </dd>
      </dl>
      <?php elseif($status == 2): ?>
        <dl id="menu-negotiation" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe616;</i>&nbsp;洽谈项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="information/ownlist" data-title="本人首谈项目列表" href="javascript:void(0)">本人首谈项目列表&nbsp;<?php if($tccount != 0 ): ?><span  class=" badge badge-danger radius " style=" display: block; overflow: hidden; float:right; margin-right:66px; margin-top:8px;  padding-right:5px;padding-left:5px;  border-radius:12px ;  color:#fff;"><?php echo e($tccount); ?></a></span><?php endif; ?></li>
            <li><a data-href="circule/inlist" data-title="本人转入项目列表" href="javascript:void(0)">本人转入项目列表<?php if($inlistcount != 0): ?><span  class=" badge badge-danger radius " style=" display: block; overflow: hidden; float:right; margin-right:65px; margin-top:8px;  padding-right:5px;padding-left:5px;  border-radius:12px ;  color:#fff;"><?php echo e($inlistcount); ?></a></span><?php endif; ?></li>
            <li><a data-href="circule/outlist" data-title="本人转出项目列表" href="javascript:void(0)">本人转出项目列表&nbsp;</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-landing" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe613;</i>&nbsp;落地项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
         <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="negotiation/ownlist" data-title="全程落地项目列表" href="javascript:void(0)">全程落地项目列表</a></li>
            <li><a data-href="negotiation/inlist" data-title="转入落地项目列表" href="javascript:void(0)">转入落地项目列表</a></li>
            <li><a data-href="negotiation/outlist" data-title="转出落地项目列表" href="javascript:void(0)">转出落地项目列表</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-paper" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe60d;</i>&nbsp;项目资料库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>

            <li><a data-href="uploader/index2" data-title="项目资料列表" href="javascript:void(0)">项目资料列表</a></li>

          </ul>
        </dd>
      </dl>
      <?php elseif($status == 3): ?>
      <dl id="menu-negotiation" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe616;</i>&nbsp;全市流转项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="circule/tclist_all" data-title="本部门发布转项目列表" href="javascript:void(0)">本部门发布转项目列表<?php if($owncount != 0 ): ?><span  class=" badge badge-danger radius " style=" display: block; overflow: hidden; float:right; margin-right:40px; margin-top:8px;  padding-right:5px;padding-left:5px;  border-radius:12px ;  color:#fff;"><?php echo e($owncount); ?></a></span><?php endif; ?></li>
            <li><a data-href="circule/tctracklist_all" data-title="本部门跟踪项目列表" href="javascript:void(0)">本部门跟踪项目列表&nbsp;<?php if($traccount != 0 ): ?><span  class=" badge badge-danger radius " style=" display: block; overflow: hidden; float:right; margin-right:52px; margin-top:8px;  padding-right:5px;padding-left:5px;  border-radius:12px ;  color:#fff;"><?php echo e($traccount); ?></a></span><?php endif; ?></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-landing" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe613;</i>&nbsp;落地项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
         <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="negotiation/tclist_all" data-title="本部门发布落地项目列表" href="javascript:void(0)">本部门发布落地项目列表</a></li>
            <li><a data-href="negotiation/tctracklist_all" data-title="本部门跟踪落地项目列表" href="javascript:void(0)">本部门跟踪落地项目列表</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-paper" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe60d;</i>&nbsp;项目资料库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>

            <li><a data-href="uploader/tclist_all" data-title="本部门发布项目资料列表" href="javascript:void(0)">本部门发布项目资料列表</a></li>
            <li><a data-href="uploader/tctracklist_all" data-title="本部门跟踪项目资料列表" href="javascript:void(0)">本部门跟踪项目资料列表</a></li>

          </ul>
        </dd>
      </dl>
      <dl id="menu-admin" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe62d;</i>&nbsp;管理员管理<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="/emp" data-title="管理员列表" href="javascript:void(0)">本部门管理员列表</a></li>
          </ul>
        </dd>
      </dl>
      <?php elseif($status ==4): ?>
      <dl id="menu-negotiation" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe616;</i>&nbsp;全市流转项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="circule/tclist" data-title="本人发布项目列表" href="javascript:void(0)">本人发布项目列表&nbsp;</a></li>
            <li><a data-href="circule/tctracklist" data-title="本人跟踪项目列表" href="javascript:void(0)">本人跟踪项目列表&nbsp;</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-landing" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe613;</i>&nbsp;落地项目库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
         <dd class="Hui-menu-item">
          <ul>
            <li><a data-href="negotiation/tclist" data-title="本人发布落地项目列表" href="javascript:void(0)">本人发布落地项目列表</a></li>
            <li><a data-href="negotiation/tctracklist" data-title="本人跟踪落地项目列表" href="javascript:void(0)">本人跟踪落地项目列表</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-paper" class="Hui-menu">
        <dt class="Hui-menu-title"><i class="Hui-iconfont">&#xe60d;</i>&nbsp;项目资料库<i class="Hui-iconfont Hui-admin-menu-dropdown-arrow">&#xe6d5;</i></dt>
        <dd class="Hui-menu-item">
          <ul>

            <li><a data-href="uploader/tclist" data-title="本人发布项目资料列表" href="javascript:void(0)">本人发布项目资料列表</a></li>
            <li><a data-href="uploader/tctracklist" data-title="本人跟踪项目资料列表" href="javascript:void(0)">本人跟踪项目资料列表</a></li>

          </ul>
        </dd>
      </dl>
      <?php endif; ?>


    </div>
  </aside>
  <div class="Hui-admin-aside-mask"></div>
  <!--/_menu 作为公共模版分离出去-->

  <div class="Hui-admin-dislpayArrow">
    <a href="javascript:void(0);" onClick="displaynavbar(this)">
      <i class="Hui-iconfont Hui-iconfont-left">&#xe6d4;</i>
      <i class="Hui-iconfont Hui-iconfont-right">&#xe6d7;</i>
    </a>
  </div>
  <section class="Hui-admin-article-wrapper">
    <!--_header 作为公共模版分离出去-->
    <header class="Hui-navbar">
      <div class="navbar">
        <div class="container-fluid clearfix">
          <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar">
            <ul class="clearfix">
              <li><?php echo e($dept_name); ?><?php if($status == 1 || $status == 3 || $status == 0   ): ?>管理员<?php else: ?> 招商人员<?php endif; ?></li>
              <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo e(Auth::user()->username); ?><i class="Hui-iconfont">&#xe6d5;</i></a>
                <ul class="dropDown-menu menu radius box-shadow">
                  <li><a href="javascript:;" onclick="admin_edit('管理员编辑','emp/<?php echo e(Auth::user()->id); ?>/edit')" class="ml-5" style="text-decoration:none">个人信息</a></li>
                  <li>
                      <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">退出</a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo e(csrf_field()); ?>

                        </form>
                  </li>
                </ul>
              </li>
              
              <li id="Hui-skin" class="dropDown dropDown_hover right">
                <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                <ul class="dropDown-menu menu radius box-shadow">
                  <li><a href="javascript:;" data-val="default" title="默认（蓝色）">默认（深蓝）</a></li>
                  <li><a href="javascript:;" data-val="black" title="黑色">黑色</a></li>
                  <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                  <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                  <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                  <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <!--/_header 作为公共模版分离出去-->

    <div id="Hui-admin-tabNav" class="Hui-admin-tabNav">
      <div class="Hui-admin-tabNav-wp">
        <ul id="min_title_list" class="acrossTab clearfix" style="width: 241px; left: 0px;">
          <li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
        </ul>
      </div>
      <div class="Hui-admin-tabNav-more btn-group" style="display: none;">
        <a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a>
        <a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a>
      </div>
    </div>

    <div id="iframe_box" class="Hui-admin-article">
      <div class="show_iframe">
        <iframe id="iframe-welcome" data-scrolltop="0" scrolling="yes" frameborder="0" src="welcome"></iframe>
      </div>
    </div>
  </section>
  <div class="contextMenu" id="Huiadminmenu">
    <ul>
      <li id="closethis">关闭当前 </li>
      <li id="closeother">关闭其他 </li>
      <li id="closeall">关闭全部 </li>
    </ul>
  </div>
  <!--_footer 作为公共模版分离出去-->
  <script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/lib/layer/3.1.1/layer.js"></script>
  <script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
  <script type="text/javascript" src="/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
  <script type="text/javascript" src="/static/h-ui.admin.pro.iframe/js/h-ui.admin.pro.iframe.min.js"></script>
  <!--/_footer /作为公共模版分离出去-->

  <!--请在下方写此页面业务相关的脚本-->
  <script type="text/javascript" src="/static/business/js/main.js"></script>
  <script type="text/javascript">
        function admin_edit(title,url){
        
        var index = layer.open({
        type: 2,
        title: title,
        content:url,
          area: ['800px', '600px']
      });
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/index1.blade.php ENDPATH**/ ?>