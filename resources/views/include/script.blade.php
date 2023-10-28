  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="{{ config('custom_app_url') }}/js/index.js"></script>

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
                var expression = new RegExp(search, "i");
                $.getJSON('/json/movies.json', function(data) {
                  $.each(data, function(key, value) {
                    if (value.title.search(expression) != -1) {
                      $('#result').css('display','inherit')
                      $('#result').append('<li style="cursor:pointer; display: flex; max-height: 200px;" class="list-group-item link-class"><img src="uploads/movie/' +
                                  value.image +
                                  '" width="100" class="" /><div style="flex-direction: column; margin-left: 2px;"><h4 width="100%">' +
                                  value.title +
                                  '</h4><span style="display: -webkit-box; max-height: 8.2rem; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; white-space: normal; -webkit-line-clamp: 5; line-height: 1.6rem;" class="text-muted">| ' +
                                  value.description + '</span></div></li>')
                    }
                  })
                })
              }
          })
          $('#result').on('click', 'li', function() {
              var click_text = $(this).text().split('|');
              $('#timkiem').val($.trim(click_text[0]));
              $('#result').html('');
          })
      })
  </script>
