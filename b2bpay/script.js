jQuery(document).ready(function(){

	var id_negara = $('input#startNegara').val();

	$.ajax({

		type: 'POST',
		url: 'config/get_data.php',
		data:
		{
			id_negara : id_negara,
		},
		success:function(resource)
		{
			$('div#get_data').html(resource);
		}

	})

});


window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}