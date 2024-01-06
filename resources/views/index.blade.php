<!DOCTYPE html>
<html lang="en">

<head>
  @include('include.head')
</head>

<body class="preloading">


  {{-- @role('uservip')
  <div class="load">
    <img src="{{asset('uploads/load/z5014504468188_734da398a0e2698852e0e2801d1e6b40.gif')}}" alt="">
  </div>
  @else 
  <div class="load">
    <img src="{{asset('uploads/load/z5014513062665_37d034222486e1c458336ccaa18e76b4.gif')}}" alt="">
  </div>
  @endrole --}}
  @include('include.header')

  <main>
    @yield('content')
  </main>

  @include('include.footer')

  

  @include('include.script')
</body>

</html>