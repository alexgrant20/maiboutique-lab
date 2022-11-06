<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
   @include('layouts.header')
   <main class="container vw-100 vh-100 d-flex align-items-center justify-content-center">
      @yield('content')
   </main>
   @include('layouts.footer')
   @include('layouts.foot')
</body>

</html>
