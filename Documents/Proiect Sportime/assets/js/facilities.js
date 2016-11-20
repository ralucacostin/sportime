$(document).ready(function(){
	var reservation_info = [];
	reservation_info[0] = $('#user_id').text();
	var fa_names;

	function SortByName(a, b){
			var aName = a.facility_name.toLowerCase();
  		var bName = b.facility_name.toLowerCase();
  		return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
	}

	$.post('../../afisare.php', function(response){
		response = JSON.parse(response);
		fa_names = response;
		for (var i = 0; i < response.length; i++)
		{
			$('#facilities-body').append('<div class="row facility-name">\
			                             <button class="btn btn-default btn-fill btn-menu" date-name="' + response[i]["facility_name"] + '">' + response[i]["facility_name"] + '</button></div>');
		}
		$('#facilities-body').mCustomScrollbar({
																					 theme: "minimal"
																					});
	});

	var filtered = [];

	function filter(checkBox, text) {
		if ($(checkBox).is(':checked'))
		{
			for (var i = 0; i < fa_names.length; i++)
			{
				if (fa_names[i]["facility_activity"].indexOf(text) >= 0)
				{
					filtered.push(fa_names[i]);
				}
			}

			filtered.sort(SortByName);
			$('#mCSB_1_container').empty(".facility-name");
			for (var k = 0; k < filtered.length; k++)
			{
				$('#mCSB_1_container').append('<div class="row facility-name">\
				                             <button class="btn btn-default btn-fill btn-menu" date-name="' + filtered[k]["facility_name"] + '">' + filtered[k]["facility_name"] + '</button></div>');
				$('#facilities-body').mCustomScrollbar("update");
			}
		}
		else
		{
			for (var j = 0; j < filtered.length; j++)
			{
				if (filtered[j]["facility_activity"].indexOf(text) >= 0)
				{
					filtered.splice(j, 1);
					j--;
				}
			}
			if (filtered.length > 0)
			{
				filtered.sort(SortByName);
				$('#mCSB_1_container').empty(".facility-name");
				for (var k = 0; k < filtered.length; k++)
				{
					$('#mCSB_1_container').append('<div class="row facility-name">\
					                             <button class="btn btn-default btn-fill btn-menu" date-name="' + filtered[k]["facility_name"] + '">' + filtered[k]["facility_name"] + '</button></div>');
					$('#facilities-body').mCustomScrollbar("update");
				}
			}
			else
			{
				$('#mCSB_1_container').empty(".facility-name");
				for (k = 0; k < fa_names.length; k++)
				{
					$('#mCSB_1_container').append('<div class="row facility-name">\
					                             <button class="btn btn-default btn-fill btn-menu" date-name="' + fa_names[k]["facility_name"] + '">' + fa_names[k]["facility_name"] + '</button></div>');
					$('#facilities-body').mCustomScrollbar("update");
				}
			}
		}
	}

	function filter_by_opentime(checkBox, text, key) {
		var opentime = "";
		if ($(checkBox).is(':checked'))
		{
			for (var l = 0; l < filtered.length; l++)
			{
				opentime = filtered[l][key][0].concat(filtered[l][key][1]);
				opentime = parseInt(opentime);
				if (opentime >= text)
				{
					filtered.splice(l, 1);
					l--;
				}
			}

			if (!$('#footballCheck').is(':checked') && !$('#basketballCheck').is(':checked') && !$('#tennisCheck').is(':checked'))
			{
				for (var i = 0; i < fa_names.length; i++)
				{
					opentime = fa_names[i][key][0].concat(fa_names[i][key][1]);
					opentime = parseInt(opentime);
					if (opentime < text)
					{
						filtered.push(fa_names[i]);
					}
				}
			}

			filtered.sort(SortByName);
			$('#mCSB_1_container').empty(".facility-name");
			for (var k = 0; k < filtered.length; k++)
			{
				$('#mCSB_1_container').append('<div class="row facility-name">\
				                             <button class="btn btn-default btn-fill btn-menu" date-name="' + filtered[k]["facility_name"] + '">' + filtered[k]["facility_name"] + '</button></div>');
				$('#facilities-body').mCustomScrollbar("update");
			}
		}
		else
		{
			for (var j = 0; j < filtered.length; j++)
			{
				if (opentime < text)
				{
					filtered.splice(j, 1);
					j--;
				}
			}
			if (filtered.length > 0)
			{
				filtered.sort(SortByName);
				$('#mCSB_1_container').empty(".facility-name");
				for (var k = 0; k < filtered.length; k++)
				{
					$('#mCSB_1_container').append('<div class="row facility-name">\
					                             <button class="btn btn-default btn-fill btn-menu" date-name="' + filtered[k]["facility_name"] + '">' + filtered[k]["facility_name"] + '</button></div>');
					$('#facilities-body').mCustomScrollbar("update");
				}
			}
			else
			{
				$('#mCSB_1_container').empty(".facility-name");
				for (k = 0; k < fa_names.length; k++)
				{
					$('#mCSB_1_container').append('<div class="row facility-name">\
					                             <button class="btn btn-default btn-fill btn-menu" date-name="' + fa_names[k]["facility_name"] + '">' + fa_names[k]["facility_name"] + '</button></div>');
					$('#facilities-body').mCustomScrollbar("update");
				}
			}
		}
	}

	function filter_by_closetime(checkBox, text, key) {
		var close_time = "";
		if ($(checkBox).is(':checked'))
		{
			for (var l = 0; l < filtered.length; l++)
			{
				close_time = filtered[l][key][0].concat(filtered[l][key][1]);
				close_time = parseInt(close_time);
				if (close_time <= text)
				{
					filtered.splice(l, 1);
					l--;
				}
			}

			if (!$('#footballCheck').is(':checked') && !$('#basketballCheck').is(':checked') && !$('#tennisCheck').is(':checked'))
			{
				for (var i = 0; i < fa_names.length; i++)
				{
					close_time = fa_names[i][key][0].concat(fa_names[i][key][1]);
					close_time = parseInt(close_time);
					if (close_time > text)
					{
						filtered.push(fa_names[i]);
					}
				}
			}

			filtered.sort(SortByName);
			$('#mCSB_1_container').empty(".facility-name");
			for (var k = 0; k < filtered.length; k++)
			{
				$('#mCSB_1_container').append('<div class="row facility-name">\
				                             <button class="btn btn-default btn-fill btn-menu" date-name="' + filtered[k]["facility_name"] + '">' + filtered[k]["facility_name"] + '</button></div>');
				$('#facilities-body').mCustomScrollbar("update");
			}
		}
		else
		{
			if (!$('#footballCheck').is(':checked') && !$('#basketballCheck').is(':checked') && !$('#tennisCheck').is(':checked'))
			{
				for (var j = 0; j < filtered.length; j++)
				{
					close_time = filtered[j][key][0].concat(filtered[j][key][1]);
					close_time = parseInt(close_time);
					if (close_time > text)
					{
						filtered.splice(j, 1);
						j--;
					}
				}
			}

			if (filtered.length > 0)
			{
				filtered.sort(SortByName);
				$('#mCSB_1_container').empty(".facility-name");
				for (var k = 0; k < filtered.length; k++)
				{
					$('#mCSB_1_container').append('<div class="row facility-name">\
					                             <button class="btn btn-default btn-fill btn-menu" date-name="' + filtered[k]["facility_name"] + '">' + filtered[k]["facility_name"] + '</button></div>');
					$('#facilities-body').mCustomScrollbar("update");
				}
			}
			else
			{
				$('#mCSB_1_container').empty(".facility-name");
				for (k = 0; k < fa_names.length; k++)
				{
					$('#mCSB_1_container').append('<div class="row facility-name">\
					                             <button class="btn btn-default btn-fill btn-menu" date-name="' + fa_names[k]["facility_name"] + '">' + fa_names[k]["facility_name"] + '</button></div>');
					$('#facilities-body').mCustomScrollbar("update");
				}
			}
		}
	}

	$('#footballCheck').on('change', function(){
		filter('#footballCheck', 'Football');
	});

	$('#basketballCheck').on('change', function(){
		filter('#basketballCheck', 'Basketball');
	});

	$('#tennisCheck').on('change', function(){
		filter('#tennisCheck', "Tennis");
	});

	$('#before10Check').on('change', function(){
		filter_by_opentime('#before10Check', 10, "facility_opentime_week");
	});

	$('#after9Check').on('change', function(){
		filter_by_closetime('#after9Check', 21, "facility_closetime_week");
	})

	$('#after10Check').on('change', function(){
		filter_by_closetime('#after10Check', 22, "facility_closetime_week");
	})

	$('#search-box').on('input', function(){
		if (filtered.length === 0)
		{
			$('#mCSB_1_container').empty(".facility-name");

			var options = {
				threshold: 0.3,
				keys: ["facility_name", "facility_description"]
			}
			var f = new Fuse(fa_names, options);
			var result = f.search($(this).val());
			result.sort(SortByName);

			for (var i = 0; i < result.length; i++)
			{
				$('#mCSB_1_container').append('<div class="row facility-name">\
				                             <button class="btn btn-default btn-fill btn-menu" date-name="' + result[i]["facility_name"] + '">' + result[i]["facility_name"] + '</button></div>');
				$('#facilities-body').mCustomScrollbar("update");
			}

			if ($(this).val().length == 0)
			{
				for (var j = 0; j < fa_names.length; j++)
				{
					$('#mCSB_1_container').append('<div class="row facility-name">\
				                             		<button class="btn btn-default btn-fill btn-menu" date-name="' + fa_names[j]["facility_name"] + '">' + fa_names[j]["facility_name"] + '</button></div>');
					$('#facilities-body').mCustomScrollbar("update");
				}
			}
		}
		else
		{
			$('#mCSB_1_container').empty(".facility-name");

			var options = {
				threshold: 0.3,
				keys: ["facility_name", "facility_description"]
			}
			var f = new Fuse(filtered, options);
			var result = f.search($(this).val());
			result.sort(SortByName);

			for (var i = 0; i < result.length; i++)
			{
				$('#mCSB_1_container').append('<div class="row facility-name">\
				                             <button class="btn btn-default btn-fill btn-menu" date-name="' + result[i]["facility_name"] + '">' + result[i]["facility_name"] + '</button></div>');
				$('#facilities-body').mCustomScrollbar("update");
			}

			if ($(this).val().length == 0)
			{
				for (var j = 0; j < filtered.length; j++)
				{
					$('#mCSB_1_container').append('<div class="row facility-name">\
				                             		<button class="btn btn-default btn-fill btn-menu" date-name="' + filtered[j]["facility_name"] + '">' + filtered[j]["facility_name"] + '</button></div>');
					$('#facilities-body').mCustomScrollbar("update");
				}
			}
		}
	});

	$(document).on('click', '.btn-menu', function(){
			$("#facilityNameRight").text($(this).text());
			var facility_name = $(this).text();

			$.post('facilitydetails.php', {"fac_name" : facility_name }, function(json) {
				data = JSON.parse(json);
				var opentime = "";
				var closetime = "";

				for (var i = 0; i <= 4; i++)
				{
					opentime = opentime.concat(data[0].facility_opentime_week[i]);
					closetime = closetime.concat(data[0].facility_closetime_week[i]);
				}

				$("#titleInput").attr("value", data[0].facility_name);
				$("#descriptionInput").attr("value", data[0].facility_description);
				$("#facilityDescription").text(data[0].facility_description);
				if (data[0].facility_website != "null")
				{
					$("#websiteInput").attr("value", data[0].facility_website);
					$("#websiteInputLink").attr("href", data[0].facility_website);
				}
				$("#activityInput").attr("value", data[0].facility_activity);
				$("#openingInput").attr("value", opentime);
				$("#closingInput").attr("value", closetime);
				$("#addressInput").attr("value", data[0].facility_address);
				$("#postcodeInput").attr("value", data[0].facility_postcode);

				opentime = opentime.replace(opentime, opentime[0].concat(opentime[1]));
				opentime = parseInt(opentime);
				closetime = closetime.replace(closetime, closetime[0].concat(closetime[1]));
				closetime = parseInt(closetime);

				reservation_info[1] = data[0].facility_name;
				reservation_info[2] = opentime;
				reservation_info[3] = closetime;

				$('#facility-title').text(reservation_info[1]);
			});
	});

	function showAlert(alertID) {
	    $(alertID).show();
	    $(alertID).fadeTo(3000, 500).slideUp(1000);
	}

	$('#addFacilityButton').click(function(){
		$.post('../../add_facility.php',
					{
						name: $("#addTitle").val(),
						description: $("#addDescription").val(),
						website: $("#addWebsite").val(),
						activity: $("#addActivity").val(),
						opening: $("#addOpeningTime").val(),
						closing: $("#addClosingTime").val(),
						address: $("#addAddress").val(),
						postcode: $("#addPostcode").val()
					},
					function(response){
						if (response == "0")
						{
								$("#addAlertFail").text("Please fill all fields marked with * !")
								showAlert("#addAlertFail");
						}
						else
						{
							$("#addAlertSuccess").text("Facility added successfully!");
							showAlert("#addAlertSuccess");
						}
					});
		$('#add_facility_form').trigger('reset');
		location.reload();
	});

	$('#deleteButton').click(function(){
		$.post('../../delete_facility.php',
					 {
					 	name: $('#titleInput').val()
					 },
					 function(response){
						location.reload();
						if (response == "0")
						{
								$("#updateAlertFail").text("Please fill all fields marked with * !")
								showAlert("#updateAlertFail");
						}
						else
						{
							$("#updateAlertSuccess").text("Facility deleted successfully!");
							showAlert("#updateAlertSuccess");
						}
					 });
	});

	$('#updateButton').click(function(){
		$.post('../../update_facility.php',
					{
						name: $("#titleInput").val(),
						description: $("#descriptionInput").val(),
						website: $("#websiteInput").val(),
						activity: $("#activityInput").val(),
						opening: $("#openingInput").val(),
						closing: $("#closingInput").val(),
						address: $("#addressInput").val(),
						postcode: $("#postcodeInput").val()
					},
					function(response){
						setTimeout(function(){
							location.reload();
						}, 500);

						if (response == "0")
						{
								$("#updateAlertFail").text("Please fill all fields marked with * !")
								showAlert("#updateAlertFail");
						}
						else
						{
							$("#updateAlertSuccess").text("Facility updated successfully!");
							showAlert("#updateAlertSuccess");
						}
					});

	});


	$('input[type="date"]').change(function(){
		$('#timeslots').empty();
    var currentDate = new Date(this.value);
		currentDate = currentDate.toDateString();
		currentDate = currentDate.split(" ");
		reservation_info[4] = parseInt(currentDate[2]);
		reservation_info[5] = currentDate[1];
		reservation_info[6] = currentDate[3];

		var timeslots;
		$.post('get_timeslots.php',
			{
				facility_name: reservation_info[1],
				reservation_day: reservation_info[4],
				reservation_month: reservation_info[5],
				reservation_year: reservation_info[6]
			},
			function(response){
				timeslots = JSON.parse(response);

			  for (var i = reservation_info[2]; i < reservation_info[3]; i++)
			  {
			  	var ok = 1;
					for (var j = 0; j < timeslots.length; j++)
					{
						if (i == timeslots[j]["start_time"])
							ok = 0;
					}
					if (ok)
							$("#timeslots").append('<li class="row time-slot text-align"><label><input type="radio" name="timeslot"> ' + i + ":00 - " + (i+1) + ":00" + '</label></li>');
				}

				$('input[name="timeslot"]').on('change', function(){
					var currentTime = this.nextSibling.nodeValue.split(" ");
					var currentOpenTime = currentTime[1];
					var currentCloseTime = currentTime[3];

					currentOpenTime = parseInt(currentOpenTime[0].concat(currentOpenTime[1]));
					currentCloseTime = parseInt(currentCloseTime[0].concat(currentCloseTime[1]));
					reservation_info[7] = currentOpenTime;
					reservation_info[8] = currentCloseTime;
				});
			});
	});

	$('#create_reservation').on('click', function(){
		$.post('insert_reservation.php',
			{
				user_id: reservation_info[0],
				facility_name: reservation_info[1],
				reservation_day: reservation_info[4],
				reservation_month: reservation_info[5],
				reservation_year: reservation_info[6],
				reservation_start: reservation_info[7],
				reservation_end: reservation_info[8]
			});

		$.post('../../send_message.php',
					{
						name: reservation_info[1],
						day: reservation_info[4],
						month: reservation_info[5],
						year: reservation_info[6],
						start: reservation_info[7],
						end: reservation_info[8]
					});

		$('#fac_name_modal').attr('value', reservation_info[1]);
		$('#timeslot_modal').attr('value', reservation_info[7] + ":00 - " + reservation_info[8] + ":00");
		$('#reservationModal').modal('toggle');
	});

	$('#edit').on('click', function(){
		$("#updateAlertSuccess2").text("Reservation created successfully!");
		showAlert("#updateAlertSuccess2");

		setTimeout(function(){
			$('#detailsModal').modal('toggle');
			location.reload();
		}, 500);

	});
});