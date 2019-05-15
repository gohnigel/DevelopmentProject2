/*eslint-env browser*/
var slideIndex = 0;

function showSlides() {
  "use strict";
  var i, slides = document.getElementsByClassName("mySlides"), dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i += 1) {
    slides[i].style.display = "none";
  }
  slideIndex += 1;
  if (slideIndex > slides.length) {slideIndex = 1; }
  for (i = 0; i < dots.length; i += 1) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  setTimeout(showSlides, 1500); // Change image every 2 seconds
}

function plusSlides(slideIndex){
  "use strict";
  var i, slides = document.getElementsByClassName("mySlides"), dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i += 1) {
    slides[i].style.display = "none";
  }
  slideIndex += 1;
  if (slideIndex > slides.length) {slideIndex = 1; }
  for (i = 0; i < dots.length; i += 1) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  
  dots[slideIndex - 1].className += " active";
}

showSlides();
plusSlides(slideIndex);