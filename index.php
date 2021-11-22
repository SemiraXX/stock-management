<!DOCTYPE html>
<html>
<head>
	<title>Stocks</title>
	<?php include 'cdn.php';?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

					<div class="validation">
                        <div class="alert-box err1 remove">Password is required!</div>
                    </div>
                    <div class="validation">
                        <div class="alert-box err2 remove">Email is required!</div>
                    </div>
                    <div class="validation">
                        <div class="alert-box err3 remove">Account not found!</div>
                    </div>
                    <div class="validation">
                        <div class="alert-box err4 success">Account not found!</div>
                    </div>
                  

<div class="loginwrapper">
    <div class="logincontentwrapper">
        <p class="logintext1"><strong class="white">ADMIN</strong> LOGIN</p>
        <hr class="hrlogin">
        <br>
            <input type="text" id="email" class="logininput" name="email" placeholder="Username">
            <input type="password" id="password" class="logininput" name="password" placeholder="Password">
            <button type="submit" class="submitbtn">Login</button>
        <p class="normalp">Developer: <a href="https://maiky-belmonte.000webhostapp.com/">marymaymaikybelmonte</a></p>

    </div>

</div>


<script>
$(document).ready(function(){
   
    $('.submitbtn').click(function(){

    	var email = $('#email').val();
    	var password = $('#password').val();

    
        if(password.length == " ")
        {
        	$( "div.err1" ).fadeIn(200 ).delay(1200).fadeOut( 2000 );
        }
        else if (email.length == " ") 
        {
        	$( "div.err2" ).fadeIn(200 ).delay(1200).fadeOut( 2000 );
        }
        else if(email == "belmontemaymaiky@gmail.com" && password == "thisissampleonly")
        {
        	$( "div.err4" ).fadeIn(200 ).delay(1200).fadeOut( 2000 );

        	window.location.href = "Stocks.php";
        }
        else
        {
        	$( "div.err3" ).fadeIn(200 ).delay(1200).fadeOut( 2000 );
        }


    });

});
</script>

</body>
</html>
