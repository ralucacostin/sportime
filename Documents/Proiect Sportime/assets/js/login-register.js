/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 * 
 */
function showRegisterForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Register with');
    }); 
    $('.error').removeClass('alert alert-danger').html('');
       
}
function showLoginForm(){
    $('#loginModal .registerBox').fadeOut('fast',function(){
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');    
        });
        
        $('.modal-title').html('Welcome');
    });       
     $('.error').removeClass('alert alert-danger').html(''); 
}

function openLoginModal(){
    showLoginForm();
    setTimeout(function(){
        $('#loginModal').modal('show');    
    }, 230);
    
}
function openRegisterModal(){
    showRegisterForm();
    setTimeout(function(){
        $('#loginModal').modal('show');    
    }, 230);
    
}
$('.btn-login').click(function(e){
  e.preventDefault();

    var username = $("#email2").val();
    var password = $("#password2").val();
    var dataString = 'username=' + username + '&password=' + password;
    console.log(dataString);
    if ($.trim(username).length > 0 && $.trim(password).length > 0) {
      $.ajax({
        type: "POST",
        url: "ajaxLogin.php",
        data: dataString,
        cache: false,
        beforeSend: function() {
          $("#login").val('Connecting...');
        }

      }).success(function(data) {
            if (parseInt(data) > 1) {
          window.location.replace("sportime-loggedin.php");
        } else {
          shakeModal();
        }
      });
    }
  

});


function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}

   