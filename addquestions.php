<?php
	$dbservername="localhost";
	$dbuser="root";
	$dbpassword="";
	$dbname="questionbank";

	$conn=mysqli_connect($dbservername,$dbuser,$dbpassword,$dbname);


    if($conn)
    {
    	if(isset($_GET['submit']))
    		{
            
    		    $subject=$_GET['subject'];
            
                $ques=$_GET['question'];

    			$marks=$_GET['marks'];
            
                $module=$_GET['module'];

                $complexity=$_GET['complexity'];
            
                $sql="SELECT sno FROM question where subject='$subject' and complexity='$complexity' and marks='$marks' and module='$module' ";
                $res=mysqli_query($conn, $sql);
            
    			if (mysqli_num_rows($res)>0) 
    			{
    				$x=mysqli_fetch_assoc($res);
                    
                    $sno=$x['sno'];
                    
                    $sno=$sno+1;
                    
                    $sql="INSERT INTO question(sno,subject,question,marks,complexity,module)VALUES('$sno','$subject','$ques','$marks','$complexity','$module')";

	    			if (mysqli_query($conn, $sql)) 
	    			{
	    				echo "New question added with existing complexity";
					}
                    
                    else
                    {
                        echo "error";
                        header("Location:addquestions.html");
                    }

				}
            
                else
                {
                    $sno=1;
                    $sql="INSERT INTO question(sno,subject,question,marks,complexity,module)VALUES('$sno','$subject','$ques','$marks','$complexity','$module')";

	    			if (mysqli_query($conn, $sql)) 
	    			{
	    				echo "New question added for first time of this complexity";
					}
                    
                    else
                    {
                        echo "error";
                        header("Location:addquestions.html");
                    }    
                }
    			
    			
		
    		}
    }

    else
    {
        echo "no connecton";
    }
?>