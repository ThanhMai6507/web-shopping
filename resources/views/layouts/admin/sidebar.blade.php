

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li class="submenu"> 
                    <a href="{{url('/admin/home')}}"><i></i> <span>Dashboard</span></a>
                </li>
                <li class="menu-title"> 
                    <span>Pages</span>
                </li>
                <li class="submenu">
                    <a href="#"> <span> Menu </span> <span class="ti-angle-down"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('menu-type.create')}}">Thêm Menu </a></li>
                        <li><a href="{{route('menu-type.index')}}">Liệt Kê Menu </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"> <span> Slide </span> <span class="ti-angle-down"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('slide.create')}}">Thêm Slide </a></li>
                        <li><a href="{{route('slide.index')}}">Liệt Kê Slide </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"> <span> Danh Mục </span> <span class="ti-angle-down"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('category.create')}}">Thêm Danh Mục</a></li> 
                        <li><a href="{{route('category.index')}}">Liệt Danh Mục </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"> <span> Sản Phẩm </span> <span class="ti-angle-down"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('product.create')}}">Thêm Sản Phẩm </a></li>
                        <li><a href="{{route('product.index')}}">Liệt Sản Phẩm </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"> <span> Đơn Hàng </span> <span class="ti-angle-down"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('menu-type.index')}}"> Đơn Hàng </a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</div>