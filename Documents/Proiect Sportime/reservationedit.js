$(document).ready(function() 
{
	$("#edit").click(function() 
	{

		var firstname = $("#firstname").val();
		var secondname = $("#secondname").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();

		if (firstname == null || secondname == null || mobile == null || email == null) 
		{
			alert("Please fill all the fields!");
		} 
		else 
		{
			$.post("resedit.php", {firstname1: firstname, secondname1: secondname, email1: email, mobile1: mobile}, 
					function(data) 
					{
						if (data == 'You have successfully edited your account!') 
						{
							$("form-horizontal")[0].reset();
						}
						alert(data);
					});
		}
	});
});