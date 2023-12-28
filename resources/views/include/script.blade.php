  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId=1147305813340707" nonce="1bDodH7F"></script>
  <script src="{{asset('/js/index.js')}}"></script>
  

  @if (isset($customCssArr))
      @foreach ($customJsArr as $key => $val)
          <script src="{{ asset($val) }}"></script>
      @endforeach
  @endif

  <script type="text/javascript">
    $(document).ready(function() {
        $('#timkiem').keyup(function() {
            
            $('#result').html('');
            var search = $('#timkiem').val();
            if (search != '') {
              $('#result').css('display','inherit');
              var expression = new RegExp(search, "i");
              $.getJSON('/json/movies.json', function(data) {
                $.each(data, function(key, value) {
                  if (value.title.search(expression) != -1) {
                    $('#result').append('<li style="cursor:pointer; display: flex; max-height: 200px; background-color: #f8f9fa" class="list-group-item link-class"><img src="' +
                                value.image +
                                '" width="100" class="" /><div style="flex-direction: column; margin-left: 10px; color: #000000;"><p style=" width="100%">' +
                                value.title +
                                '</p></div></li>') 
                  }
                })
              })
            }else {
              $('#result').css('display','none');
            }
        })
        $('#result').on('click', 'li', function() {
            var click_text = $(this).text().split('|');
            $('#timkiem').val($.trim(click_text[0]));
            $('#result').html('');
            $('#result').css('display','none');
        })
    })
  </script>





