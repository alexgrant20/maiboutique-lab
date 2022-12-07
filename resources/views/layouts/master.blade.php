<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>

    @if (Auth::check())
        @if(Auth::user()->role_id == 2)
            @include('navbar.headermember')
        @else
            @include('navbar.headeradmin')
        @endif
    @else
        @include('navbar.headerguest')

    @endif

   <main class="container vw-100 d-flex align-items-center justify-content-center">
      @yield('content')
   </main>
   @include('layouts.footer')
   @include('layouts.foot')
</body>

</html>
