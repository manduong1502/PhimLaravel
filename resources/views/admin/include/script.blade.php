 <!-- side nav js -->
 <script src='{{ asset('backend/js/SidebarNav.min.js') }}' type='text/javascript'></script>
 <script>
     $('.sidebar-menu').SidebarNav()
 </script>
 <!-- //side nav js -->

 <!-- Classie --><!-- for toggle left push menu script -->
 <script src="{{ asset('backend/js/classie.js') }}"></script>
 <script>
     var menuLeft = document.getElementById('cbp-spmenu-s1'),
         showLeftPush = document.getElementById('showLeftPush'),
         body = document.body;

     showLeftPush.onclick = function() {
         classie.toggle(this, 'active');
         classie.toggle(body, 'cbp-spmenu-push-toright');
         classie.toggle(menuLeft, 'cbp-spmenu-open');
         disableOther('showLeftPush');
     };

     function disableOther(button) {
         if (button !== 'showLeftPush') {
             classie.toggle(showLeftPush, 'disabled');
         }
     }
 </script>
 <!-- //Classie --><!-- //for toggle left push menu script -->

 <!--scrolling js-->
 <script src="{{ asset('backend/js/jquery.nicescroll.js') }}"></script>

 <!--//scrolling js-->

 <!-- Bootstrap Core JavaScript -->
 <script src="{{ asset('backend/js/bootstrap.js') }}"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
 crossorigin="anonymous"></script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
       
    $(document).on('change','.file_image',function(){

        var movie_id = $(this).data('movie_id');
        var files = $("#file-"+movie_id)[0].files;
        
        //console.log(files);
        var image = document.getElementById("file-"+movie_id).files[0];
        

        var form_data = new FormData();

        form_data.append("file", document.getElementById("file-"+movie_id).files[0]);
        form_data.append("movie_id",movie_id);
                $.ajax({
                    url:"{{route('update-image-movie-ajax')}}",
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:form_data,

                    contentType:false,
                    cache:false,
                    processData:false,

                    success:function(data){
                        location.reload();
                        $('#success_image').html('<span class="text-success">Cập nhật hình ảnh thành công</span>');
                    }
                });
    });
  </script>
  
  <script type="text/javascript">
    $('.slide_choose').change(function() {
        var slide_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('slide_choose') }}",
            method: "GET",
            data: {
              slide_val:slide_val,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.phimhot_choose').change(function() {
        var phimhot_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('phimhot_choose') }}",
            method: "GET",
            data: {
              phimhot_val:phimhot_val,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.trangthai_choose').change(function() {
        var trangthai_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('trangthai_choose') }}",
            method: "GET",
            data: {
              trangthai_val:trangthai_val,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.country_choose').change(function() {
        var country_id = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('country_choose') }}",
            method: "GET",
            data: {
              country_id:country_id,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>

  <script type="text/javascript">
    $('.category_choose').change(function() {
        var category_id = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('category_choose') }}",
            method: "GET",
            data: {
              category_id:category_id,
              movie_id:movie_id,
            },
            success:function(data) {
                alert('Thay đổi thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.select-movie').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('select-movie') }}",
            method: "GET",
            data: {
                id:id
            },
            success:function(data) {
                $('#show_movie').html(data)
            }
        });
    })
</script>
  <script type="text/javascript">
    $('.select-year').change(function() {
        var year = $(this).find(':selected').val();
        var id_phim = $(this).attr('id');
        $.ajax({
            url: "{{ route('update-year-phim') }}",
            method: "GET",
            data: {
                year: year,
                id_phim: id_phim
            },
            success: function() {
                alert('Thay đổi phim năm' + year + 'thành công');
            }
        });
    })
</script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
  } );
    function ChangeToSlug()
        {

            var slug;
         
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }

      </script>

<script type="text/javascript">
    $(".order_position" ).sortable({
      placeholder : 'ui-state-highlight',
      update: function( event, ui ) {
        var array_id =[];
        $(".order_position tr").each(function(){
          array_id.push($(this).attr('id'));
        });
        $.ajax({
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"{{route('resorting')}}",
          method:"POST",
          data:{array_id:array_id},
          success:function(data){
            alert('Sắp xếp thứ tự thành công');
          }
        })
      }
    });
</script>

<script type="text/javascript">
    $('.show_video').click(function() {
        var movie_id = $(this).data('movie_video_id');
        var episode_id = $(this).data('video_episode');
        $.ajax({
            url: "{{ route('watch-video') }}",
            method: "POST",
            dataType:"JSON",
            headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              movie_id: movie_id,
              episode_id: episode_id
            },
            success: function(data) {
              $('#video_title').html(data.video_title);
              $('#video_link').html(data.video_link);
              $('#video_desc').html(data.video_desc);
              $('#videoModal').modal('show');
            }
        });
    })
</script>