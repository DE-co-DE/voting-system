$(".navbar").find("[data-toggle=collapse]").click(function(e){

    e.preventDefault();e.stopPropagation();
   // alert();
   $("#navbarColor02").toggle(1000);

});

$('.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).show(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).hide(500);
});
$('.alert').fadeOut(2000);