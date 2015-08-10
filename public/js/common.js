function getStates(countryId,stateId) {
	$.ajax({
		type:'POST',
		data:{ "countryid":countryId,"stateid":stateId },
		url: BASEPATH + "/state",
		success:function(reponse) {
			$('#state_id').html(reponse);
		},
		error:function(error) {
			alert(error);
		}
	});
}

function getPerStates(countryId,stateId) {
	$.ajax({
		type:'POST',
		data:{ "countryid":countryId,"stateid":stateId },
		url: BASEPATH + "/state",
		success:function(reponse) {
			$('#per_state_id').html(reponse);
		},
		error:function(error) {
			alert(error);
		}
	});
}

function getBranches(companyId,branchId) {
	$.ajax({
		type:'POST',
		data:{ "companyid":companyId,"branchid":branchId },
		url: BASEPATH + "/branch",
		success:function(reponse) {
			$('#branch_id').html(reponse);
		},
		error:function(error) {
			alert(error);
		}
	});
}

function getCities(stateId,cityId) {
	$.ajax({
		type:'POST',
		data:{ "countryid":countryId,"stateid":stateId },
		url: BASEPATH + "/city",
		success:function(reponse) {
			$('#city_id').html(reponse);
		},
		error:function(error) {
			alert(error);
		}
	});
}