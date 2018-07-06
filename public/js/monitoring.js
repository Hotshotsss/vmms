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
  var violation = $(this);
  $('#valueLocation').text(violation.find(":selected").text());
  $('#locationID').val(violation.val());
  $("#confirmLocation button[type='submit']").val($(this).data('id').id);

  $("#confirmLocation").modal("show");
});

$(document).on('click','.close-violation',function(){
  $("#confirmLocation").modal("hide");
});
