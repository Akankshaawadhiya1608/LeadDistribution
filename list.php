<?php

require_once('config.php');


$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;

$message ='';

if($flag){

  $message = $messages[$flag];

}

$filter = [];

$options = [
    'sort' => ['_id' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);

$cursor = $manager->executeQuery('iffco_local_db.leadsdata', $query);



?>
<table class='table table-bordered'>
   <thead>

      <tr>
            <th>#</th>

            <th>Prodcut</th>

            <th>Price</th>

             <th>Category</th>
    
            <th>Action</th>

      </tr>
  
   </thead>

    <?php 

    $i =1; 

    foreach ($cursor as $document) {   ?>

      <tr>

      <td><?php echo $i; ?></td>

      <td><?php echo $document->name;  ?></td>

      <td><?php echo $document->password;  ?></td>        
    
     <td><?php echo $document->email;  ?></td>
      
     <td><a class='editlink' data-id=<?php echo $document->_id; ?> 
             href='javascript:void(0)'>Edit</a> |
        <a onClick ='return confirm("Do you want to remove this
                     record?");' 
        href='record_delete.php?id=<?php echo $document->_id;  ?>'>Delete</td>

      </tr>

     <?php $i++;  

  } 

  ?>

</table>
