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
                if (isset($_POST['jid'])) { #check if user selected any value 
                    include './dbconnection.php'; #establish connection
                    $jidx = $_POST['jid']; # take posted value from the form below
                    $query = "select jid
                              from internshipjobposting
                            where jid = '$jidx';";
                              
                    $result = mysqli_query($conn, $query);# transform querry address into table
                    $num = mysqli_num_rows($result); #return row number of returned table
                    mysqli_close($conn); #close mysql connection      
                    $row = mysqli_fetch_assoc($result);
                    $index = 0; #counter for loop
                    while ($index < $num) {
                        $row = mysqli_fetch_assoc($result); #return rows
                        $jidy = $row["jidc"]; #return column value

                        echo $jidy, "\n", "<br>";  #output
                        $index++;
                    }
                } else {
                    echo "Please choose a jid to show count of applications"; #print if else condition does not activating / when no data is submitted
                }
                ?> 
                <form method="post" action="5-Company.php">  <!-- post values to itself -->
                    <select name ="jid"> <!-- post jid to istself -->
                <?php
                include './dbconnection.php';#establish connection        
                $queryx = "select jid from internshipjobposting ;";  #select jid from internshipjobposting
                $resultx = mysqli_query($conn, $queryx); # transform querry address into table
                $numx = mysqli_num_rows($resultx); #return row number of returned table
                mysqli_close($conn); #close mysql connection
                $indexx = 0; #counter for loop
                while ($indexx < $numx) {
                    $rowx = mysqli_fetch_assoc($resultx); #return rows
                    $jid = $rowx["jid"]; #return column value     
                    echo "<option>", $jid, "\n", "<br>"; # choose jid
                    $indexx++;
                }
                ?>
                    </select>
                    <input type="submit" value="Apply"></input>  <!-- submit button-->
                </form>

                <P>
                    <a href="Company.php">Previous Page</a>  <!-- Back to previous page link-->
                    </select>


                    </body>
                    </html>

