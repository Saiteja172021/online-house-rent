<?php
session_start();
include("connection.php");
$ownerid=$_POST["o"];
$nrooms=$_POST['n'];
$rate=$_POST['ra'];
$pics=$_POST['u'];
$country=$_POST['c'];
$state=$_POST['s'];
$city=$_POST['city'];
$add=$_POST['a'];
$desc=$_POST['de'];
$filename=$_FILES["u"]["name"];
$tempname=$_FILES["u"]["tmp_name"];
$folder="images/".$filename;

move_uploaded_file($tempname,$folder);
if($_POST['submit'])
{
	if($ownerid!="" && $nrooms!="" && $desc!="")
	{
      //$pics = addslashes(file_POST_contents($_FILES["p"]["tmp_name"]));
     
//you keep your column name setting for insertion. I keep image type Blob.
//$query = "INSERT INTO products (id,image) VALUES('','$image')";  
//$qry = mysqli_query($conn, $query);
//$image = addslashes(file_POST_contents($_FILES['$pics']));
		$query="insert into house(owner_id,no_of_rooms,rate,country,state,city,address,description,pics) values('$ownerid','$nrooms','$rate','$country','$state','$city','$add','$desc','$folder')";
		$data=mysqli_query($conn,$query);
		
		if($data)

			{
				echo "<script type='text/javascript'>alert('Added successfully')
        window.location.href='houses.php';
        </script>";
	        }
		else
			{
				echo "<script type='text/javascript'>alert('Unsuccessfull')
        window.location.href='houses.php';
        </script>";
			}
	}
}
?>