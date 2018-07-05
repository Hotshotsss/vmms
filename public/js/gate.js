$(document).on('click','#view-details',function(){

  var values = $(this).data('id');
  var checkin = new Date(values.time_in);
  var timeout = new Date();
  var hours = Math.ceil(Math.abs(checkin-timeout)/36e5);
  var violations = values.violations;
  var totalPenalty = 0;

    var violationsList = [];

  for(i = 0; i < violations.length; i++){
    totalPenalty += Number(violations[i].violation_name.penalty);
    violationsList.push(violations[i].violation_name.violation);
  }


  var exceedinghours = (hours - 3) * 30; /*change 30 to dynamic rate per hour*/

  var total = exceedinghours + 40 + totalPenalty; //change 40 to dynamic rate standard hour

  $('#monitoring-plate').text(values.plate_number);
  $('#monitoring-model').text(values.vehicle_model);
  $('#monitoring-timein').text(values.time_in);
  $('#monitoring-hours').text(hours);
  $('#monitoring-exceeding').text(exceedinghours);
  $('#monitoring-penalty').text(totalPenalty);
  $('#monitoring-violation').text(violationsList.toString());
  $('#monitoring-total').text(total);
  $('#vehicleMonitoring button[name="out"]').val(values.id);
  $('#vehicleMonitoring').modal('show');
});
