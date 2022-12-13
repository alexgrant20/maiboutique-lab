<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="min-vh-100 position-relative">

   @if (Auth::check())
      @if (Auth::user()->role_id == 2)
         @include('navbar.headermember')
      @else
         @include('navbar.headeradmin')
      @endif
   @else
      @include('navbar.headerguest')

   @endif

   <main class="container vw-100 pb-5">
      @yield('content')
   </main>
   @include('layouts.footer')
   @include('layouts.foot')
</body>

</html>
