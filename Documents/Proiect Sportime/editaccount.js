$(document).ready(function()
{
	$("#edit").click(function()
	{
		var username = $("#username").val();
		var password = $("#password").val();
		var firstname = $("#firstname").val();
		var secondname = $("#secondname").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
		var university = $("#university").val();
		var address = $("#address").val();
		var town = $("#town").val();
		var aboutme = $("#aboutme").val();
		if (username == null || password == null || firstname == null || secondname == null || email == null || mobile == null || university == null || address == null || town == null || aboutme == null)
		{
			alert("Please fill all the fields!");
		}
		else if ((password.length) < 8)
		{
			alert("Password should have at least 8 characters in length!");
		}
		else
		{
			$.post("edit.php", {username1: username, password1: password, firstname1: firstname, secondname1: secondname, email1: email, mobile1: mobile, university1: university, address1: address, town1: town, aboutme1: aboutme},
					function(data)
					{
						if (data == 'You have successfully edited your account!')
						{
							// $("form-horizontal")[0].reset();
						}
						// alert(data);
					});
			location.reload();
		}
	});
});