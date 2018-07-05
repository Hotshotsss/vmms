
$('#sel1').on('change', function() {
  var violation = $(this).val();
  $('#valueViolation').text(violation);
  $("#confirmViolation").modal("show");

});
