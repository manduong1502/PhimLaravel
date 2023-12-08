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
                var expression = new RegExp(search, "i");
                $.getJSON('/json/movies.json', function(data) {
                  $.each(data, function(key, value) {
                    if (value.title.search(expression) != -1) {
                      $('#result').css('display','inherit')
                      $('#result').append('<li style="cursor:pointer; display: flex; max-height: 200px; background-color: black" class="list-group-item link-class"><img src="uploads/movie/' +
                                  value.image +
                                  '" width="100" class="" /><div style="flex-direction: column; margin-left: 2px; color: white;"><h4 width="100%">' +
                                  value.title +
                                  '</h4></div></li>') 
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
      function showDropdown(element) {
        const dropdown = element.querySelector('.dropdown-menu');
        dropdown.style.display = 'block';
      }

      function hideDropdown(element) {
        const dropdown = element.querySelector('.dropdown-menu');
        dropdown.style.display = 'none';
      }



  </script>

<script type="text/javascript">
        
  function remove_background(movie_id)
   {
    for(var count = 1; count <= 5; count++)
    {
     $('#'+movie_id+'-'+count).css('color', '#ccc');
    }
  }

  //hover chuột đánh giá sao
 $(document).on('mouseenter', '.rating', function(){
    var index = $(this).data("index");
    var movie_id = $(this).data('movie_id');
  // alert(index);
  // alert(movie_id);
    remove_background(movie_id);
    for(var count = 1; count<=index; count++)
    {
     $('#'+movie_id+'-'+count).css('color', '#ffcc00');
    }
  });
 //nhả chuột ko đánh giá
 $(document).on('mouseleave', '.rating', function(){
    var index = $(this).data("index");
    var movie_id = $(this).data('movie_id');
    var rating = $(this).data("rating");
    remove_background(movie_id);
    //alert(rating);
    for(var count = 1; count<=rating; count++)
    {
     $('#'+movie_id+'-'+count).css('color', '#ffcc00');
    }
   });

  //click đánh giá sao
  $(document).on('click', '.rating', function(){
     
        var index = $(this).data("index");
        var movie_id = $(this).data('movie_id');
    
        $.ajax({
         url:"{{route('add-rating')}}",
         method:"POST",
         data:{index:index, movie_id:movie_id},
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         success:function(data)
         {
          if(data == 'done')
          {
           
           alert("Bạn đã đánh giá "+index +" trên 5");
           location.reload();
           
          }else if(data =='exist'){
            alert("Bạn đã đánh giá phim này rồi,cảm ơn bạn nhé");
          }
          else
          {
           alert("Lỗi đánh giá");
          }
          
         }
        });
      
      
        
  });


</script>

<!-- Bootstrap và jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>



