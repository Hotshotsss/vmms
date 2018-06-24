$(document).on('click','#edit-rate',function(){
  var values = $(this).data('id');
  $('#editRate input[name="car_type"]').val(values.car.type);
  $('#editRate input[name="rate"]').val(values.standard_rate);
  $('#editRate input[name="hours"]').val(values.standard_hours);
  $('#editRate input[name="hour_rate"]').val(values.hour_rate);
  $('#editRate button[name="id"]').val(values.id);

  $('#editRate').modal('show');
});

$('#from_date').datepicker({
  minDate:0,
  onSelect:function(selectedDate) {
    $('#to_date').datepicker('option', 'minDate',selectedDate);
  }
});



$('#to_date').datepicker();
