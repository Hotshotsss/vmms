$(document).on('click','#view-details',function(){
  var values = $(this).data('id');
  var checkin = new Date(values.time_in);
  var timeout = new Date();
  var hours = Math.ceil(Math.abs(checkin-timeout)/36e5);
  var violations = values.violations;
  var totalPenalty = 0;

  var standard_hours = values.car_rate.standard_hours;
  var standard_rate = values.car_rate.standard_rate;
  var hourly_rate = values.car_rate.hour_rate;

  var violationsList = [];

  for(i = 0; i < violations.length; i++){
    totalPenalty += Number(violations[i].violation_name.penalty);
    violationsList.push(violations[i].violation_name.violation);
  }
  var exceedinghours = 0;
  if(hours > standard_hours){
    exceedinghours = (hours - standard_hours) * hourly_rate; /*change 30 to dynamic rate per hour*/
  }
  var standard_hours_text = 'First '+standard_hours+' hours';
  var total = 0; //change 40 to dynamic rate standard hour
  var less = null;

  if(values.parking_reason == 1 && values.hospital_proof == 1){
    var days = Math.round((new Date() - new Date(values.time_in)) / (1000 * 60 * 60 * 24));
    standard_hours_text = 'Per day';
    standard_rate = 25;
    exceedinghours = 0;
    days = days == 0 ? 1 : days;
    less = 'Patient Discount';
    total = 25 * days;
  }else if(values.parking_reason == 2){
    var minutes = Math.round((new Date().getTime() - new Date(values.time_in).getTime()) / 60000);
    if(minutes < 16){
      total = 0;
      less = 'Drop By';
    }else{
      total = exceedinghours + standard_rate;
    }
  }else if(values.parking_reason == 3){
    less = 'Delivery';
    total = 0;
  }else{

    total = exceedinghours + standard_rate;
  }

  var final = total + totalPenalty;

  $('#monitoring-plate').text(values.plate_number);
  $('#monitoring-model').text(values.vehicle_model);
  $('#monitoring-timein').text(values.time_in);
  $('#monitoring-hours').text(hours);
  $('#first-hours-label').text(standard_hours_text);
  $('#first-hours-value').text(Number(standard_rate).toFixed(2).toLocaleString('en'));
  $('#monitoring-exceeding').text(Number(exceedinghours).toFixed(2).toLocaleString('en'));
  $('#monitoring-penalty').text(Number(totalPenalty).toFixed(2).toLocaleString('en'));
  $('#monitoring-violation').text(violationsList.toString());
  $('#monitoring-location').text(values.location ? values.location.parking_name : '');
  $('#monitoring-reason').text(less);
  $('#monitoring-total').text('₱'+Number(final).toFixed(2).toLocaleString('en'));
  $('#vehicleMonitoring button[name="out"]').val(values.id);
  $('#vehicleMonitoring').modal('show');
});

$(document).on('hidden.bs.modal','#vehicleMonitoring',function(){
  $('.input-value').text('');
  $('input[type="checkbox"]').prop('checked',false);
});
