if($('#editPassword').length){
  $('#editPassword').modal('show');
}

/*Violation*/
$('.select-violation').on('change', function() {
  var violation = $(this);
  $('#valueViolation').text(violation.find(":selected").text());
  $('#violationID').val(violation.val());
  $("#confirmViolation button[type='submit']").val($(this).data('id').id);

  $("#confirmViolation").modal("show");
});

$(document).on('click','.close-violation',function(){
  $("#confirmViolation").modal("hide");
});


/*Location*/
$('.select-location').on('change', function() {
  var location = $(this);
  $('#valueLocation').text(location.find(":selected").text());
  $('#locationID').val(location.val());
  $("#confirmLocation button[type='submit']").val($(this).data('id').id);

  $("#confirmLocation").modal("show");
});

$(document).on('click','.close-violation',function(){
  $("#confirmLocation").modal("hide");
});

$(document).on('click','#edit-location',function(){
  var id = $(this).data('id').id;

  $('#editLocation button[name="id"]').val(id);
  $('#editLocation').modal('show');
});
// /*edit-Location*/
// $('.select-edit-location').on('change', function() {
//   var location = $(this);
//   $("#editLocation button[type='submit']").val(location.val());
// });

$(document).on('click','.close-violation',function(){
  $("#editLocation").modal("hide");
});

/*color*/
$('.select-color').on('change', function() {
  var color = $(this);
  $('#valueColor').text(color.find(":selected").text());
  $('#colorName').val(color.val());
  $("#confirmColor button[type='submit']").val($(this).data('id').id);

  $("#confirmColor").modal("show");
});


$(document).on('click','.close-color',function(){
  $("#confirmColor").modal("hide");
});

$(document).on('click','#edit-color',function(){
  var id = $(this).data('id').id;

  $('#editColor button[name="id"]').val(id);
  $('#editColor').modal('show');
});

$(document).on('click','.close-remarks',function(){
  $("#addRemarks").modal("hide");
});

/*Remarks*/
$(document).on('click','#open-remarks',function(){
  var id = $(this).data('id').id;

  $('#addRemarks button[name="id"]').val(id);
  $('#addRemarks').modal('show');
});

$(document).on('click','.close-remarks',function(){
  $("#addRemarks").modal("hide");
});

$(document).on('click','#edit-remarks',function(){
  var id = $(this).data('id').id;

  $('#editRemarks button[name="id"]').val(id);
  $('#editRemarks').modal('show');
});

$(document).on('click','.close-editremarks',function(){
  $("#editRemarks").modal("hide");
});
