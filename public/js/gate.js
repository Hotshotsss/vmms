$(document).on('click','#view-details',function(){

  var values = $(this).data('id');
  var checkin = new Date(values.time_in);
  var timeout = new Date();
  var hours = Math.ceil(Math.abs(checkin-timeout)/36e5);
  var exceedinghours = (hours - 3) * values.penalty; /*hour-rate not penalty*/
  var
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



(function(){
    'use strict';
	var $ = jQuery;
	$.fn.extend({
		filterTable: function(){
			return this.each(function(){
				$(this).on('keyup', function(e){
					$('.filterTable_no_results').remove();
					var $this = $(this),
                        search = $this.val().toLowerCase(),
                        target = $this.attr('data-filters'),
                        $target = $(target),
                        $rows = $target.find('tbody tr');

					if(search == '') {
						$rows.show();
					} else {
						$rows.each(function(){
							var $this = $(this);
							$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
						})
						if($target.find('tbody tr:visible').size() === 0) {
							var col_count = $target.find('tr').first().find('td').size();
							var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
							$target.find('tbody').append(no_results);
						}
					}
				});
			});
		}
	});
	$('[data-action="filter"]').filterTable();
})(jQuery);

function filterContent(){
$('.panel-body1').slideToggle();
}
