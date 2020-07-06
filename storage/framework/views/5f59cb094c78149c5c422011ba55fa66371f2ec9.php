
<?php $__env->startSection('content'); ?>
<body>

  <div class="pd-20">
    <table class="table table-border table-bordered table-hover">
      <tbody>

        <tr>
          <th class="text-r" width="100">项目名称：</th>
          <td colspan='5'><?php echo e($information['name']); ?> </td>

        </tr>
         <tr>
          <th class="text-r">项目国别：</th>
          <td colspan='2'>
           <?php echo e($information->info_area->YAT_CNNAME); ?>

         </td>
          <th class="text-r">项目类型：</th>
          <td colspan='2'><?php echo e($information['industry']); ?> </td>
        </tr>

        <tr>
          <th class="text-r" width="100">投资金额：</th>
          <td colspan='2'><?php echo e($information['investment']); ?><?php if($information['currency'] =='0'): ?>万人民币
                    <?php elseif($information['currency'] =='1'): ?>万美元
                    <?php elseif($information['currency'] =='2'): ?>万欧元
                    <?php endif; ?> 
          </td>
          <th class="text-r" width="100">资方负责人：</th>
          <td colspan='2'><?php echo e($information['cont_main']); ?> </td>
        </tr>
        <tr>
          <th class="text-r" width="100">主要投资方：</th>
          <td colspan='2'><?php echo e($information['cont_unit']); ?> </td>
          <th class="text-r" width="100">资方联系人：</th>
          <td colspan='2'><?php echo e($information['cont_name']); ?> </td>
        </tr>
        <tr>
          <th class="text-r" width="100">资方联系方式：</th>
          <td colspan='2'><?php echo e($information['cont_phone']); ?> </td>
          <th class="text-r" width="100">是否重大项目：</th>
          <td colspan='2'>
            <?php if($information['major_pro'] == 0 ): ?>
              否
            <?php else: ?>
              <?php $__currentLoopData = $major; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($x->id == $information['major_pro']): ?>
                 <?php echo e($x->p_name); ?>

                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>


          </td>
        </tr>
        <?php if($information['circule_id'] == '0'): ?>

        <tr>
          <th class="text-r" width="100">首谈地：</th>
          <td>
            <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($e->id == $information['emp_id']): ?>
                <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($d->id == $e->dept_id): ?>
                  <?php echo e($d->dept_name); ?>

                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </td>
          <th class="text-r" width="100">首谈地联系人：</th>
          <td>            
            <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($e->id == $information['emp_id']): ?>
                <?php echo e($e->username); ?>

              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </td>
          <th class="text-r" width="100">首谈地联系方式：</th>
          <td>
            <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($e->id == $information['emp_id']): ?>
                <?php echo e($e->phone); ?>

              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </td>
        </tr>

        <?php else: ?>
        <tr>
          <th class="text-r" width="100">首谈地：</th>
          <td>
            <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($e->id == $information['emp_id']): ?>
                <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($d->id == $e->dept_id): ?>
                  <?php echo e($d->dept_name); ?>

                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </td>
          <th class="text-r" width="100">首谈地联系人：</th>
          <td>            
            <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($e->id == $information['emp_id']): ?>
                <?php echo e($e->username); ?>

              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
          </td>
          <th class="text-r" width="100">首谈地联系方式：</th>
          <td>
            <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($e->id == $information['emp_id']): ?>
                <?php echo e($e->phone); ?>

              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </td>
        </tr>
        <tr>
          <th class="text-r" width="100">落户地：</th>
          <td>
            <?php $__currentLoopData = $depts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($e->id == $information['circule_to']): ?>
                <?php echo e($e->dept_name); ?>

              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </td>
          <th class="text-r" width="100">落户地联系人：</th>
          <td>
            <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($e->id == $information['circule_id']): ?>
                <?php echo e($e->username); ?>

              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
          </td>
          <th class="text-r" width="100">落户地联系方式：</th>
          <td>
            <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($e->id == $information['circule_id']): ?>
                <?php echo e($e->phone); ?>

              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </td>
        </tr>
        <?php endif; ?>
        <tr>
          <th class="text-r" >项目简介：</th>
          <td colspan='5'><?php echo e($information['content']); ?> </td>
        </tr>
        <tr>
          <th class="text-r" >项目诉求：</th>
          <td colspan='5'><?php echo e($information['appeal']); ?> </td>
        </tr>

      
      </tbody>
    </table>
  </div>
  <!--_footer 作为公共模版分离出去-->
  <script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="lib/layer/3.1.1/layer.js"></script>
  <script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
  <!--/_footer /作为公共模版分离出去-->
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/Code/funds/resources/views/information/show.blade.php ENDPATH**/ ?>