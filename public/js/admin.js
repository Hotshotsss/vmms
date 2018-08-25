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

  $('#editViolation input[name="violation"]').val(values.violation);
  $('#editViolation input[name="penalty"]').val(values.penalty);
  $('#editViolation button[name="id"]').val(values.id);

  $('#editViolation').modal('show');
});


$(document).on('click','#edit-purpose',function(){

  var values = $(this).data('id');

;
  if($.inArray(values.id,[1,2,3]) > -1){
    var info = '<div id="purpose-body" class="alert alert-warning"><strong>Warning!</strong> We do not recommend changing the value of this item!</div>';
    $('#purpose-body').html(info);
  }else{
    $('#purpose-body .alert-warning').remove();
  }

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

  $('#editUser #sel1').val(values.type);
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
    eventLimit: true, // allow "more" link when too many events
    events: {
      url: '/admin/getSched',
      error: function() {
        alert('No Schedule');
      }
    },
    eventClick: getEvent
  });

});

function getEvent(data){
  var assignment = data.assigned_at;
  if(assignment == 0){
    var ito = '#edit-admin';
    $(ito+' select[name="user"]').val(data.user_id);
    $(ito+' input[name="from_date"]').val(moment(data.start).format('MM/DD/YYYY'));
    $(ito+' input[name="to_date"]').val(moment(data.end).format('MM/DD/YYYY'));
    $(ito+' select[name="time_in"]').val(moment(data.start).format('H:mm'));
    $(ito+' select[name="time_out"]').val(moment(data.end).format('H:mm'));


    //create hidden id
    $('<input>').attr({
      type: 'hidden',
      name: 'edit',
      value: data.id
    }).appendTo(ito+' form');

    $(ito).modal('show');
  }
  else{
    var ito = '#edit-guard';
    if(data.assigned_at == 1){
      $('#assignment_label').text('Monitoring');
      $('#sched').val(1);
      $('#edit-guard input[name="gate_loc"]').attr('disabled',true);
      $('#assignment').hide();
    }else if(data.assigned_at == 2){
      $('#assignment_label').text('Gate');
      $('#sched').val(2);
      $('#edit-guard input[name="gate_loc"]').attr('disabled',false);
      $('#assignment').show();
      $(ito+' input[name="gate_loc"][value="2"]').prop('checked',true);
    }else{
      $('#sched').val(2);
      $('#assignment_label').text('Gate');
      $('#edit-guard input[name="gate_loc"]').attr('disabled',false);
      $('#assignment').show();
      $(ito+' input[name="gate_loc"][value="3"]').prop('checked',true);
    }

    $(ito+' select[name="user"]').val(data.user_id);
    $(ito+' input[name="from_date"]').val(moment(data.start).format('MM/DD/YYYY'));
    $(ito+' input[name="to_date"]').val(moment(data.end).format('MM/DD/YYYY'));
    $(ito+' select[name="time_in"]').val(moment(data.start).format('H:mm'));
    $(ito+' select[name="time_out"]').val(moment(data.end).format('H:mm'));

    $('<input>').attr({
      type: 'hidden',
      name: 'edit',
      value: data.id
    }).appendTo(ito+' form');

    $(ito).modal('show');
  }
}

$(document).on('change','#sched',function(){
  if(this.value == 1){
    $('#assignment_label').text('Monitoring');
    $('#edit-guard input[name="gate_loc"]').attr('disabled',true);
    $('#assignment').hide();
  }else{
    $('#assignment_label').text('Gate');
    $('#edit-guard input[name="gate_loc"]').attr('disabled',false);
    $('#assignment').show();
  }
});

if($('#editPassword2').length){
  $('#editPassword2').modal('show');
}

function initMap() {
if($('#map').length){
  var map = new google.maps.Map(document.getElementById('map'), {
    center: new google.maps.LatLng(14.6591102, 120.9860692),
    zoom: 17,
    mapTypeId: 'satellite',
    heading: 270,
    tilt: 45,
    zoomControl:true
  });


  $.getJSON("/map", function(json1) {
    $.each(json1, function(key, data) {
      var latLng = new google.maps.LatLng(data.lat, data.lng);
      var id = data.id;
      var name = data.name;
      var address = data.address;
      var type = data.type;

      var infowincontent = '<div style="color:#333"><strong>'+name+'</strong><br><text>'+address+'</text></div>'

      var marker = new google.maps.Marker({
        position: latLng,
        animation: google.maps.Animation.DROP,
        map: map,
        title: data.name
      });

      var infowindow = new google.maps.InfoWindow({
        content: infowincontent
      });
      marker.addListener('click', function() {
        infowindow.open(map, marker);
      });
    });
  });
}
}
