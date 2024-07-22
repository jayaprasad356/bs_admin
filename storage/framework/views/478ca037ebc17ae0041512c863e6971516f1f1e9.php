<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php echo e($data['title']); ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo e($data['title']); ?>

                    </li>
                </ol>
                <div class="divider-15 d-none d-xl-block"></div>
            </div>
        </div>
    </div>
</section>
<!-- seller sec -->
<?php if(isset($data['data'])): ?>
<div class="main-content mt-4 my-md-2">
    <section class="popular-categories  mt-md-3 mt-sm-2 mt-3 categories__viewall">
        <div class="container-fluid">
            <div class="row">
                <div class="popular_content">
                    <div class="row">
                        <?php $__currentLoopData = $data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($c->web_image !== ''): ?>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="pop_item-listcategories">
                                <div class="pop_list-categories">
                                    <div class="pop_thumb-category">
                                        <a href="<?php echo e(route('category', $c->slug)); ?>"><img class="lazy" data-original="<?php echo e($c->web_image); ?>" alt="<?php echo e($c->name ?? 'Category'); ?>"></a>
                                    </div>
                                    <div class="pop_desc_listcat">
                                        <div class="name_categories">
                                            <h4><?php echo e($c->name); ?></h4>
                                        </div>
                                        <div class="number_product"><?php echo e($c->subtitle); ?></div>
                                        <div class="view-more"><a href="<?php echo e(route('category', $c->slug)); ?>"><?php echo e(__('msg.shop_now')); ?> &nbsp;<em class="fas fa-chevron-circle-right"></em></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="pop_item-listcategories-rounded">
                                <div class="pop_thumb-category-rounded">
                                    <a href="<?php echo e(route('category', $c->slug)); ?>">
                                        <img class="lazy" data-original="<?php echo e($c->image); ?>" alt="<?php echo e($c->name ?? 'Category'); ?>">
                                    </a>
                                </div>
                                <div class="pop_desc_listcat">
                                    <div class="name_categories">
                                        <h4><?php echo e($c->name); ?></h4>
                                    </div>
                                    <div class="number_product"><?php echo e($c->subtitle); ?></div>
                                    <div class="view-more"><a href="<?php echo e(route('category', $c->slug)); ?>"><?php echo e(__('msg.shop_now')); ?> &nbsp;<em class="fas fa-chevron-circle-right"></em></a></div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<?php endif; ?>


<?php /**PATH /home/u743445510/domains/graymatterworks.com/public_html/ecartwebsite/resources/views/themes/eCart/categories_all.blade.php ENDPATH**/ ?>