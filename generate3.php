<?php /* create 2 sets of arrays module wise ,first module question,then next module question*/ 
	$dbservername="localhost";
	$dbuser="root";
	$dbpassword="";
	$dbname="questionbank";

	$conn=mysqli_connect($dbservername,$dbuser,$dbpassword,$dbname);


    if($conn)
    {
        $count=0; // for no of questions
        $arr1=array(0,0,0); // array to store generated random numbers sno
        $arr2=array(0,0,0); // array to store generated random numbers complexity
        
    	if(isset($_GET['submit']))
        { 
            $sum=$_GET['complexity'];
            $module1=$_GET['module1'];
            $module2=$_GET['module2'];
            
            echo "<br> module1:".$module1;
            echo "<br> module2:".$module2;
            
            if($_GET['questions'] != '') 
            { 
                $question=$_GET['questions'];
                echo "<br>selected"." ".$_GET['questions']."<br>";
                echo "<br>complexity"." ".$_GET['complexity'];
                echo "<br><h1>"."1 markers"."</h1>";
                while($count!=10)
                {
                    $complex= rand(1,5);
                    $sno= rand(1,5);
                    $flag=0;
                    for($i=0;$i<sizeof($arr1);$i++)   // 1 markers
                    {
                        if(($arr1[$i]==$sno && $arr2[$i]==$complex))
                        {
                             $flag=1;
                                    
                        }//end of if
                        
                    }//end of for
                    
                    if($flag==0)//inner1 // 1 markers
                        {     
                             $sql="SELECT * FROM question where complexity='$complex' and subject='$question' and sno='$sno' and marks=1 "; // 1 markers
                                    
                                    $res=mysqli_query($conn, $sql); 

                                    //array_push($arr1,$sno);
                                
                                   // echo "<br> sizeof array:".(sizeof($arr1)-1);
                                    //echo "<br>".$arr1[$i]. " ".$arr2[$i];
                                    //array_push($arr2,$complex);
                                    
                                    if (mysqli_num_rows($res)>0 && $count<10) //inner2 // 1 markers
                                    {
                                        echo"<br> value of i:".$i;
                                        $x=mysqli_fetch_assoc($res);
                                        array_push($arr1,$sno);
                                        array_push($arr2,$complex);
                                        echo "<h2>".$x['question']."</h2>";  
                                        echo "<br> complex:".$complex;
                                        echo "<br> sno:".$sno;
                                        echo "<br>";
                                        print_r($arr1);
                                        echo "<br>";
                                        
                                        echo "<br>";
                                        print_r($arr2);
                                        echo "<br>";
                                        
                                        $count+=1;
                                        echo "<br> count:".$count;
                                        
                                    } //end of inner2 if
                                
                            }//end of inner1 if
                              
                }//end of while loop for 1 mark 
                
                $flag=0;
                $count=0; // for no of questions 5 and 10 markers
                $arr1=array(0,0,0); // array to store generated random numbers sno
                $arr2=array(0,0,0); // array to store generated random numbers complexity
                
                $question=$_GET['questions'];
                echo "selected"." ".$_GET['questions']."<br>";
                echo "complexity"." ".$_GET['complexity'];
                echo "<h1>"."10 marks"."</h1>";
                
                while($count!=10)
                {
                    $complex= rand(1,5);
                    $sno= rand(1,5);
                    $markgenerate = rand(1,2); // to select if 5 marker or 10 marker need to implement
                    $flag=0;
                    
                    for($i=0;$i<sizeof($arr1);$i++)   // 1 markers
                    {
                        if(($arr1[$i]==$sno && $arr2[$i]==$complex))
                        {
                             $flag=1;
                                    
                        }//end of if
                        
                    }//end of for
                    
                    if($flag==0)//inner1  5 and 10 markers
                        {     
                             $sql="SELECT * FROM question where complexity='$complex' and subject='$question' and sno='$sno' and marks=10"; // 1 markers
                                    
                                    $res=mysqli_query($conn, $sql); 

                                    //array_push($arr1,$sno);
                                
                                   // echo "<br> sizeof array:".(sizeof($arr1)-1);
                                    //echo "<br>".$arr1[$i]. " ".$arr2[$i];
                                    //array_push($arr2,$complex);
                                    
                                    if (mysqli_num_rows($res)>0 && $count<10) //inner2 // 1 markers
                                    {
                                        echo"<br> value of i:".$i;
                                        $x=mysqli_fetch_assoc($res);
                                        array_push($arr1,$sno);
                                        array_push($arr2,$complex);
                                        echo "<h2>".$x['question']."</h2>";  
                                        echo "<br> complex:".$complex;
                                        echo "<br> sno:".$sno;
                                        echo "<br>";
                                        print_r($arr1);
                                        echo "<br>";
                                        
                                        echo "<br>";
                                        print_r($arr2);
                                        echo "<br>";
                                        
                                        $count+=1;
                                        echo "<br> count:".$count;
                                        
                                    } //end of inner2 if
                                
                            }//end of inner1 if
                              
                }
                
               /* $count=0;
                $flag=0;
                while($count!=1)
                {
                    $complex= rand(1,5);
                    $sno= rand(1,5);
                    $markgenerate = rand(1,2); // to select if 5 marker or 10 marker need to implement
                    $flag=0;
                    
                    for($i=0;$i<sizeof($arr1);$i++)   // 1 markers
                    {
                        if(($arr1[$i]==$sno && $arr2[$i]==$complex))
                        {
                             $flag=1;
                                    
                        }//end of if
                        
                    }//end of for
                    
                    if($flag==0)//inner1  5 and 10 markers
                        {     
                             $sql="SELECT * FROM question where complexity='$complex' and subject='$question' and sno='$sno' and marks=10 and module='$module2' "; // 1 markers
                                    
                                    $res=mysqli_query($conn, $sql); 

                                    //array_push($arr1,$sno);
                                
                                   // echo "<br> sizeof array:".(sizeof($arr1)-1);
                                    //echo "<br>".$arr1[$i]. " ".$arr2[$i];
                                    //array_push($arr2,$complex);
                                    
                                    if (mysqli_num_rows($res)>0 && $count<1) //inner2 // 1 markers
                                    {
                                        echo"<br> value of i:".$i;
                                        $x=mysqli_fetch_assoc($res);
                                        array_push($arr1,$sno);
                                        array_push($arr2,$complex);
                                        echo "<h2>".$x['question']."</h2>";  
                                        echo "<br> complex:".$complex;
                                        echo "<br> sno:".$sno;
                                        echo "<br>";
                                        print_r($arr1);
                                        echo "<br>";
                                        
                                        echo "<br>";
                                        print_r($arr2);
                                        echo "<br>";
                                        
                                        $count+=1;
                                        echo "<br> count:".$count;
                                        
                                    } //end of inner2 if
                                
                            }//end of inner1 if
                              
                }*/
                
               /* $count=0;
                $flag=0;
                while($count!=2)
                {
                    $complex= rand(1,5);
                    $sno= rand(1,5);
                    $markgenerate = rand(1,2); // to select if 5 marker or 10 marker need to implement
                    $flag=0;
                    
                    for($i=0;$i<sizeof($arr1);$i++)   // 1 markers
                    {
                        if(($arr1[$i]==$sno && $arr2[$i]==$complex))
                        {
                             $flag=1;
                                    
                        }//end of if
                        
                    }//end of for
                    
                    if($flag==0)//inner1  5 and 10 markers
                        {     
                             $sql="SELECT * FROM question where complexity='$complex' and subject='$question' and sno='$sno' and marks=10 and module='$module1' "; // 1 markers
                                    
                                    $res=mysqli_query($conn, $sql); 

                                    //array_push($arr1,$sno);
                                
                                   // echo "<br> sizeof array:".(sizeof($arr1)-1);
                                    //echo "<br>".$arr1[$i]. " ".$arr2[$i];
                                    //array_push($arr2,$complex);
                                    
                                    if (mysqli_num_rows($res)>0 && $count<2) //inner2 // 1 markers
                                    {
                                        echo"<br> value of i:".$i;
                                        $x=mysqli_fetch_assoc($res);
                                        array_push($arr1,$sno);
                                        array_push($arr2,$complex);
                                        echo "<h2>".$x['question']."</h2>";  
                                        echo "<br> complex:".$complex;
                                        echo "<br> sno:".$sno;
                                        echo "<br>";
                                        print_r($arr1);
                                        echo "<br>";
                                        
                                        echo "<br>";
                                        print_r($arr2);
                                        echo "<br>";
                                        
                                        $count+=1;
                                        echo "<br> count:".$count;
                                        
                                    } //end of inner2 if
                                
                            }//end of inner1 if
                              
                }*/
                
                /*$count=0;
                $flag=0;
                while($count!=2)
                {
                    $complex= rand(1,5);
                    $sno= rand(1,5);
                    $markgenerate = rand(1,2); // to select if 5 marker or 10 marker need to implement
                    $flag=0;
                    
                    for($i=0;$i<sizeof($arr1);$i++)   // 1 markers
                    {
                        if(($arr1[$i]==$sno && $arr2[$i]==$complex))
                        {
                             $flag=1;
                                    
                        }//end of if
                        
                    }//end of for
                    
                    if($flag==0)//inner1  5 and 10 markers
                        {     
                             $sql="SELECT * FROM question where complexity='$complex' and subject='$question' and sno='$sno' and marks=10 and module='$module2' "; // 1 markers
                                    
                                    $res=mysqli_query($conn, $sql); 

                                    //array_push($arr1,$sno);
                                
                                   // echo "<br> sizeof array:".(sizeof($arr1)-1);
                                    //echo "<br>".$arr1[$i]. " ".$arr2[$i];
                                    //array_push($arr2,$complex);
                                    
                                    if (mysqli_num_rows($res)>0 && $count<2) //inner2 // 1 markers
                                    {
                                        echo"<br> value of i:".$i;
                                        $x=mysqli_fetch_assoc($res);
                                        array_push($arr1,$sno);
                                        array_push($arr2,$complex);
                                        echo "<h2>".$x['question']."</h2>";  
                                        echo "<br> complex:".$complex;
                                        echo "<br> sno:".$sno;
                                        echo "<br>";
                                        print_r($arr1);
                                        echo "<br>";
                                        
                                        echo "<br>";
                                        print_r($arr2);
                                        echo "<br>";
                                        
                                        $count+=1;
                                        echo "<br> count:".$count;
                                        
                                    } //end of inner2 if
                                
                            }//end of inner1 if
                              
                }*/
                
            }//end of if  
             
        }          
    } // end of connection if

    else // if not connect to database
        {
            //user leaved default value for dropdown, tell him that:
            echo "Please select valid value from dropdown list";
        }
?>