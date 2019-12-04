<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('admin.include.header');
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{asset('public/admin/img/sidebar-5.jpg')}}">
        <!--left menu-->
    	@include('admin.include.leftmenu')

    </div>

    <div class="main-panel">
        <!--top menu-->
		@include('admin.include.topmenu')

        <!--content-->
        @yield('content')

        <!--footer menu-->
        @include('admin.include.footermenu')

    </div>
</div>


</body>

    @include('admin.include.footer')

</html>
