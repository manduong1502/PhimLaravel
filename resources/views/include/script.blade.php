  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="js/index.js"></script>

  @if(isset($customCssArr))  
    @foreach ($customJsArr as $key => $val)
    <script src="{{ asset($val) }}"></script>
    @endforeach
  @endif

  <script type="text/javascript">

$(document).ready(function () {
  $('#timkiem').keyup(function() {
    $('#result').html('');
    var search = $('#timkiem').val();
    if (search != '') {
      $('#result').css('display' 'inherit');
      var expression = new RegExp(search, "i");
      $.getJSON('/json/movies.json', function(data) {
        $.each(data, function(key, value) {
          if(value.title.search(expression) != -1 ) {
            $('#result').append('<li class="list-group-item" style ="cursor:pointer"><img height="40" width="40" src= "/ '+ value.image+'">'+value.title+'</li>');
          }
        })
      });
    }else {
      $('#result').css('display' 'none');
    }
  })

  $('#result').on('click', 'li', function() {
    var click_text  = $(this).text().split('|');
    $('#timkiem').val($.trim(click_text(0)));
    $('#result').html('');
    $('#result').css('display' 'none');
  })
}) 

  </script>