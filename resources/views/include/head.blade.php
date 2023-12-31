<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta name="csrf-token" content="{{csrf_token()}}"/>
  <title>{{$meta_title}}</title>
    <link rel="canonical" href="{{Request::url()}}">

    <link rel="next" href="">
    <link rel="icon" type="image/png" href="{{$meta_image}}" sizes="196x196">

    <meta name="revisit-after" content="1 days"/>
    <meta name="robots" content="index,follow"/>
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:description" content="{{$meta_description}}" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:image" content="{{$meta_image}}" />



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="{{asset('/css/index.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  @if(isset($customCss))
        <link rel="stylesheet" href="{{ asset($customCss) }}">
    @endif

  @if(isset($customCssArr))  
    @foreach ($customCssArr as $key => $val)
        <link rel="stylesheet" href="{{ asset($val) }}">
    @endforeach
  @endif
