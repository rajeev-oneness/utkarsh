<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item  {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i>
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
                    <a class="treeview-item {{ sidebar_open(['admin.brand.*']) }}"
                    href="{{ route('admin.brand.index') }}">
                    <i class="icon fa fa-circle-o"></i>All Brands
                    </a>
                </li>
                <!-- <li>
                    <a class="app-menu__item {{ sidebar_open(['admin.settings']) }}"
                        href="{{ route('admin.settings') }}"><i class="app-menu__icon fa fa-cogs"></i>
                        <span class="app-menu__label">Settings</span>
                    </a>
                </li> -->
                {{-- <li>
                    <a class="treeview-item {{ sidebar_open(['admin.categories.*']) }}"
                    href="{{ route('admin.categories.index') }}">
                    <i class="icon fa fa-circle-o"></i>Categories
                    </a>
                </li> --}}
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
                    <a class="treeview-item {{ sidebar_open(['admin.categories.*']) }}"
                    href="{{ route('admin.categories.index') }}">
                    <i class="icon fa fa-circle-o"></i>All Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ sidebar_open(['admin.level1.*']) }}"
                    href="{{ route('admin.level1.index') }}">
                    <i class="icon fa fa-circle-o"></i>All Level1 Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ sidebar_open(['admin.level2.*']) }}"
                    href="{{ route('admin.level2.index') }}">
                    <i class="icon fa fa-circle-o"></i>All Level2 Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ sidebar_open(['admin.level3.*']) }}"
                    href="{{ route('admin.level3.index') }}">
                    <i class="icon fa fa-circle-o"></i>All Level3 Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ sidebar_open(['admin.level4.*']) }}"
                    href="{{ route('admin.level4.index') }}">
                    <i class="icon fa fa-circle-o"></i>All Level4 Categories
                    </a>
                </li>
                <li>
                    <a class="treeview-item {{ sidebar_open(['admin.level5.*']) }}"
                    href="{{ route('admin.level5.index') }}">
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
                    <a class="treeview-item {{ sidebar_open(['admin.banner.*']) }}"
                    href="{{ route('admin.banner.index') }}">
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
                    <a class="treeview-item {{ sidebar_open(['admin.size.*']) }}"
                    href="{{ route('admin.size.index') }}">
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
                    <a class="treeview-item {{ sidebar_open(['admin.shippingcharge.*']) }}"
                    href="{{ route('admin.shippingcharge.index') }}">
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
                    <a class="treeview-item {{ sidebar_open(['admin.products.*']) }}"
                    href="{{ route('admin.products.index') }}">
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
                    <a class="treeview-item {{ sidebar_open(['admin.productstock.*']) }}"
                    href="{{ route('admin.productstock.index') }}">
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
                    <a class="treeview-item {{ sidebar_open(['admin.couponcode.*']) }}"
                    href="{{ route('admin.couponcode.index') }}">
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
                    <a class="treeview-item {{ sidebar_open(['admin.couriers.*']) }}"
                    href="{{ route('admin.couriers.index') }}">
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
                    <a class="treeview-item {{ sidebar_open(['admin.blog.*']) }}"
                    href="{{ route('admin.blog.index') }}">
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
                    <a class="treeview-item {{ sidebar_open(['admin.testimonial.*']) }}"
                    href="{{ route('admin.testimonial.index') }}">
                    <i class="icon fa fa-circle-o"></i>All Testimonial
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.orders.*']) }}"
                href="{{ route('admin.orders.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Orders</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.settings.*']) }}"
                href="{{ route('admin.settings') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        {{-- <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Show</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="app-menu__item {{ sidebar_open(['admin.show.index']) }}"
                    href="{{ route('admin.show.index') }}">
                    <i class="icon fa fa-circle-o"></i>All Shows
                    </a>
                </li>
            </ul>
        </li> --}}
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">User</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="app-menu__item {{ sidebar_open(['admin.users.index']) }}"
                    href="{{ route('admin.users.index') }}">
                    <i class="icon fa fa-circle-o"></i>All User
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Package</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="app-menu__item {{ sidebar_open(['admin.packages.index']) }}"
                    href="{{ route('admin.packages.index') }}">
                    <i class="icon fa fa-circle-o"></i>All Package
                    </a>
                </li>
            </ul>
        </li> --}}
        {{-- <li>
            <a class="app-menu__item {{ sidebar_open(['admin.packages.getSubscriptions']) }}"
                href="{{ route('admin.packages.getSubscriptions') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">All Subscriptions</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.show.getPayPerClickSubscriptions']) }}"
                href="{{ route('admin.show.getPayPerClickSubscriptions') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">PPC Subscriptions</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.show.getTransactionsData']) }}"
                href="{{ route('admin.show.getTransactionsData') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">All Transactions</span>
            </a>
        </li> --}}
    </ul>
</aside>