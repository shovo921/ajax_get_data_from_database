<?php

$con=mysqli_connect('localhost','root','','ajax');

$nameid= $_POST['datapost'];

$sql="SELECT * from class where mid=$nameid";
$esult=mysqli_query($con,$sql);
 while ($row=mysqli_fetch_array($esult)) {
		  	
		  
		  	?>
		  	<option value="<?php  echo $row['id']?>"><?php  echo $row['year']?></option>

    <?php }
    ?>


?>