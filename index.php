<?php
$con=mysqli_connect('localhost','root','','ajax');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 
</head>
	<body>
		
		<div class="container col-4 ">
		 <h3 class="text-center text-danger">Get Data from DataBase</h3>
		 <form>
		 	
		Username:  <input type="text" name="name" id="name" class="form-control" >
		   
		Email:  <input type="email" name="email" id="email" class="form-control" >
		  
		Degree:  <select id="degree" class="form-control" onchange="myfun(this.value)">
		  	<option>select any one</option>
		  	<?php
		  	$sql="SELECT * from degree";
		  	$result=mysqli_query($con,$sql);
		   while ($row=mysqli_fetch_array($result)) {
		  	
		  
		  	?>
		  	<option value="<?php  echo $row['id']?>"><?php  echo $row['class']?></option>



    <?php }
    ?>
		  </select>
		 
		class:  <select class="form-control" id="dataget">
		  	<option>select any one</option>
		  </select>
		  <br>
		  <button id="Submit" name="Submit"class="btn btn-primary">Submit</button>
		  </form>
		</div>


<script type="text/javascript">
	
function myfun(datavalue){

	$.ajax({

			url:'abc.php',
			type:'POST',
			data:{datapost:datavalue},
			success:function(result){
				$('#dataget').html(result);
			}

	});
}

  $('#Submit').on('click',function(e){

         console.log("success");    
    
    $.ajax({

        type:'post',
        data:{"name":$("#name").val(),"email":$("#email").val(),"degree":"#degree".val()},

        url:'submit.php',
        success:alert("success"),
    })
  });

</script>
  
</body>
</html>