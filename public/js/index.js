const header = document.getElementById("site-header");

    // Sử dụng sự kiện cuộn (scroll) để kích hoạt header
    window.addEventListener("scroll", () => {
      if (window.scrollY > 100) { // Thay đổi màu sau khi cuộn xuống 100px
        header.classList.add("active");
      } else {
        header.classList.remove("active");
      }
    });

   
    $(document).ready(function () {
      $('.slider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 4,
        prevArrow: "<button type='button' class='slick-prev pull-left slick-arrow'><i class='fa-solid fa-chevron-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right slick-arrow'><i class='fa-solid fa-chevron-right' aria-hidden='true'></i></button>",

        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 900,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: true,
              dots: true
            }
          },
        ]
      });
    })

    $(document).ready(function () {
      $('.calendar').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: false,
       arrows:false,
      });
    })


    
    



// Lấy danh sách các liên kết và phần thông tin
const links = document.querySelectorAll(".miscellaneous-content-1-header-ul li a");
const infoDivs = document.querySelectorAll(".info");

// Mặc định, hiển thị thông tin cho tab đầu tiên và thêm lớp "active" cho liên kết
showInfo("info1");

// Xử lý sự kiện khi các liên kết được bấm
links.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        const targetId = e.target.getAttribute("href").substring(1); // Lấy id từ href
        showInfo(targetId);
    });
});

// Hàm hiển thị thông tin tương ứng và thêm lớp "active" cho liên kết
function showInfo(id) {
    infoDivs.forEach(div => {
        div.style.display = "none"; // Ẩn tất cả các div thông tin
    });
    const targetDiv = document.getElementById(id);
    targetDiv.style.display = "block";

    // Loại bỏ lớp "active" từ tất cả các liên kết
    links.forEach(link => {
        link.classList.remove("active");
    });

    // Thêm lớp "active" cho liên kết được bấm
    const activeLink = document.querySelector(`[href="#${id}"]`);
    activeLink.classList.add("active");
}












