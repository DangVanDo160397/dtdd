
              <nav>
                    <ul>
                        <li class="sub-menu">
                            <a href="{{route('admin.product.index')}}"><i class="fas fa-pencil-alt"></i>Sản Phẩm </a>
                        </li>
                        <li class="sub-menu">
                            <a href="{{ route('admin.company.index')}}"><i class="fas fa-folder"></i>Danh Mục </a>
                        </li>
                        <li class="sub-menu">
                            <a href="{{ route('admin.new.index')}}"><i class="fas fa-newspaper"></i></i>Tin Tức </a>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="fas fa-shopping-cart"></i>Đơn Đặt Hàng <i class="fa fa-angle-down"></i></a>
                            <ul class="children" id="categories">
                                <li><a href="{{ route('admin.order.index')}}"><span>-</span> Đơn hàng chưa nhận</a></li>
                                <li><a href="{{route('admin.order.received')}}"><span>-</span> Đơn hàng đã nhận</a></li>
                            </ul>
                        </li>
                        @can('permission',Auth::user())
                        <li class="sub-menu">
                            <a href="#"><i class="fas fa-user"></i>Thành Viên <i class="fa fa-angle-down"></i></a>
                            <ul class="children" id="categories">
                                <li><a href="{{route('admin.profile.index')}}"><span>-</span> Quản trị viên</a></li>
                                <li><a href="{{route('admin.customer.index')}}"><span>-</span> Khách hàng</a></li>
                            </ul>
                        </li>
                        @endcan
                        <li class="sub-menu" id="setting"><a href="{{route('admin.get.index')}}"><i class="fas fa-database"></i>Thống kê</a></li>
                        @can("permission",Auth::user())          
                        <li class="sub-menu" id="setting"><a href=""><i class="fa fa-cog"></i>Cài Đặt</a></li>
                        @endcan
                        <li class="sub-menu" id="setting"><a href="{{route('customer.index')}}"><i class="fas fa-hand-point-right"></i></i>Hoàng hà mobile</a></li>
                        <li class="sub-menu" id="setting"><a href="{{route('admin.get.logout')}}"><i class="fas fa-sign-out-alt"></i></i>Đăng Xuất</a></li>         
                    </ul>
                </nav>