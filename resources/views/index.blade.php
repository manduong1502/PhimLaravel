<!DOCTYPE html>
<html lang="en">

<head>
  @include('include.head')
</head>

<body>
  @include('include.header')

  <main>
    @yield('content')
  </main>

  @include('include.footer')

  

  @include('include.script')
</body>

</html>