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
$('.alert-dismissible').fadeOut(4000);

$(document).ready(function(){
$('#submit_reg').submit(function(e){
let num=$("#number").val();
let count=num.toString().length;
if(count!=10){
	e.preventDefault();
	alert("Mobile Number Must be 10 Digit");
} else{
	$('#submit_reg').submit();
}
});
//$('.datepicker').css('z-index','9999999999999');
    var date=new Date().toJSON().slice(0,10);
   // alert(date);
      $('.datepick').datepicker({
            format: "yyyy-mm-dd", 
            startDate: date,
            autoclose: true

        });
});