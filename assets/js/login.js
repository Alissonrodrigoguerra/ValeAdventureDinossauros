$('#contactform').submit(function(e) {
    e.preventDefault();
    const email = $('input[name="email"]').val();
	const password = $('input[name="password"]').val();

    $.ajax({
        url: url, // caminho para o script que svai processar os dados
        type: 'POST',
        data: {email: email, Pass: password},
        success: function(response) {

		  $('#resp').html(response);	
		  var msg = $('#msg').text();
		  $("#msg").empty();			
		  var $toastContent = $('<span >'+msg+'</span>').add($('<button id="close" onclick="myFunction()" class="btn-flat toast-action">X</button>'));
		  Materialize.toast($toastContent, 5000);
		 
		},
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
    return false;
});

function myFunction(){

  var toastElement = $('.toast').first()[0];
  var toastInstance = toastElement.M_Toast;
  toastInstance.remove();v

}