$(function(){
    var Toggle_edit = false;

    $('button[name=btn-edit]').on('click', function(){
        Toggle_edit = !Toggle_edit;
    });

    $('.carte').on('click', function(e){
        $('.bar').remove();

        var carte = $(this);
        positionCarte = this.getBoundingClientRect();


        var data = {'x': x, 'y': y};

        $('input[name=x]').attr('value' , x);
        $('input[name=y]').attr('value' , y);

        var point = $('<div><i class="fa fa-beer fa-2x"></i></div>').addClass('bar').css({'left': x + '%', 'top': y + '%'});

        carte.css({'position' : 'relative'});
        carte.append(point);
    });
});
