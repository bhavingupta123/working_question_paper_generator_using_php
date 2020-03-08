
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

    			
    			$sql="SELECT * FROM register";
                $res=mysqli_query($conn, $sql);
            
    			if (mysqli_num_rows($res)>0) 
    			{
    				$x=mysqli_fetch_assoc($res);
                    if($x['email']==$email)
                    {
                        if($x['password']==$password)
                        {
                            header("Location:selectsubject.html");
                        }
                    }

				}

				else {
    				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}    		
    		}
    }
?>

