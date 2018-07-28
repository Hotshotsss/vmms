var row_id;
$(document).on('click','#view-details',function(){
  var $id = $(this).data('id');
  var tr_id = $(this).parents('tr').attr('id');
  $('#vehicleMonitoring #checkOut-submit').attr('data-tr-id',tr_id);
  row_id = tr_id;
  $.ajax({
    type:'get',
    url: '/gate/check-out-data/'+$id,
    success: showDetails,
    error: function(data){
      alert('Something went wrong please try again.');
    }
  });
});

function showDetails(data){
  var values = JSON.parse(data);
  var violationsList = [];
  var totalPenalty = 0;
  var violations = values.violations;

  for(i = 0; i < violations.length; i++){
    totalPenalty += Number(violations[i].violation_name.penalty);
    violationsList.push(violations[i].violation_name.violation);
  }

  if(values.parking_reason != 1){
    $('#proof input[name="hospital_proof"]').attr('disabled',true);
    $('#proof').hide();
  }else{
    $('#proof input[name="hospital_proof"]').attr('disabled',false);
    $('#proof').show();
  }
  var duration = values.duration > 0 ? values.duration : 0;
  var exceeding = duration - values.standard_hours;
  $('#monitoring-plate').text(values.plate_number);
  $('#monitoring-model').text(values.vehicle_model);
  $('#monitoring-timein').text(values.time_in);
  $('#monitoring-hours').text(duration);
  $('#first-hours-label').text('First '+values.standard_hours+' '+values.hours);
  $('#first-hours-value').text(Number(values.standard_rate).toFixed(2).toLocaleString('en'));
  $('#monitoring-exceeding').text(Number(exceeding > 0 ? exceeding : 0).toFixed(2).toLocaleString('en'));
  $('#monitoring-penalty').text(Number(values.penalty).toFixed(2).toLocaleString('en'));
  $('#monitoring-violation').text(violationsList.toString());
  $('#monitoring-location').text(values.location ? values.location.parking_name : '');
  $('#monitoring-reason').text(values.discount);
  $('#monitoring-total').text('₱'+Number(values.amount).toFixed(2).toLocaleString('en'));
  $('#vehicleMonitoring button[name="out"]').val(values.id);
  $('#vehicleMonitoring').modal('show');
}

if($('#editPassword').length){
  $('#editPassword').modal('show');
}

var row_id = null;

$(document).on('submit','#checkOut-submit',function(){
  $('#vehicleMonitoring').modal('hide');
  $('#'+row_id).remove();
});
