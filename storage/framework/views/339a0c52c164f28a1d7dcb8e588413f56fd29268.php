<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item  <?php echo e(Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Master</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.brand.*'])); ?>"
                    href="<?php echo e(route('admin.brand.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Brands
                    </a>
                </li>
                <!-- <li>
                    <a class="app-menu__item <?php echo e(sidebar_open(['admin.settings'])); ?>"
                        href="<?php echo e(route('admin.settings')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                        <span class="app-menu__label">Settings</span>
                    </a>
                </li> -->
                
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Master Category</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.categories.*'])); ?>"
                    href="<?php echo e(route('admin.categories.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.level1.*'])); ?>"
                    href="<?php echo e(route('admin.level1.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Level1 Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.level2.*'])); ?>"
                    href="<?php echo e(route('admin.level2.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Level2 Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.level3.*'])); ?>"
                    href="<?php echo e(route('admin.level3.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Level3 Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.level4.*'])); ?>"
                    href="<?php echo e(route('admin.level4.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Level4 Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.level5.*'])); ?>"
                    href="<?php echo e(route('admin.level5.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Level5 Categories
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Banner</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.banner.*'])); ?>"
                    href="<?php echo e(route('admin.banner.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Banners
                    </a>
                </li>
            </ul>
        </li>
        <!-- <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Size</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.size.*'])); ?>"
                    href="<?php echo e(route('admin.size.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Sizes
                    </a>
                </li>
            </ul>
        </li> -->
        <!--<li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Shippingcharge</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.shippingcharge.*'])); ?>"
                    href="<?php echo e(route('admin.shippingcharge.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Shippingcharge
                    </a>
                </li>
            </ul>
        </li>-->
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Product</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.products.*'])); ?>"
                    href="<?php echo e(route('admin.products.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Products
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Sku Stock Manage</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.productstock.*'])); ?>"
                    href="<?php echo e(route('admin.productstock.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Sku Stock Manage
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Couponcode</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.couponcode.*'])); ?>"
                    href="<?php echo e(route('admin.couponcode.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Couponcode
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">couriers</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.couriers.*'])); ?>"
                    href="<?php echo e(route('admin.couriers.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All courier
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Blog</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.blog.*'])); ?>"
                    href="<?php echo e(route('admin.blog.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Blog
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Testimonial</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.testimonial.*'])); ?>"
                    href="<?php echo e(route('admin.testimonial.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Testimonial
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.orders.*'])); ?>"
                href="<?php echo e(route('admin.orders.index')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.settings.*'])); ?>"
                href="<?php echo e(route('admin.settings')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">User</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="app-menu__item <?php echo e(sidebar_open(['admin.users.index'])); ?>"
                    href="<?php echo e(route('admin.users.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All User
                    </a>
                </li>
            </ul>
        </li>
        
        
    </ul>
</aside><?php /**PATH /home/demo9dtx/public_html/dev/utkarsh/resources/views/admin/partials/sidebar.blade.php ENDPATH**/ ?>