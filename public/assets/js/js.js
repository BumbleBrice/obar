/*Navbar*/

$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $('#custom-nav').addClass('affix');
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $('#custom-nav').removeClass('affix');
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});


/***Affichage profil bar***/
// On attend que la page soit chargée
$(document).ready(function(){
   // On cache la zone de texte
   $('#toggle').hide();
   // toggle() lorsque le lien avec l'ID #toggler est cliqué (clic sur un bar)
   $('a#toggler').click(function(e) {
      e.preventDefault();

      $('.btBar').hide();

      var bar = $(this);

      $.ajax({
          url : 'bar_detail',
          method : 'POST',
          async : true,
          data : {id : bar.data('id')}
      }).done(function(data, textStatus, jqXHR){
          $('#barToggle').html(data);
      }).fail(function(jqXHR, textStatus, errorThrown){
          $('#toggle').html('<p>FAILLL</p>');
      });

      $('#toggle').show(400);

      return false;
   });

   // toggle() lorsque le lien avec l'ID #toggler est cliqué (clic fermer la div afficher le bar)
   $('#closeToggle').click(function(e){
       e.preventDefault();

       $('.btBar').show();

       $('#toggle').hide(400);
       return false;
   });

});
