$(window).ready(function() {
  if ($(window).width() <= "480") {
  }

  $("#menu-min").click(function() {
    HideShowBar();
  });

  $("#close").click(function() {
    HideShowBar();
  });

  function HideShowBar() {
    $(".nav-mini").toggleClass("nav-mini-opened");
    $(".nav-mini-content").toggleClass("nav-mini-content-opened");
    $(".nav-mini-top").toggleClass("nav-mini-top-opened");
    $(".nav-mini-footer").toggleClass("nav-mini-footer-opened");
    $("#closeNavMini").toggle();
  }
});
