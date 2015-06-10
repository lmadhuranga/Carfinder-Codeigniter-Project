
<div class="col-md-8">

	<h1>Month earn value  - 2014-08</h1>
	<a href="<?php echo(site_url('admin/report/report_driver_cash_date/pdf')); ?>" class='btn btn-primary'>Download as pdf</a>
	<br>
	<br>
	<table class='table table-bordered '>
		<tr>
			<th><p class='text-left'>#</p></th>
			<th><p class='text-center'>Driver name</p></th>
			<th><p class='text-left'>Pay date</p></th>
			<th><p class='text-right'>Payment</p></th>
		</tr>
		<?php foreach ($results as $key => $value): ?>
		<tr>
			<td><p class='text-left'><?php echo ($key+1) ?>:</p></td>
			<td><p class='text-center'><?php echo(anchor(site_url('admin/driver/view/'.$value->driver_id), $value->driver_first_name.' '.$value->driver_last_name)) ?></p></td>
			<td><p class='text-left'><?php echo($value->pay_day) ?></p></td>
			<td><p class='text-right'><?php echo($value->cash_sum) ?>.00</p></td>
		</tr>
		<?php endforeach ?>
		<tr class='warning'>
			<td><p class='text-left'>&nbsp;</p></td>
			<td><p class='text-left'>&nbsp;</p></td>
			<td><strong><p class='text-left'>Total:</p></strong></td>
			<td><strong><p class='text-right'><?php echo($results2[0]->total) ?>.00</p></strong></td>
		</tr>
			
	</table>
</div><!-- ./container -->