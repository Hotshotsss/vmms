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
