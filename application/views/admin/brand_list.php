<h2>Brand</h2>

<?php
echo anchor(site_url("admin/brand/add/"),'Add a Brand','class="btn btn-primary"');
echo "<br>";
echo "<br>";
if(!$results){
	echo '<h1>Brand No Data</h1>';
	exit;
}

$header = array_keys($results[0]);

array_push($header , /*'<B> View</B> ',*/'<B> Edit</B> ','<B> Delete</B> ');
for($i=0;$i<count($results);$i++)
{
    $id = array_values($results[$i]);
    // $results[$i]['View']     = anchor(site_url('admin/brand/view/'.$id[0]),"<i class='glyphicon glyphicon-folder-open'></i>",'title="View"');
    $results[$i]['Edit']     = anchor(site_url('admin/brand/edit/'.$id[0]),"<i class='glyphicon glyphicon-pencil'></i>",'title="Edit"');
    $results[$i]['Delete']   = anchor(site_url('admin/brand/delete/'.$id[0]),"<i class='glyphicon glyphicon-remove-sign'></i>",array('onClick'=>'return deletechecked(\' '.site_url('admin/brand/delete/'.$id[0]).' \')', 'title'=>'Delete'));
    $results[$i]['image'] = "<div class='thum_img'><img src='".base_url('upload/img/brand/'.$results[$i]['image'])."'></div>";


	array_shift($results[$i]);                        
}
        
$clean_header = clean_header($header);
array_shift($clean_header);
$tmpl = array ( 'table_open'  => '<table class="table table-hover table-bordered">' );

$this->table->set_template($tmpl); 
$this->table->set_heading($clean_header); 

echo "<div class='col-md-3'>";
// view
echo $this->table->generate($results); 
echo $this->pagination->create_links();
echo "</div class='col-md-3'>";;
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