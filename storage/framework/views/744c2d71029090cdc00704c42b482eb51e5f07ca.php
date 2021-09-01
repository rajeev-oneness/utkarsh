<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item  <?php echo e(Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item  <?php echo e(Route::currentRouteName() == 'admin.vendor.*' ? 'active' : ''); ?>" href="<?php echo e(route('admin.vendor.list')); ?>"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Vendor</span>
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
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.godown.*'])); ?>"
                    href="<?php echo e(route('admin.godown.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>All Godowns
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.couriers.*'])); ?>"
                    href="<?php echo e(route('admin.couriers.index')); ?>">
                    <i class="icon fa fa-circle-o"></i>Courier Management
                    </a>
                </li>
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
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.products.*'])); ?>"
                    href="<?php echo e(route('admin.products.import')); ?>">
                    <i class="icon fa fa-circle-o"></i>Bulk Upload
                    </a>
                </li>
                <li>
                    <a class="treeview-item <?php echo e(sidebar_open(['admin.products.*'])); ?>"
                    href="<?php echo e(route('admin.products.upload_images')); ?>">
                    <i class="icon fa fa-circle-o"></i>Bulk Image Upload
                    </a>
                </li>
            </ul>
        </li>
        
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.productstock.*'])); ?>"
                href="<?php echo e(route('admin.productstock.index')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Sku Stock Manage</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.couponcode.*'])); ?>"
                href="<?php echo e(route('admin.couponcode.index')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">All Coupon code</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.orders.*'])); ?>"
                href="<?php echo e(route('admin.orders.index')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Report</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item"
                    href="<?php echo e(route('admin.orders.today_sales')); ?>">
                    <i class="icon fa fa-circle-o"></i>Today's Sales
                    </a>
                </li>
                <li>
                    <a class="treeview-item"
                    href="<?php echo e(route('admin.orders.date_wise_report')); ?>">
                    <i class="icon fa fa-circle-o"></i>Date Wise Sales
                    </a>
                </li>
                <li>
                    <a class="treeview-item"
                    href="<?php echo e(route('admin.orders.transaction_list')); ?>">
                    <i class="icon fa fa-circle-o"></i>Online Transactions
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.users.index'])); ?>"
                href="<?php echo e(route('admin.users.index')); ?>"> <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Customers</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.users.delivery_boys'])); ?>"
                href="<?php echo e(route('admin.users.delivery_boys')); ?>"> <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Delivery Boys</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.banner.*'])); ?>"
                href="<?php echo e(route('admin.banner.index')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Banners</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.blog.*'])); ?>"
                href="<?php echo e(route('admin.blog.index')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Blogs</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.testimonial.*'])); ?>"
                href="<?php echo e(route('admin.testimonial.index')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Testimonials</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php echo e(sidebar_open(['admin.settings.*'])); ?>"
                href="<?php echo e(route('admin.settings')); ?>"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        
    </ul>
</aside><?php /**PATH /home/kaboi2pm1r04/public_html/utkarsh/resources/views/admin/partials/sidebar.blade.php ENDPATH**/ ?>