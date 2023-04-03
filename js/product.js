$('input.input-qty').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('min')),
    max = Number($this.attr('max'))
  if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
    $this.attr('value', d).val(d)
  });
});

/*slide*/

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

/*slide*/

$('.filtering').slick({
  slidesToShow: 4,
  slidesToScroll: 4,
  arrow:true,
  speed:300
});

var filtered = false;

$('.js-filter').on('click', function(){
  if (filtered === false) {
    $('.filtering').slick('slickFilter',':even');
    $(this).text('Unfilter Slides');
    filtered = true;
  } else {
    $('.filtering').slick('slickUnfilter');
    $(this).text('Filter Slides');
    filtered = false;
  }
});

