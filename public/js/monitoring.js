
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
