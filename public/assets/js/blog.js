//Filter
$(document).ready(function(){
  $(".filter-item").click(function(){
    const value = $(this).attr("data-filter");
    if (value == "all"){
      $(".post-box").show("1000");
    }
    else{
      $(".post-box")
      .not("." + value)
      .hide("1000");
      $(".post-box")
      .filter("." + value)
      .show("1000");
    }
  });
  //active button
  $(".filter-item").click(function(){
    $(this).addClass("active-filter").siblings().removeClass("active-filter");
  });
});
//Header Background change on scroll
let header = document.querySelector('header')

window.addEventListener("scroll", () => {
  header.classList.toggle("shadow", window.scrollY > 0);
});

//hamburg animation
const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('nav ul');

menuToggle.addEventListener('click', function(){
  nav.classList.toggle('slide');;
});