$(document).ready(function(){
	var count = 0;
	$(".container").on('click', "i[id^='delete']", function(){

		function getID(thisID) {
			var id = "";
			for (var i = 0; i < thisID.length; i++)
			{
				if (!isNaN(parseInt(thisID[i])))
				{
					id += thisID[i];
				}
			}
			id = parseInt(id);
			return id;
		}

		var currentID = $(this).attr('id');
		var currentFacilityID = $(this).parent().parent().parent().parent().parent().children("h2[id^='facility_name']").attr('id');
		var currentDateID = $(this).parent().parent().parent().prev(".col-sm-6").children("h4[id^='facility_date']").attr('id');
		var faID = getID(currentID);
		var facilityID = getID(currentFacilityID);
		var dateID = getID(currentDateID);

		var user_id = $("#user_id").text();
		var facility_name = $("#facility_name" + facilityID).text();
		var date = $("#facility_date" + dateID).text();
		var start_time = $("#start_time" + faID).text();
		var end_time = $("#end_time" + faID).text();

		fullDate = date;
		date = date.split(" ");
		var day = parseInt(date[0]);
		var month = date[1];
		var year = parseInt(date[2]);

		$.post('../../deletereservation.php',
					{
						uid: user_id,
						f_name: facility_name,
						r_day: day,
						r_month: month,
						r_year: year,
						r_start_time: start_time,
						r_end_time: end_time
					},
					function() {
						$(".container.tim-container").load("getreservations.php",function(){
							showAlert();
							if ($('#reservations').children().length < 1)
							{
								$('#reservations').append('<h2 class="title">You currently have no reservations!</h2>');
							}
						});
					});

		function showAlert(counter) {
			$('#success-alert-index').append('<div class="alert alert-success text-align" id="success-alert' + count + '" hidden>\
                        									<button type="button" class="close" data-dismiss="alert">x</button>\
                        									<strong>Success! </strong>Your reservation for ' + facility_name + ' on ' + fullDate + ' beetween ' + start_time + ':00 - ' + end_time + ':00' + ' has been deleted.\
                    										</div>');
	    $("#success-alert" + count).show();
	    $("#success-alert" + count).fadeTo(5000, 500).slideUp(1000);
	    count++;
		}
	});

	if ($('#reservations').children().length < 1)
	{
		$('#reservations').append('<h2 class="title">You currently have no reservations!</h2>');
	}
});