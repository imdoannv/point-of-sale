<nav class="side-nav">
    <a href="/" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('admin/dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> Shop of Noad </span>
    </a>
    <div class="side-nav__devider my-6"></div>
{{--    <a href="{{route("cart")}}" class="intro-x flex items-center pl-5 pt-4">--}}
    <a href="{{ route('cart.show') }}" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('admin/dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> Giỏ hàng </span>
    </a>
</nav>
