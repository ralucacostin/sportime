$(document).ready(function() 
{
	$("#register").click(function() 
	{
		var username = $("#username").val();
		var password = $("#password").val();
		var firstname = $("#firstname").val();
		var secondname = $("#secondname").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
		if (username == null || password == null || firstname == null || secondname == null || email == null || mobile == null) 
		{
			alert("Please fill all the fields!");
		} 
		else if ((password.length) < 8) 
		{
			alert("Password should have at least 8 characters in length!");
		}
		else 
		{
			$.post("register.php", {username1: username, password1: password, firstname1: firstname, secondname1: secondname, email1: email, mobile1:mobile}, 
					function(data) 
					{
						if (data == 'You have successfully registered!') 
						{
							$("form-horizontal")[0].reset();
						}
						alert(data);
					});
		}
	});
});