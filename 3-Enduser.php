<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
</head>
<body style="text-align:center;">
    <h4> Welcome <h4>
            <h4>
                
   <?php    
    if(isset($_POST['salary'])){  # check if user selected any value 
        include './dbconnection.php'; ##establish connection
        $Jsalary = $_POST['salary']; # take posted value from the form below
        $query= " select j.comp_cid
                  from job_posting as j
                   where j.salary = (select max(salary) from job_posting);";
        $result=mysqli_query($conn,$query);   # transform querry address into table
        $num= mysqli_num_rows($result);   #return row number of returned table
        mysqli_close($conn);  #close mysql connection
        $index=0; ##counter for loop
        while ($index < $num) {
        $row = mysqli_fetch_assoc($result);  #return rows
        $Cname= $row["name"];   #return column value
        
        echo $Cname," ", "\n", "<br>";  #output
        $index++;
        }    
    }
        else {
            echo "Please choose a salary"; #print if else condition does not activating / when no data is submitted
        }
            
        ?> 
                <form method="post" action="3-Enduser.php">  <!-- post values to itself -->
                    <select name ="salary"> <!-- post salary to istself -->
                        <?php
        include './dbconnection.php'; #establish connection        
        $queryx="select salary from job_posting ;";  #select salary from job_posting
        $resultx=mysqli_query($conn,$queryx); # transform querry address into table
        $numx= mysqli_num_rows($resultx); #return row number of returned table
        mysqli_close($conn);#close mysql connection
        $indexx=0;#counter for loop
        while ($indexx < $numx) {
        $rowx = mysqli_fetch_assoc($resultx); #return rows
        $salary= $rowx["salary"];  #return column value     
        echo "<option>",$salary, "\n", "<br>"; # choose salary
        $indexx++;
        }
        ?>
                    </select>
        <input type="submit" value="Apply"></input>              <!-- submit button-->
                </form>
                
                <P>
            <a href="Enduser.php">Previous Page</a>  <!-- Back to previous page link-->
                             </select>


</body>
</html>


