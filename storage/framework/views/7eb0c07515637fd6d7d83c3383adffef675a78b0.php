
<div class="main-slider-sec">
    <?php if(Cache::has('sliders') && is_array(Cache::get('sliders')) && count(Cache::get('sliders'))): ?>
        <div class="slider-activation owl-carousel nav-style dot-style nav-dot-left">
            <?php $__currentLoopData = Cache::get('sliders'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($s->type == 'product'): ?>
                    <a href="<?php echo e(route('product-single', $s->slug ?? '-')); ?>">
                    <?php elseif($s->type == 'category'): ?>
                        <a href="<?php echo e(route('category', $s->slug ?? '-')); ?>">
                        <?php elseif($s->type == 'slider_url'): ?>
                            <a href="<?php echo e($s->slider_url); ?>" target="_blank">
                            <?php else: ?>
                <?php endif; ?>
                <div class="single-slider-content height-100vh bg-img" data-dot="0<?php echo e($i + 1); ?>">
                    <img class="lazy"
                        src="<?php echo e($s->image); ?>?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=10&q=60"
                        alt="Slider1">
                </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<!-- shipping area -->
<section class="shipping-content">

    <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm outer-ship">

        <div class="shipping_inner_content">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single_shipping_content">
                        <div class="shipping_icon">
                            <em class="far fa-<?php echo e(__('msg.iconbox1_i')); ?>"></em>
                        </div>
                        <div class="shipping_content">
                            <h2><?php echo e(__('msg.iconbox1_h2')); ?></h2>
                            <p><?php echo e(__('msg.iconbox1_p')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single_shipping_content">
                        <div class="shipping_icon">
                            <em class="fab fa-<?php echo e(__('msg.iconbox2_i')); ?>"></em>
                        </div>
                        <div class="shipping_content">
                            <h2><?php echo e(__('msg.iconbox2_h2')); ?></h2>
                            <p><?php echo e(__('msg.iconbox2_p')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single_shipping_content">
                        <div class="shipping_icon">
                            <em class="fas fa-<?php echo e(__('msg.iconbox3_i')); ?>"></em>
                        </div>
                        <div class="shipping_content">
                            <h2><?php echo e(__('msg.iconbox3_h2')); ?></h2>
                            <p><?php echo e(__('msg.iconbox3_p')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single_shipping_content">
                        <div class="shipping_icon">
                            <em class="fas fa-<?php echo e(__('msg.iconbox4_i')); ?>"></em>
                        </div>
                        <div class="shipping_content">
                            <h2><?php echo e(__('msg.iconbox4_h2')); ?></h2>
                            <p><?php echo e(__('msg.iconbox4_p')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 container-fluid mt-20">


        <div class="popular_content bg-white shadow-sm rounded">
            <?php if(Cache::has('slider_offer_images') &&
                is_array(Cache::get('slider_offer_images')) &&
                count(Cache::get('slider_offer_images'))): ?>
                <?php $__currentLoopData = Cache::get('slider_offer_images'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($s->type == 'products'): ?>
                        <a href="<?php echo e(route('product-single', $s->slug ?? '-')); ?>">
                        <?php elseif($s->type == 'category'): ?>
                            <a href="<?php echo e(route('category', $s->slug ?? '-')); ?>">
                            <?php elseif($s->type == 'offer_image_url'): ?>
                                <a href="<?php echo e($s->offer_image_url); ?>" target="_blank">
                                <?php else: ?>
                    <?php endif; ?>


                    <div class="row my-md-5 my-sm-2 my-3">
                        <div class="col-md-12">
                            <div class="banner_box_content">
                                <?php if(isset($s->offer_type) && $s->offer_type == 'image'): ?>
                                    <img class="lazy " data-original="<?php echo e($s->image); ?>" alt="offer">
                                <?php elseif(isset($s->offer_type) && $s->offer_type == 'video'): ?>
                                    <video controls class="w-100">
                                        <source src="<?php echo e($s->video); ?>" type="video/mp4">
                                    </video>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /home/u743445510/domains/graymatterworks.com/public_html/ecartwebsite/resources/views/themes/eCart/home.blade.php ENDPATH**/ ?>