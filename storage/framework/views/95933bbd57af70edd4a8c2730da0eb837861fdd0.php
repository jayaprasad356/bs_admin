
<?php if(Cache::has('categories') && is_array(Cache::get('categories')) && count(Cache::get('categories'))): ?>
    <div class="main-content my-2 my-md-3">
        <section class="popular-categories">
            <div class="container-fluid">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="row">
                        <div class="col-12">
                            <div class="popular_title d-flex mb-3 align-items-baseline border-bottom">
                                <h2>
                                    <span
                                        class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e(__('msg.Popular Categories')); ?></span>
                                </h2>
                                <div class="pop_desc_title">
                                    <a href="<?php echo e(route('categories_all')); ?>"
                                        class="btn-1 view title-section view-all ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto"><?php echo e(__('msg.view_all')); ?>&nbsp;&nbsp;<i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                            <div class="popular_content">
                                <div class="popular-cat owl-carousel">
                                    <?php $__currentLoopData = Cache::get('categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($c->web_image !== ''): ?>
                                            <div class="pop_item-listcategories">
                                                <div class="pop_list-categories">
                                                    <div class="pop_thumb-category">
                                                        <a href="<?php echo e(route('category', $c->slug)); ?>"><img class="lazy"
                                                                data-original="<?php echo e($c->web_image); ?>"
                                                                alt="<?php echo e($c->name ?? 'Category'); ?>"></a>
                                                    </div>
                                                    <div class="pop_desc_listcat">
                                                        <div class="name_categories">
                                                            <h4>
                                                                <?php if(strlen(strip_tags($c->name)) > 20): ?>
                                                                    <?php echo substr(strip_tags($c->name), 0, 20) . '...'; ?>

                                                                <?php else: ?>
                                                                    <?php echo substr(strip_tags($c->name), 0, 20); ?>

                                                                <?php endif; ?>
                                                            </h4>
                                                        </div>
                                                        <div class="number_product">
                                                            <?php if(strlen(strip_tags($c->subtitle)) > 20): ?>
                                                                <?php echo substr(strip_tags($c->subtitle), 0, 20) . '...'; ?>

                                                            <?php else: ?>
                                                                <?php echo substr(strip_tags($c->subtitle), 0, 20); ?>

                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="view-more"><a
                                                                href="<?php echo e(route('category', $c->slug)); ?>"><?php echo e(__('msg.shop_now')); ?>

                                                                &nbsp;<em class="fas fa-chevron-circle-right"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="pop_item-listcategories-rounded">
                                                <div class="pop_thumb-category-rounded">
                                                    <a href="<?php echo e(route('category', $c->slug)); ?>">
                                                        <img src="<?php echo e($c->image); ?>?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=10&q=60"
                                                            alt="<?php echo e($c->name ?? 'Category'); ?>">
                                                    </a>
                                                </div>
                                                <div class="pop_desc_listcat">
                                                    <div class="name_categories">
                                                        <h4><?php echo e($c->slug); ?></h4>
                                                    </div>
                                                    <div class="number_product"><?php echo e($c->subtitle); ?></div>
                                                    <div class="view-more"><a
                                                            href="<?php echo e(route('category', $c->slug)); ?>"><?php echo e(__('msg.shop_now')); ?>

                                                            &nbsp;<em class="fas fa-chevron-circle-right"></em></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="popular_content">
                                <?php if(Cache::has('category_offer_images') &&
                                    is_array(Cache::get('category_offer_images')) &&
                                    count(Cache::get('category_offer_images'))): ?>
                                    <?php $__currentLoopData = Cache::get('category_offer_images'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($s->type == 'product'): ?>
                                            <a href="<?php echo e(route('product-single', $s->slug ?? '-')); ?>">
                                            <?php elseif($s->type == 'category'): ?>
                                                <a href="<?php echo e(route('category', $s->slug ?? '-')); ?>">
                                                <?php elseif($s->type == 'offer_image_url'): ?>
                                                    <a href="<?php echo e($s->offer_image_url); ?>" target="_blank">
                                                    <?php else: ?>
                                        <?php endif; ?>

                                        <div class="py-4 py-md-3 bg-white shadow-sm rounded">
                                            <div class="col-md-12">
                                                <div class="banner_box_content category">
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
            </div>
        </section>
    </div>
<?php endif; ?>
<?php /**PATH /home/u743445510/domains/graymatterworks.com/public_html/ecartwebsite/resources/views/themes/eCart/parts/categories.blade.php ENDPATH**/ ?>