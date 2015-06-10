<h2>Website news</h2>

<?php
echo anchor(site_url("admin/website_news/add/"),'Add a Website news','class="btn btn-primary"');
echo "<br>";
echo "<br>";
if(!$results){
	echo '<h1>Website news No Data</h1>';
	exit;
}
$status = array(''=>'Select User status','A'=>'Active','I'=>'Inactive');
$header = array_keys($results[0]);
array_push($header , '<B> View</B>','<B> Edit</B>','<B> Delete</B>');
for($i=0;$i<count($results);$i++)
{
    $id = array_values($results[$i]);
    $results[$i]['View']     = anchor(site_url('admin/website_news/view/'.$id[0]),"<i class='glyphicon glyphicon-folder-open'></i>",'title="View"');
    $results[$i]['Edit']     = anchor(site_url('admin/website_news/edit/'.$id[0]),"<i class='glyphicon glyphicon-pencil'></i>",'title="Edit"');
    $results[$i]['Delete']   = anchor(site_url('admin/website_news/delete/'.$id[0]),"<i class='glyphicon glyphicon-remove-sign'></i>",array('onClick'=>'return deletechecked(\' '.site_url('admin/website_news/delete/'.$id[0]).' \')', 'title'=>'Delete'));
    $results[$i]['status']   = status_manager($results[$i]['status']);
                                // anchor(site_url('website_news/delete/'.$id[0]),'Delete',array('onClick'=>'return deletechecked(\' '.base_url().'index.php/website_news/delete/'.$id[0].' \')'));
	array_shift($results[$i]);                        
}
        
$clean_header = clean_header($header);
array_shift($clean_header);
$tmpl = array ( 'table_open'  => '<table class="table table-hover table-bordered">' );

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