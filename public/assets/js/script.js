// Smooth scroll
$(function() {
    $('.nav a').bind('click',function(event){
        var $anchor = $(this);
        /*
        if you want to use one of the easing effects:
        $('html, body').stop().animate({
            scrollLeft: $($anchor.attr('href')).offset().left
        }, 1500,'easeInOutExpo');
         */
        $('html, body').stop().animate({
            scrollLeft: $($anchor.attr('href')).offset().left
        }, 1000);
        event.preventDefault();
    });
});

// Input page addBar
$(":file").filestyle({badge: false});

<script>
    $(function(){
        $('.carte').on('click', function(e){
            x = ((e.clientX - this.offsetLeft - 25) * 100) / this.offsetWidth;
            y = ((e.clientY - this.offsetTop - 25) * 100) / this.offsetHeight;

            var carte = $(this);

            var data = {'x': x, 'y': y};

            $.post('index.php', data)
                .done(function(data, text, jqxhr){
                    var point = $('<div><i class=""></i></div>').text('test').addClass('bar').css({'left': x + '%', 'top': y + '%'});
                    carte.append(point);
                    $('body').append(data);
                })
                .fail(function(jqxhr){
                    console.log('erreur requete');
                });
        });
    });
</script>
