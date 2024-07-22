
<?php if(Cache::has('offers') && is_array(Cache::get('offers')) && count(Cache::get('offers'))): ?>
    <?php $__currentLoopData = Cache::get('offers'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($o->type == 'products'): ?>
            <a href="<?php echo e(route('product-single', $o->slug ?? '-')); ?>">
            <?php elseif($o->type == 'category'): ?>
                <a href="<?php echo e(route('category', $o->slug ?? '-')); ?>">
                <?php elseif($o->type == 'offer_image_url'): ?>
                    <a href="<?php echo e($o->offer_image_url); ?>" target="_blank">
                    <?php else: ?>
        <?php endif; ?>

        <div class="main-content">
            <div class="container-fluid">
                <div class="py-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="col-md-12">
                        <div class="banner_box_content category">
                            <?php if(isset($o->offer_type) && $o->offer_type == 'image'): ?>
                                <img class="lazy " data-original="<?php echo e($o->image); ?>" alt="offer">
                            <?php elseif(isset($o->offer_type) && $o->offer_type == 'video'): ?>
                                <video controls class="w-100">
                                    <source src="<?php echo e($o->video); ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/u743445510/domains/graymatterworks.com/public_html/ecartwebsite/resources/views/themes/eCart/parts/offers.blade.php ENDPATH**/ ?>