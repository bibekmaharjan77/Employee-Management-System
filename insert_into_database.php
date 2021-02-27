<?php 
require_once('include/db.php');

if(isset($_POST['Submit'])){
    if(!empty($_POST['Ename']) && !empty($_POST['BAN'])){
        $Ename=$_POST['Ename'];
        $Dept=$_POST['Dept'];
        $Contact=$_POST['Contact'];
        $BAN=$_POST['BAN'];
        $Salary=$_POST['Salary'];
        $HomeAddress=$_POST['HomeAddress'];
        $connecting_db;

        // here using PDO named parameters to prevent sql injection
        //mysqli ma vako vaye real_escape_string() vanne function use gare hunthyo
        //but since it is PDO approach, we have to use PDO named parameters
        //here :dummyename... are dummy data

        $sql="INSERT INTO emp_record(ename,dept,contact,ban,salary,homeaddress) 
                VALUES (:dummyename,:dummydept,:dummycontact,:dummyban,:dummysalary,:dummyaddress)";
        
        $stmt=$connecting_db->prepare($sql);
        $stmt->bindValue(':dummyename',$Ename);
        $stmt->bindValue(':dummydept',$Dept);
        $stmt->bindValue(':dummycontact',$Contact);
        $stmt->bindValue(':dummyban',$BAN);
        $stmt->bindValue(':dummysalary',$Salary);
        $stmt->bindValue(':dummyaddress',$HomeAddress);
        $execute=$stmt->execute();
        if($execute){
            //echo '<span class="success"> Record has been added successfully! </span>';

            echo '<script> window.open("index.php?id2=Record Added Successfully","_self") </script>';
        }

    }
    else{
        echo '<span class="FieldInfoHeading">Please atleast fill up Employee name and Bank account Number </span>';
    }
}

if(isset($_POST['back'])){
   header('location:index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Into Database</title>
    <link rel="stylesheet" href="include/style.css">


</head>
<body>
    <div class="">
        <!-- / matra diyo vane pani index.php mnai linxa -->
        <form action="insert_into_database.php" method="post">
            <fieldset>
                <span class="FieldInfo"> Employee Name:</span>
                <br>
                <input type="text" name="Ename" value="">
                <br>
                <span class="FieldInfo"> Department:</span>
                <br>
                <input type="text" name="Dept" value="">
                <br>
                <span class="FieldInfo"> Contact:</span>
                <br>
                <input type="text" name="Contact" value="">
                <br>
                <span class="FieldInfo"> Bank Account Number:</span>
                <br>
                <input type="text" name="BAN" value="">
                <br>
                
                <span class="FieldInfo"> Salary:</span>
                <br>
                <input type="text" name="Salary" value="">
                <br>
                <span class="FieldInfo"> Home Address:</span>
                <br>
                <textarea name="HomeAddress" id="" cols="30" rows="10"></textarea>
                <br>
                <input type="submit" name="Submit"  value="Submit your record ">
                <input type="submit" name="back"  value="back" style="margin-left: 70px;">
            </fieldset>
        </form>
    </div>
</body>
</html>