<!-- seller sec -->
<?php if(Cache::has('seller') && is_array(Cache::get('seller')) && count(Cache::get('seller'))): ?>
    <div class="main-content my-2 my-md-3">
        <section class="new-arrival seller__sec">
            <div class="container-fluid">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product_right_bar">
                                <div class="product_container">
                                    <div class="section_title d-flex mb-3 align-items-baseline border-bottom">
                                        <h2>
                                            <span
                                                class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e(__('msg.Shop by Seller')); ?></span>
                                        </h2>
                                        <div class="pop_desc_title ml-auto">
                                            <a href="<?php echo e(route('seller_all')); ?>"
                                                class="btn-1 view title-section view-all ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto"><?php echo e(__('msg.view_all')); ?>&nbsp;&nbsp;<i
                                                    class="fas fa-long-arrow-alt-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="product_carousel_content seller-carousel owl-carousel">
                                        <?php $__currentLoopData = Cache::get('seller'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($s->name)): ?>
                                                <div class="product_items">
                                                    <article class="single_product">
                                                        <figure>
                                                            <div class="product_thumb">
                                                                <a class="primary_img"
                                                                    href="<?php echo e(route('seller', $s->slug ?? '-')); ?>">
                                                                    <img class="lazy"
                                                                        data-original="<?php echo e($s->logo); ?>"
                                                                        alt="seller"></a>
                                                            </div>
                                                            <figcaption class="product_content">
                                                                <h4 class="product_name"><a
                                                                        href="<?php echo e(route('seller', $s->slug ?? '-')); ?>"><?php echo e($s->store_name); ?></a>
                                                                </h4>
                                                            </figcaption>
                                                        </figure>
                                                    </article>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="popular_content">
                                        <?php if(Cache::has('seller_offer_images') &&
                                            is_array(Cache::get('seller_offer_images')) &&
                                            count(Cache::get('seller_offer_images'))): ?>
                                            <?php $__currentLoopData = Cache::get('seller_offer_images'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                                <img class="lazy " data-original="<?php echo e($s->image); ?>"
                                                                    alt="offer">
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
                            </div>
                        </div>
                        <!------------Category Offer Image-------------->

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php endif; ?>
<!-- seller sec end-->
<?php /**PATH /home/u743445510/domains/graymatterworks.com/public_html/ecartwebsite/resources/views/themes/eCart/parts/seller.blade.php ENDPATH**/ ?>