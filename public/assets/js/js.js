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
jQuery(document).ready(function(){
   // On cache la zone de texte
   jQuery('#toggle').hide();
   // toggle() lorsque le lien avec l'ID #toggler est cliqué
   jQuery('a#toggler').click(function()  {
      jQuery('#toggle').toggle(400);
      $('.btBar').toggle();
      return false;
   });
});
// On attend que la page soit chargée
jQuery(document).ready(function(){
   // On cache la zone de texte
   jQuery('#toggle').hide();
   // toggle() lorsque le lien avec l'ID #toggler est cliqué
   jQuery('.closeToggle').click(function()  {
      jQuery('#toggle').toggle(400);
      $('.btBar').toggle();
      return false;
   });
});

