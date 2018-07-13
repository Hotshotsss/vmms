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

  var total = exceedinghours + standard_rate + totalPenalty; //change 40 to dynamic rate standard hour

  $('#monitoring-plate').text(values.plate_number);
  $('#monitoring-model').text(values.vehicle_model);
  $('#monitoring-timein').text(values.time_in);
  $('#monitoring-hours').text(hours);
  $('#monitoring-exceeding').text(Number(exceedinghours).toFixed(2).toLocaleString('en'));
  $('#monitoring-penalty').text(Number(totalPenalty).toFixed(2).toLocaleString('en'));
  $('#monitoring-violation').text(violationsList.toString());
  $('#monitoring-location').text(values.location.parking_name);
  $('#monitoring-total').text('₱'+Number(total).toFixed(2).toLocaleString('en'));
  $('#vehicleMonitoring button[name="out"]').val(values.id);
  $('#vehicleMonitoring').modal('show');
});
