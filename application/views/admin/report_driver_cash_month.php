</script>
<div class="col-md-8">
	<h1>Earn value by Drive in Month - Year Report</h1>
	<br>
	<br>
	<div class=".col-md-3 .col-md-offset-3">
		<a href="<?php echo(site_url('admin/report/report_driver_cash_month/report')); ?>" class="btn btn-primary">Download as pdf</a>
	</div>

	<br>
	<table class='table ' id='earn_value_month'>
		<tr>
			<th><p class='text-center'># </p></th>
			<th><p class='text-center'>Month </p></th>
			<th><p class='text-center'>Driver name </p></th>
			<th><p class='text-center'>Hire count</p></th>
			<th><p class='text-center'>Travel distance</p></th>
			<th><p class='text-right'>Payment</p></th>
		</tr>
		<?php $total_hire_count = 0; ?>
		<?php $total_hire_distance = 0; ?>
		<?php foreach ($results as $key => $value): ?>
		<?php $total_hire_count += (int)$value->hire_count ?>
		<?php $total_hire_distance += (int)$value->travel_distance ?>
		<tr> 
			<td><p class='text-center'><?php echo($key+1) ?>:</p></td>
			<td><p class='text-center'><?php echo(get_month_name($value->month_id)) ?></p></td>
			<td><p class='text-center'><?php echo(anchor(site_url('admin/driver/view/'.$value->driver_id), $value->driver_first_name.' '.$value->driver_last_name)) ?></p></td>
			<td><p class='text-center'><?php echo($value->hire_count) ?></p></td>
			<td><p class='text-center'><?php echo($value->travel_distance) ?></p></td>
			<td><p class='text-right'><?php echo($value->cash_sum) ?>.00</p></td>
		</tr>
		<?php endforeach ?> 
		<tr> 
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><p class='text-center'><?php echo $total_hire_count ?></p></td>			
			<td><p class='text-center'><?php echo $total_hire_distance ?></p></td>			
			<td><p class="text-right"><?php echo($results2[0]->total) ?>.00</p></td>
		</tr>			
	</table>
		
</div><!-- ./container -->
	
<link rel="stylesheet" href="<?php echo(base_url('asset/css/jquery.dataTables.css')); ?>">
<script src='<?php echo(base_url('asset/js/jquery.dataTables.min.js')); ?>'></script>
<script>
$(document).ready(function() {
$('#earn_value_month').dataTable();
});
</script>