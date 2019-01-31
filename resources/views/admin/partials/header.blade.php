
                 <?php 
                    // $acc = Auth::guard('admin')->user();
                 ?>
              <nav>
                    <ul>
                        <li class="sub-menu">
                            <a href="#"><i class="fas fa-pencil-alt"></i>Sản Phẩm <i class="fa fa-angle-down"></i></a>
                            <ul class="children" id="categories">
                                <li><a href="{{route('admin.product.index')}}"><span>-</span> Tất cả sản phẩm</a></li>
                                <li><a href="#"><span>-</span> Quản lý sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="fas fa-folder"></i>Danh Mục <i class="fa fa-angle-down"></i></a>
                            <ul class="children" id="categories">
                                <li><a href="{{ route('admin.company.index')}}"><span>-</span> Tất cả danh mục</a></li>
                                <li><a href="#"><span>-</span> Quản lý danh mục</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="fas fa-newspaper"></i></i>Tin Tức <i class="fa fa-angle-down"></i></a>
                            <ul class="children" id="categories">
                                <li><a href="{{ route('admin.new.index')}}"><span>-</span> Tất cả tin tức</a></li>
                                <li><a href="#"><span>-</span> Quản lý tin tức</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="fas fa-shopping-cart"></i>Đơn Đặt Hàng <i class="fa fa-angle-down"></i></a>
                            <ul class="children" id="categories">
                                <li><a href="#"><span>-</span> Tất cả đơn đặt hàng</a></li>
                                <li><a href="#"><span>-</span> Đơn hàng hủy trả</a></li>
                            </ul>
                        </li>
                        @can('permission',Auth::user())
                        <li class="sub-menu">
                            <a href="#"><i class="fas fa-user"></i>Thành Viên <i class="fa fa-angle-down"></i></a>
                            <ul class="children" id="categories">
                                <li><a href="{{route('admin.profile.index')}}"><span>-</span> Tất cả thành viên</a></li>
                                <li><a href="#"><span>-</span> Quản lý thành viên</a></li>
                            </ul>
                        </li>
                        @endcan
                        @can("permission",Auth::user())          
                        <li class="sub-menu" id="setting"><a href=""><i class="fa fa-cog"></i>Cài Đặt</a></li>
                        @endcan
                        <li class="sub-menu" id="setting"><a href="{{route('admin.get.logout')}}"><i class="fas fa-sign-out-alt"></i></i>Đăng Xuất</a></li>         
                    </ul>
                </nav>