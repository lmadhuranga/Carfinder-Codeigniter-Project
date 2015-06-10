<link rel="stylesheet" href="<?php echo(base_url('asset/css/jquery.dataTables.css')); ?>">
<script src='<?php echo(base_url('asset/js/jquery.dataTables.min.js')); ?>'></script>
<script>
    $(document).ready(function() {
    $('#salary_list_tabel').dataTable();
} );
</script>
<h2>Payments</h2>

<?php
echo anchor(site_url("admin/salary/add/"),'Add a Payment','class="btn btn-primary"');
echo "<br>";
echo "<br>";
if(!$results){
	echo '<h1>Payment No Data</h1>';
	exit;
} 
$header = array_keys($results[0]);
array_push($header , '<B> View</B> ','<B> Edit</B> ','<B> Delete</B> ');
// remove drive id
unset($header[3]);
for($i=0;$i<count($results);$i++)
{
    $id = array_values($results[$i]);
    $results[$i]['View']     = anchor(site_url('admin/salary/view/'.$id[0]),"<i class='glyphicon glyphicon-folder-open'></i>",'title="View"');
    $results[$i]['Edit']     = anchor(site_url('admin/salary/edit/'.$id[0]),"<i class='glyphicon glyphicon-pencil'></i>",'title="Edit"');
    $results[$i]['Delete']   = anchor(site_url('admin/salary/delete/'.$id[0]),"<i class='glyphicon glyphicon-remove-sign'></i>",array('onClick'=>'return deletechecked(\' '.site_url('admin/salary/delete/'.$id[0]).' \')', 'title'=>'Delete')); 
    $results[$i]['driver_name']= anchor('admin/salary/user_total_summery/'.$results[$i]['driver_id'], $results[$i]['driver_name'], '');
    $results[$i]['cash']     = money_formator($results[$i]['cash']);
    $results[$i]['status']   =  status_manager($results[$i]['status']);
    $results[$i]['type']   =  status_manager($results[$i]['type']);
    unset($results[$i]['driver_id']);
	array_shift($results[$i]);                        
}
        
$clean_header = clean_header($header);
array_shift($clean_header);
$tmpl = array ( 'table_open'  => '<table id="salary_list_tabel" class="table table-hover table-bordered">' );

$this->table->set_template($tmpl); 
$this->table->set_heading($clean_header); 

// view
echo $this->table->generate($results); 
echo $this->pagination->create_links();


?>
<script type="text/javascript">
    function deletechecked(link)
    {
        var answer = confirm('Delete item?')
        if (answer)
        {
            window.location = link;
        }
        
        return false;  
    }

</script>