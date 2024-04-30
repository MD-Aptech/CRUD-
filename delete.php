

<?php



    include "connection.php";

    if(isset($_GET['Student_id']))
    {
        $St_id=$_GET['Student_id'];

        $Query="DELETE FROM student WHERE id= '".$St_id."'   " ;


        $Result =mysqli_query($conn,$Query);
        if(isset($Result)){
            header("location:showstudent.php");
        }

    };

?>