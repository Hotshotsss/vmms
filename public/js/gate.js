$(document).on('click','#view-details',function(){

  var values = $(this).data('id');
  var checkin = new Date(values.time_in);
  var timeout = new Date();
  var hours = Math.ceil(Math.abs(checkin-timeout)/36e5);
  var exceedinghours = (hours - 3) * values.penalty; /*hour-rate not penalty*/

  var total = exceedinghours + 40;

  $('#monitoring-plate').text(values.plate_number);
  $('#monitoring-model').text(values.vehicle_model);
  $('#monitoring-timein').text(values.time_in);
  $('#monitoring-hours').text(hours);
  $('#monitoring-exceeding').text(exceedinghours);
  $('#monitoring-penalty').text(values.penalty);
  $('#vehicleMonitoring button[name="out"]').val(values.id);
  $('#vehicleMonitoring').modal('show');
});
