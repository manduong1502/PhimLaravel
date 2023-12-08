// function showContent(id) {
//     var contents = document.getElementsByClassName("content");
//     for (var i = 0; i < contents.length; i++) {
//       contents[i].style.display = "none"; // Ẩn tất cả các nội dung
//     }
//     var content = document.getElementById(id);
//     content.style.display = "block"; // Hiển thị nội dung tương ứng với nút được nhấn
//   }
// Lấy danh sách các liên kết và phần thông tin
const links = document.querySelectorAll(".miscellaneous-content-1-header-ul li a");
const infoDivs = document.querySelectorAll(".info");

// Mặc định, hiển thị thông tin cho tab đầu tiên và thêm lớp "active" cho liên kết
showInfo("phim-sap-chieu");

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

window.addEventListener('DOMContentLoaded', (event) => {
  showInfo('phim-sap-chieu'); // Kích hoạt tab 'info-1'
  const defaultActiveLink = document.querySelector('[href="#phim-sap-chieu"]');
  defaultActiveLink.classList.add('active'); // Thêm lớp 'active' cho tab 'info-1'
});

document.addEventListener("DOMContentLoaded", function () {
    var items = document.querySelectorAll('.carousel-item');
    var visibleCount = 3; // Số ảnh hiển thị mỗi lần
    
    for (var i = 0; i < items.length; i += visibleCount) {
      var slice = Array.prototype.slice.call(items, i, i + visibleCount);
      var div = document.createElement('div');
      div.className = 'carousel-item';
  
      slice.forEach(function (item) {
        div.appendChild(item.querySelector('.row').cloneNode(true));
      });
  
      document.querySelector('.carousel-inner').appendChild(div);
    }
  });
  