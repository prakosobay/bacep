$(window).on('load', function(){
    // Please run it with window.onload, not with document.ready
    initSmoothScrolling('.block','smoothscroll');
  });

  function initSmoothScrolling(container,animation){
   /*
      * @param {String} container Class or ID of the animation container
      * @param {String} animation Name of the animation, e.g. smoothscroll
      */
      var sliderWidth = 0;
      var animationWidth = 0;
      var sliderHeight = $('>div>div:first-of-type',container).outerHeight(false);

      $('>div>div', container).each(function(){
          animationWidth += $(this).outerWidth(false);
      });

      // detect number of visible slides
      var slidesVisible = $(container).width() / $('>div>div:first-of-type',container).outerWidth(false);
      slidesVisible = Math.ceil(slidesVisible);

    // count slides to determine animation speed
      var slidesNumber = $('>div>div', container).length;
      var speed = slidesNumber*2;

  // append the tail
      $('>div>div',container).slice(0,slidesVisible).clone().appendTo($('>div',container));

      // Detect the slider width with appended tail
      $('>div>div', container).each(function(){
          sliderWidth += $(this).outerWidth(false);
      });

      // set slider dimensions
      $('>div',container).css({'width':sliderWidth,'height':sliderHeight});

  // Insert styles to html
      $("<style type='text/css'>@keyframes "+animation+" { 0% { margin-left: 0px; } 100% { margin-left: -"+animationWidth+"px; } } "+$('>div>div:first-of-type',container).selector+" { -webkit-animation: "+animation+" "+speed+"s linear infinite; -moz-animation: "+animation+" "+speed+"s linear infinite; -ms-animation: "+animation+" "+speed+"s linear infinite; -o-animation: "+animation+" "+speed+"s linear infinite; animation: "+animation+" "+speed+"s linear infinite; }</style>").appendTo("head");

      // restart the animation (e.g. for safari & ie)
      var cl = $(container).attr("class");
      $(container).removeClass(cl).animate({'nothing':null}, 1, function () {
          $(this).addClass(cl);
      });
  }
