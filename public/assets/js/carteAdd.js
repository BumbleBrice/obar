$(function(){
    var Toggle_edit = false;

    $('button[name=btn-edit]').on('click', function(){
        Toggle_edit = !Toggle_edit;
    });

    $('.carte').on('click', function(e){
        x = ((e.clientX - this.offsetLeft - 25) * 100) / this.offsetWidth;
        y = ((e.clientY - this.offsetTop - 25) * 100) / this.offsetHeight;

        console.log(x + ' ' + y);

        var carte = $(this);

        var data = {'x': x, 'y': y};

        $.ajax({
            url : '/amdin_bar_add',
            dataType : 'text/html',
            method : 'POST',
            data : data
        })
        .done(function(data, text, jqxhr){
            var point = $('<div><i class=""></i></div>').text('test').addClass('point').css({'left': x + '%', 'top': y + '%'});
            carte.append(point);
            $('body').append(data);
        })
        .fail(function(jqxhr){
            console.log('erreur requete');
        });
    });
});
