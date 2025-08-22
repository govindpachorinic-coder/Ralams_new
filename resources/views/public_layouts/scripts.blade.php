<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
</script>

<script>
	  	$(document).ready(function() {
	  		$(".b-navdropdown-click").click(function() {
	  			if($(".b-navdropdown").hasClass("hide")) {
	  				$(".b-navdropdown").addClass("show");
	  				$(".b-navdropdown").removeClass("hide");
	  				// $(".b-icon-up").show();
	  				// $(".b-icon-down").hide();
	  			} 
	  			else if($(".b-navdropdown").hasClass("show")) {
	  				$(".b-navdropdown").addClass("hide");
	  				$(".b-navdropdown").removeClass("show");
	  				// $(".b-icon-down").show();
	  				// $(".b-icon-up").hide();
	  			}
			});
	  	});



    </script>