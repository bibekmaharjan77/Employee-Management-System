<?php 
require_once('include/db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View From Database Database</title>
    <link rel="stylesheet" href="include/style.css">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->


</head>
<body>
        <!-- js bata farkako id ko value print garauxa heading ma yasle  -->
        <h2 class="success"><?php echo @$_GET['id']; ?> </h2>
        <h2 class="success"><?php echo @$_GET['id2']; ?> </h2>

        <div>
            <fieldset>
                <form action="index.php" method="GET">
                    <input type="text" name="Search" value="" placeholder="Search by name" style="margin-bottom: 10px;">
                    <input type="submit" name="SearchButton" value="Search record" style="margin-right:70px;">

                    <input type="submit" name="AddButton" value="Add record">
                </form>
            </fieldset>
        </div>

        <!-- php code for add thichyo vane  -->
        <?php 
        if(isset($_GET['AddButton'])){
            header('location:insert_into_database.php');
        }
        ?>

        <!-- php code for search button thichyo vane  -->
        <?php 
        if(isset($_GET['SearchButton'])){
            $connecting_db;
            $Search=$_GET['Search'];
            $sql="SELECT * FROM emp_record WHERE ename=:dummyename";
            $stmt=$connecting_db->prepare($sql);
            $stmt->bindValue(':dummyename',$Search);
            $stmt->execute();

            while($data=$stmt->fetch()){
                $id=        $data['id'];
                $ename=     $data['ename'];
                $dept=      $data['dept'];
                $contact=   $data['contact'];
                $ban=       $data['ban'];
                $salary=    $data['salary'];
                $homeaddress=$data['homeaddress'];  
        ?>

        <table class="view_table" width="80%" border="5" style="margin-top: 30px;">
            <caption><h3>Search Result</h3></caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Contact</th>
                <th>Bank Account No.</th>
                <th>Salary</th>
                <th>Home Address</th>
                <th>Search again</th>
            </tr>
            <tr>
                <td> <?php echo $id; ?> </td>
                <td> <?php echo $ename; ?> </td>
                <td> <?php echo $dept; ?> </td>
                <td> <?php echo $contact; ?> </td>
                <td> <?php echo $ban; ?> </td>
                <td> <?php echo $salary; ?> </td>
                <td> <?php echo $homeaddress; ?> </td>
                <td> <a style="text-decoration: none" href="index.php">Search Again</a> </td>
            </tr>
        </table>
        
        <?php

            } //end of while loop

        } //ending of submit "search button"
        ?>

        <table class="view_table" width="80%" border="5" style="margin-top: 30px;">
            <caption> <h3>View From Database</h3></caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Contact</th>
                <th>Bank Account No.</th>
                <th>Salary</th>
                <th>Home Address</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php 
                $connecting_db;
                $sql="SELECT * FROM emp_record";
                $stmt=$connecting_db->query($sql);
                while($data=$stmt->fetch()){
                    $id=$data["id"];
                    $name=$data["ename"];
                    $dept=$data["dept"];
                    $contact=$data["contact"];
                    $ban=$data["ban"];
                    $salary=$data["salary"];
                    $homeaddress=$data["homeaddress"];
                
            ?>

            <tr>
                <td> <?php echo $id; ?> </td>
                <td> <?php echo $name; ?> </td>
                <td> <?php echo $dept; ?> </td>
                <td> <?php echo $contact; ?> </td>
                <td> <?php echo $ban; ?> </td>
                <td> <?php echo $salary; ?> </td>
                <td> <?php echo $homeaddress; ?> </td>
                <td> <a style="text-decoration: none" href="update.php?id=<?php echo $id ?>">Update</a> </td>
                <td> <a style="text-decoration: none" href="delete.php?id=<?php echo $id ?>">Delete</a> </td>
            </tr>
            <?php } ?> 
        </table>
    
</body>
</html>