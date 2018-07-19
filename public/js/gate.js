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
  $('#monitoring-plate').text(values.plate_number);
  $('#monitoring-model').text(values.vehicle_model);
  $('#monitoring-timein').text(values.time_in);
  $('#monitoring-hours').text(values.duration);
  $('#first-hours-label').text('First '+values.standard_hours+' hours');
  $('#first-hours-value').text(Number(values.standard_rate).toFixed(2).toLocaleString('en'));
  $('#monitoring-exceeding').text(Number(values.duration - values.standard_hours).toFixed(2).toLocaleString('en'));
  $('#monitoring-penalty').text(Number(values.penalty).toFixed(2).toLocaleString('en'));
  $('#monitoring-violation').text(violationsList.toString());
  $('#monitoring-location').text(values.location ? values.location.parking_name : '');
  $('#monitoring-reason').text(values.discount);
  $('#monitoring-total').text('₱'+Number(values.amount).toFixed(2).toLocaleString('en'));
  $('#vehicleMonitoring button[name="out"]').val(values.id);
  $('#vehicleMonitoring').modal('show');
}
// $(document).on('click','#view-details',function(){
//   var values = $(this).data('id');
//   var checkin = new Date(values.time_in);
//   var timeout = new Date();
//   var hours = Math.ceil(Math.abs(checkin-timeout)/36e5);
//   var violations = values.violations;
//   var totalPenalty = 0;
//   var tr_id = $(this).parents('tr').attr('id');
//   row_id = tr_id;
//
//   var standard_hours = values.car_rate ? values.car_rate.standard_hours : 0 ;
//   var standard_rate = values.car_rate ? values.car_rate.standard_rate : 0;
//   var hourly_rate = values.car_rate ? values.car_rate.hour_rate : 0;
//
//   var violationsList = [];
//
//   for(i = 0; i < violations.length; i++){
//     totalPenalty += Number(violations[i].violation_name.penalty);
//     violationsList.push(violations[i].violation_name.violation);
//   }
//   var exceedinghours = 0;
//   if(hours > standard_hours){
//     exceedinghours = (hours - standard_hours) * hourly_rate; /*change 30 to dynamic rate per hour*/
//   }
//   var standard_hours_text = 'First '+standard_hours+' hours';
//   var total = 0; //change 40 to dynamic rate standard hour
//   var less = null;
//
//   if(values.parking_reason == 1 && values.hospital_proof == 1){
//     var days = Math.ceil((new Date() - new Date(values.time_in)) / (1000 * 60 * 60 * 24));
//     standard_hours_text = 'Per day';
//     standard_rate = 25;
//     exceedinghours = 0;
//     days = days == 0 ? 1 : days;
//     less = 'Patient Discount';
//     total = 25 * days;
//   }else if(values.parking_reason == 2 || values.parking_reason == 3){
//     var minutes = Math.ceil((new Date().getTime() - new Date(values.time_in).getTime()) / 60000);
//     if(minutes < 16){
//       total = 0;
//       less = 'Drop By/Delivery';
//     }else{
//       total = exceedinghours + standard_rate;
//     }
//   }else{
//
//     total = exceedinghours + standard_rate;
//   }
//
//   var final = total + totalPenalty;
//
//   $('#monitoring-plate').text(values.plate_number);
//   $('#monitoring-model').text(values.vehicle_model);
//   $('#monitoring-timein').text(values.time_in);
//   $('#monitoring-hours').text(hours);
//   $('#vehicleMonitoring #checkOut-submit').attr('data-tr-id',tr_id);
//   $('#first-hours-label').text(standard_hours_text);
//   $('#first-hours-value').text(Number(standard_rate).toFixed(2).toLocaleString('en'));
//   $('#monitoring-exceeding').text(Number(exceedinghours).toFixed(2).toLocaleString('en'));
//   $('#monitoring-penalty').text(Number(totalPenalty).toFixed(2).toLocaleString('en'));
//   $('#monitoring-violation').text(violationsList.toString());
//   $('#monitoring-location').text(values.location ? values.location.parking_name : '');
//   $('#monitoring-reason').text(less);
//   $('#monitoring-total').text('₱'+Number(final).toFixed(2).toLocaleString('en'));
//   $('#vehicleMonitoring button[name="out"]').val(values.id);
//   $('#vehicleMonitoring').modal('show');
// });


if($('#editPassword').length){
  $('#editPassword').modal('show');
}

var row_id = null;

$(document).on('submit','#checkOut-submit',function(){
  $('#vehicleMonitoring').modal('hide');
  $('#'+row_id).remove();
});
