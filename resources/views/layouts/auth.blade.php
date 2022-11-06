<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
   <main class="container vw-100 vh-100 d-flex align-items-center justify-content-center">
      @yield('content')
   </main>
   @include('layouts.foot')
</body>

</html>
