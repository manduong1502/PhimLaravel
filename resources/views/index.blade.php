<!DOCTYPE html>
<html lang="en">

<head>
  @include('include.head')
</head>

<body class="preloading">

  <div class="load">
    <img src="{{asset('uploads/load/200w.gif')}}" alt="">

  </div>
  @include('include.header')

  <main>
    @yield('content')
  </main>

  @include('include.footer')

  

  @include('include.script')
</body>

</html>