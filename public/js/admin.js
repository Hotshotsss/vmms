$(document).on('click','#edit-rate',function(){
  var values = $(this).data('id');
  $('#editRate input[name="car_type"]').val(values.car.type);
  $('#editRate input[name="rate"]').val(values.standard_rate);
  $('#editRate input[name="hours"]').val(values.standard_hours);
  $('#editRate input[name="hour_rate"]').val(values.hour_rate);
  $('#editRate button[name="id"]').val(values.id);

  $('#editRate').modal('show');
});


$(document).on('click','#edit-parking',function(){

  var values = $(this).data('id');

  $('#editParking input[name="parking_name"]').val(values.parking_name);
  $('#editParking input[name="description"]').val(values.description);
  $('#editParking input[name="slots"]').val(values.number_of_slots);
  $('#editParking button[name="id"]').val(values.id);

  $('#editParking').modal('show');
});

$(document).on('click','#edit-violation',function(){

  var values = $(this).data('id');

  $('#editParking input[name="parking_name"]').val(values.parking_name);
  $('#editParking input[name="description"]').val(values.description);
  $('#editParking input[name="slots"]').val(values.number_of_slots);
  $('#editParking button[name="id"]').val(values.id);

  $('#editViolation').modal('show');
});


$(document).on('click','#edit-purpose',function(){

  var values = $(this).data('id');

  $('#editPurpose input[name="purpose"]').val(values.purpose);
  $('#editPurpose button[name="id"]').val(values.id);

  $('#editPurpose').modal('show');
});

$(document).on('click','#edit-password',function(){

  var values = $(this).data('id');

  $('#editPassword input[name="username"]').val(values.username);

  $('#editPassword button[name="change"]').val(values.id);

  $('#editPassword').modal('show');
});

$(document).on('click','#edit-user',function(){

  var values = $(this).data('id');

  $('#editUser input[name="type"]').val(values.type);
  $('#editUser input[name="name"]').val(values.name);
  $('#editUser input[name="username"]').val(values.username);
  $('#editUser button[name="edit"]').val(values.id);

  $('#editUser').modal('show');
});



$('input[name="from_date"]').datepicker({
  minDate:0,
  onSelect:function(selectedDate) {
    $('input[name="to_date"]').datepicker('option', 'minDate',selectedDate);
  }
});

$('input[name="to_date"]').datepicker();

$(document).ready(function() {
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',

    },
    displayEventEnd: true,

    defaultView: 'month',
    defaultDate: new Date(),
    navLinks: true, // can click day/week names to navigate views
    eventLimit: true, // allow "more" link when too many events
    events: {
      url: '/admin/getSched',
      error: function() {
        alert('No Schedules');
      }
    },
  });

});
if($('#editPassword').length){
  $('#editPassword').modal('show');
}
