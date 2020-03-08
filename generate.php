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
            
            $sum=$_GET['complexity'];
            
            if($_GET['questions'] != '') 
            { 
                $question=$_GET['questions'];
                echo "selected"." ".$_GET['questions']."<br>";
                echo "complexity"." ".$_GET['complexity'];
                
                $sql="select question from question where subject='$question' ";
                //$sql="select * from question";
                //echo $sql;
                $res=mysqli_query($conn, $sql);
            
    			if (mysqli_num_rows($res)>0) 
    			{
    				//$x=mysqli_fetch_assoc($res);
                    
                    $s= mt_rand(1,5);
                    echo "<br>complexity find:".$s;
                    $sno= mt_rand(1,5);
                    $sno= mt_rand(1,5);
                    $sno= mt_rand(1,5);
                    echo "<br>sno:".$sno;
                    
                    
                        while($s<$sum)
                        {
                            
                            $sql="SELECT * FROM question where complexity='$s' and subject='$question' and sno='$sno' ";
                            $res=mysqli_query($conn, $sql);
                            
                            $s= mt_rand(1,5);
                            echo "<br>complexity find:".$s;
                            $sno= mt_rand(1,5);
                            $sno= mt_rand(1,5);
                            $sno= mt_rand(1,5);
                            echo "<br>sno:".$sno;
                            
                            if (mysqli_num_rows($res)>0) 
                                {
                                    $x=mysqli_fetch_assoc($res);
                                    echo "<h1>".$x['question']."</h1>";
                                    
                                    $sum=$sum-$s;
                                
                                    echo "<br>sno while generate:".$sno;
                                    echo "<br>complexity while generate:".$s;
                                    echo "<br>sum while generate:".$sum;
                                    echo "<br>bye1";

                                }
                            
                            else
                            {
                                echo "<br>nothing1";
                                continue;
                                /*$s=rand(1,5);
                                echo "<br>complexity find:".$s;
                                $sno=rand(1,5);
                                echo "<br>sno:".$sno;
                                $sql="SELECT * FROM question where complexity='$s' and subject='$question' and sno='$sno' ";
                                $res=mysqli_query($conn, $sql);
                                $x=mysqli_fetch_assoc($res);
                                echo "<h1>".$x['question']."</h1>";*/
                                
                            }
                        }
                    
                    
                     if($s==$sum)
                        {
                            $sql="SELECT * FROM question where complexity='$s' and subject='$question' and sno='$sno' ";
                            $res=mysqli_query($conn, $sql);
                            
                        
                            /*$s=rand(1,5);
                            echo "<br>complexity find:".$s;
                            $sno=rand(1,5);
                            echo "<br>sno:".$sno;
                            $res=mysqli_query($conn, $sql);*/
                                            
                            if (mysqli_num_rows($res)>0) 
                                {
                                    echo "<h1>".$x['question']."</h1>";
                                    
                                    $sum=$sum-$s;
                                
                                    echo "<br>sno while generate:".$sno;
                                    echo "<br>complexity while generate:".$s;
                                    echo "<br>sum while generate:".$sum;    
                                
                                    echo "<br>nothing2";
                                
                                }
                        
                            else
                            {
                                
                                echo "<br> not able to find";
                            }
                        }
                    

				}
                
                else
                {
                    echo "this is the error3";
                }
            } 
            
            else {
                  //user left default value for dropdown, tell him that:
                  echo "Please select valid value from dropdown list";
                }
        }
    }
?>