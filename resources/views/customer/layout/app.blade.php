<!DOCTYPE html>
<html lang="en">
	@include('customer.partials.head')
<body>
	
	@include('customer.partials.header')
		@yield('content')
	@include('customer.partials.footer')

	<!-- js -->
	@include('customer.partials.script')
</body>
</html>