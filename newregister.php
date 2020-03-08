

<?php 	

	$dbservername="localhost";
	$dbuser="root";
	$dbpassword="";
	$dbname="question";

	$conn=mysqli_connect($dbservername,$dbuser,$dbpassword,$dbname);
    
    if($conn)
    {
    	if(isset($_GET['submit']))
    		{

    			$password=$_GET['pswd'];
    			
    			$email=$_GET['email'];

    			
    			$sql="INSERT INTO register(email,password) VALUES('$email','$password')";

                echo "inserting data";


    			if (mysqli_query($conn, $sql)) 
    			{
    				header("Location:qustionadd.html");
				}

				else {
    				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}    		
    		}
    }
?>

