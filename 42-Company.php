
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
    if(isset($_POST['username'])){ #check if user selected any value 
        include './dbconnection.php'; #establish connection
        $usernamex = $_POST['username']; # take posted value from the form below
        $query= " select username
                   from eu_employer as e
                    where e.beginDate = (select min(beginDate) from eu_employer);";
        $result=mysqli_query($conn,$query);  # transform querry address into table
        $num= mysqli_num_rows($result);  #return row number of returned table
        mysqli_close($conn); #close mysql connection
        $index=0; #counter for loop
        while ($index < $num) {
        $row = mysqli_fetch_assoc($result);  #return rows
        $namex= $row["username"];  #return column value

        echo $namex," ", "\n", "<br>";  #output
        $index++;
        }    
    }
        else {
            echo "Please choose a username "; #print if else condition does not activating / when no data is submitted
        }
            
        ?> 
                <form method="post" action="42-Company.php">  <!-- post values to itself -->
                    <select name ="username"> <!-- post username to istself -->
                        <?php
        include './dbconnection.php'; #establish connection        
        $queryx="select username from eu_employer ;";  #select username from eu_employer
        $resultx=mysqli_query($conn,$queryx); # transform querry address into table
        $numx= mysqli_num_rows($resultx); #return row number of returned table
        mysqli_close($conn);#close mysql connection
        $indexx=0;#counter for loop
        while ($indexx < $numx) {
        $rowx = mysqli_fetch_assoc($resultx); #return rows
        $username= $rowx["username"];  #return column value     
        echo "<option>",$username, "\n", "<br>"; # choose username
        $indexx++;
        }
        ?>
                    </select>
        <input type="submit" value="Apply"></input>              <!-- submit button-->
                </form>
                
                <P>
            <a href="4-Company.php">Previous Page</a>  <!-- Back to previous page link-->
                             </select>


</body>
</html>

