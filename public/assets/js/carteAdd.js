$(function(){
    var Toggle_edit = false;

    $('button[name=btn-edit]').on('click', function(){
        Toggle_edit = !Toggle_edit;
    });

    $('.carte').on('click', function(e){
        $('.point').remove();

        x = ((e.clientX - this.offsetLeft - 25) * 100) / this.offsetWidth;
        y = ((e.clientY - this.offsetTop - 25) * 100) / this.offsetHeight;

        var carte = $(this);

        var data = {'x': x, 'y': y};

        $('input[name=x]').attr('value' , x);
        $('input[name=y]').attr('value' , y);

        var point = $('<div><i class=""></i></div>').addClass('bar').css({'left': x + '%', 'top': y + '%'});
        carte.append(point);

    });
});
