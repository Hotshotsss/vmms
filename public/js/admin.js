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
    defaultDate: '2018-03-12',
    navLinks: true, // can click day/week names to navigate views
    eventLimit: true, // allow "more" link when too many events

    events: [
      {
        title: 'Jason Lopez - Gate Entrance',
        start: '2018-03-01 08:00:00',
        end: '2018-03-01 15:00:00',
        description: 'gate',
        textColor: 'pink',
      },
      {
        title: 'Joyce Ann',
        start: '2018-03-01 15:00:00',
        end: '2018-03-02 21:00:00',

      },

      {
        title: 'Long Event',
        start: '2018-03-07',
        end: '2018-03-10'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2018-03-09T16:00:00'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: '2018-03-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2018-03-11',
        end: '2018-03-13'
      },
      {
        title: 'Meeting',
        start: '2018-03-12T10:30:00',
        end: '2018-03-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2018-03-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2018-03-12T14:30:00'
      },
      {
        title: 'Happy Hour',
        start: '2018-03-12T17:30:00'
      },
      {
        title: 'Dinner',
        start: '2018-03-12T20:00:00'
      },
      {
        title: 'Birthday Party',
        start: '2018-03-13T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2018-03-28'
      }
    ]
  });

});
