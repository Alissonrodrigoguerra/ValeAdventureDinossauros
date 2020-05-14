// menu mobilie

$('.img-menu').mouseover(function (e) { 
    e.preventDefault();
    $('#mobile_menu').removeClass('d-none');

});


$('#mobile_menu').mouseleave(function () { 
       
    $('#mobile_menu').addClass('d-none');

});


// Parallax

$('.prlx').each(function() {
    var $obj = $(this);
    $obj.css('background-position', '50% 0');
    $obj.css('background-attachment', 'fixed');
    if( $(window).width() > 940) {
        $obj.css('background-size', '100%');
        $(window).scroll(function() {
            var offset = $obj.offset();
            var yPos = -($(window).scrollTop() - offset.top) / 10;
            var bgpos = '50% ' + yPos + 'px';
            $obj.css('background-position', bgpos);
        });
    }
});

// Scroll Top

$(document).ready(function(){
    $("a").on('click', function(event) {
  
      if (this.hash !== "") {
        event.preventDefault();
  
        var hash = this.hash;
  

        $('html, body').animate({ scrollTop: $(hash).offset().top}, 1000, function(){
          window.location.hash = hash;
        });
      } // End if
    });
  });


  // Rotate

  
  $.fn.typer = function(text, options){
    options = $.extend({}, {
        char: ' ',
        delay: 1000,
        duration: 600,
        endless: true
    }, options || text);

    text = $.isPlainObject(text) ? options.text : text;

    var elem = $(this),
        isTag = false,
        c = 0;
    
    (function typetext(i) {
        var e = ({string:1, number:1}[typeof text] ? text : text[i]) + options.char,
            char = e.substr(c++, 1);

        if( char === '<' ){ isTag = true; }
        if( char === '>' ){ isTag = false; }
        elem.html(e.substr(0, c));
        if(c <= e.length){
            if( isTag ){
                typetext(i);
            } else {
                setTimeout(typetext, options.duration/10, i);
            }
        } else {
            c = 0;
            i++;
            
            if (i === text.length && !options.endless) {
                return;
            } else if (i === text.length) {
                i = 0;
            }
            setTimeout(typetext, options.delay, i);
        }
    })(0);
};

$('#rotate').typer(['<b>Ação</b>', '<b>Diversão</b>', '<b>Aventura</b>']);

