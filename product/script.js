$(':input').change(function(evt){

    var filter = $(':input:checked,select').map(function(index, el) {
        return "." + el.value;
    }).toArray().join("");

    // $(".category").hide().filter(filter).show();

});

$(document).ready(function () {

  $(".tb").hover(function () {

    $(".tb").removeClass("tb-active");
    $(this).addClass("tb-active");

    current_fs = $(".active");

    next_fs = $(this).attr('id');
    next_fs = "#" + next_fs + "1";

    $("fieldset").removeClass("active");
    $(next_fs).addClass("active");

    current_fs.animate({}, {
      step: function () {
        current_fs.css({
          'display': 'none',
          'position': 'relative'
        });
        next_fs.css({
          'display': 'block'
        });
      }
    });
  });

});

$(document).ready(function() {
  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
});
