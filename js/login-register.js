function showRegisterForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Regístrate con');
    }); 
    $('.error').removeClass('alert alert-danger').html('');
       
}
function showLoginForm(){
    $('#loginModal .registerBox').fadeOut('fast',function(){
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');    
        });
        
        $('.modal-title').html('Iniciar sesión con');
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

function loginAjax(){

    $.getJSON( "../login.php", { "email" : document.loginform.email.value, "password" : document.loginform.password.value } )
        .done(function( data, textStatus, jqXHR ) {
            if ( console && console.log ) {
                window.location.replace("../dashboard.php");
                console.log( "La solicitud se ha completado correctamente." );
            }
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            if ( console && console.log ) {
                console.log( "Algo ha fallado: " +  textStatus );
                shakeModal(); 
            }
    });
    

/*   Simulate error message from the server   */
     //shakeModal();
}

function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}

   