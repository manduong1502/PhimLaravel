<!DOCTYPE html>
<html lang="en">

<head>
  @include('include.head')
  @if(isset($customCss))
        <link rel="stylesheet" href="{{ asset($customCss) }}">
    @endif
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