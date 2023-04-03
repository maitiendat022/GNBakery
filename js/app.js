
$(document).ready(function(){
         $('.sub-menu').parent('li').addClass('has-child');

var counter = 1;
    setInterval(function(){
       document.getElementById('radio' + counter).checked = true;
       counter++;
       if (counter > 4) {
        counter = 1;
       } 
    }, 3000);

    $('.row').slick({
     
        slidesToShow: 3,
        slidesToScroll: 2,
        infinite: true,
        arrow:true,
        autoplaySpeed: 2000,
        autoplay: true,
        responsive: [
            {
              breakpoint: 1024,
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
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ],
            prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"

      });

    $('.productss').slick({
     
        slidesToShow: 4,
        slidesToScroll: 2,
        infinite: true,
        arrow:true,
        autoplaySpeed: 2000,
        autoplay: true,
        responsive: [
            {
              breakpoint: 1024,
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
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ],
            prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"       
      });

      $(window).scroll(function(){
        if($(this).scrollTop()){
            $('#backtop').faceIn();

        }else{
            $('#backtop').faceOut();
        }
      });
      $('#backtop').click(function(){
          $('html, body').animate({scrollTop: 0}, 400);
      });

  // $("#search").keydown(function(){
  //   let search = $("#search").val();
  //   if(search.length > 0){ 
  //     $('.sub-search').show();
  //   } else {
  //     $('.sub-search').hide();
  //   }
  // });

    $("#search").autocomplete({
      source: "search.php"
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $("<li class='sub-search-item'>")
        .append(`<a href='./product.php?id=${item.value}' class='sub-search-link'>
                  <img class='sub-search-link__img' src='./assets/images/products/${item.image}' alt=''>
                  <h5 class='sub-search-link__name'>
                    ${item.label}
                  </h5>
                  <span class='sub-search-link__price'>
                  ${item.price}&#8363
                  </span>
                </a>`
                )
        .appendTo(ul);
    };


});

  
/*slider*/

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Chuyển ảnh sau 2 giây
}

/*header*/

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

/*dropdown*/
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
  

