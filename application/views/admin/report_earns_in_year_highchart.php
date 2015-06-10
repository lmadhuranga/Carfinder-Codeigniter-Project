
<h1>Year earn value get by month - High chart</h1>
 
 <script src="<?php echo(base_url('asset/js/highstock.js')) ?>"></script>
 <script src="<?php echo(base_url('asset/js/exporting.js')) ?>"></script> 

<div id="container" style="height: 400px; min-width: 310px"></div>


<script>
	jQuery(document).ready(function($) {
		
		$(function() {

		// $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function(data) {
			// Create the chart
 
			data = <?php echo(json_encode($results_json)); ?>;
 
					
					// Create the chart
			$('#container').highcharts('StockChart', {
				

				rangeSelector : {
					selected : 1,
					inputEnabled: $('#container').width() > 480
				},
				credits: {
	                enabled: false
	            },

				title : {
					text : 'Year earn value report'
				},
				
				series : [{
					name : 'Rs',
					data : data,
					tooltip: {
						valueDecimals: 2
					}
				}]
			});
		 
		// });

		});
	});

</script>