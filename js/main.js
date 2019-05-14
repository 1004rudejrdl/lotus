//goto top button end// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
  headerResizingFunc()
};
// fixed top nav img size
var navbar_img = document.getElementById("navbar_img"); //네비그림
var header_img = document.getElementById("header_img"); //메인그림
var navbar = document.getElementById("navbar"); //메인그림

function headerResizingFunc() {
  if (window.pageYOffset < header_img.offsetHeight) {
    if ($(window).width()>1400) {//윈도우 1400px
      navbar.classList.remove("bg_white");
      $("#navbar_img").width(650);//로고 크기
    } else if ($(window).width()>800&&$(window).width()<=1400){
      navbar.classList.remove("bg_white");
      $("#navbar_img").width(450);
    }
  } else if (window.pageYOffset > header_img.offsetHeight) {//그림넘어가서
    if ($(window).width()>1400) {
      navbar.classList.add("bg_white");
      $("#navbar_img").width(250);
    } else if ($(window).width()>800&&$(window).width()<=1400){
      navbar.classList.add("bg_white");
      $("#navbar_img").width(200);
    }
  }
}
