<?php 
require_once('include/db.php');
$search_query_parameter=$_GET['id'];

if(isset($_POST['Submit'])){
    
        $Ename=$_POST['Ename'];
        $Dept=$_POST['Dept'];
        $Contact=$_POST['Contact'];
        $BAN=$_POST['BAN'];
        $Salary=$_POST['Salary'];
        $HomeAddress=$_POST['HomeAddress'];
        $connecting_db;

        //copy pasted from insert_into_database

        $sql="DELETE FROM emp_record WHERE id='$search_query_parameter'";
        
        $execute=$connecting_db->query($sql);

        if($execute){
        //     //using js to send the user back to view wala table ko location
        echo '<script> window.open("index.php?id=Record Deleted Successfully","_self") </script>';


        //  echo '<span class="success"> Record has been Updated successfully! </span>';
        // header('location:index.php');
         }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Into Database</title>
    <link rel="stylesheet" href="include/style.css">


</head>
<body>
    <?php 
        $connecting_db;
        $sql="SELECT * FROM emp_record WHERE id='$search_query_parameter'";
        $stmt=$connecting_db->query($sql);
        while($data=$stmt->fetch()){
            $id=$data["id"];
            $dept=$data["dept"];
            $name=$data["ename"];
            $contact=$data["contact"];
            $ban=$data["ban"];
            $salary=$data["salary"];
            $homeaddress=$data["homeaddress"];
        }
    ?>
    <div class="">
        <form action="delete.php?id=<?php echo $search_query_parameter; ?>" method="post">
            <fieldset>
                <span class="FieldInfo"> Employee Name:</span>
                <br>
                <input type="text" name="Ename" value="<?php echo $name; ?>">
                <br>
                <span class="FieldInfo"> Department:</span>
                <br>
                <input type="text" name="Dept" value="<?php echo $dept; ?>">
                <br>
                <span class="FieldInfo"> Contact:</span>
                <br>
                <input type="text" name="Contact" value="<?php echo $contact; ?>">
                <br>
                <span class="FieldInfo"> Bank Account Number:</span>
                <br>
                <input type="text" name="BAN" value="<?php echo $ban; ?>">
                <br>
                
                <span class="FieldInfo"> Salary:</span>
                <br>
                <input type="text" name="Salary" value="<?php echo $salary; ?>">
                <br>
                <span class="FieldInfo"> Home Address:</span>
                <br>
                <textarea name="HomeAddress" id="" cols="30" rows="10"><?php echo $homeaddress; ?></textarea>
                <br>
                <input type="submit" name="Submit"  value="Delete your record ">
            </fieldset>
        </form>
    </div>
</body>
</html>