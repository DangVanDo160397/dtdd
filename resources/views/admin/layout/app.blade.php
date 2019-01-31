<!DOCTYPE html>
<html lang="en">
    @include('admin.partials.head')
    <?php 
        $acc = Auth::user();
     ?>
    <body>
        <div id="main">
            <div id="title">
                <div id="info">
                    <span id="avatar"><img src="https://scontent.fhan5-3.fna.fbcdn.net/v/t1.0-9/18740053_874668246006034_5913490455533670464_n.jpg?_nc_cat=106&_nc_ht=scontent.fhan5-3.fna&oh=7c568cc8abaecb235506e8a7f9dda232&oe=5CCDD223" alt=""></span>
                    <ts>{{ $acc->name}}</ts>
                    <span>{{ $acc->permission }}</span>
                </div>
                <div class="title">Admin Panel</div>
            </div>
            <div id="left">
                @include('admin.partials.header')
            </div>
            <!-- ===============ADD THE CLASS ACTIVE TO THE MENU=================== -->
            <div id="right">
                <div class="box">
                    @yield('content')
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        @include('admin.partials.footer')
        <!-- @include('admin.partials.script') -->
    </body>
</html>