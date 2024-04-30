<?php
    include "connection.php";
    include "starter.php";
?>
<?php
$Query= "SELECT * FROM country ";
$Que= "SELECT * FROM city ";
$resu=mysqli_query($conn,$Que);
$result =mysqli_query($conn,$Query);


?>


<?php
    if(isset($_GET['Stu_Id']))
    {
        $Query="SELECT * FROM student where id =  '".$_GET['Stu_Id']."' ";


        $Result=mysqli_query($conn,$Query);

        $data=mysqli_fetch_array($Result);
    }

?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
       <link rel="stylesheet" href="./bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.css">
    
    </head>
    <style>
        a{
            color:white;
        }
      
    </style>
    <body>
       
            <form action="" method="POST" enctype="multipart/form-data" class="from-control px-4 py-4 bg-white  mt-5 mx-5">
                <div class="mb-3 my-2">
                    <label for="">Enter Name</label>
                    <input  class="form-control"  value=" <?php echo $data['name'] ?>"  type="text" name="UserName" id="" placeholder="Name">
                </div>
                <div class="mb-3 my-2">
                    <label for="">Age</label>
                    <input  class="form-control" value="<?php echo $data['Age'] ?>" type="text" name="UserEmail" id="" placeholder="name@email.com">
                </div>
                
                
                <div class="mb-3 my-2">
                    <div class="image_box">
                    <img  src="<?php print $data['Img']?>" width="50px" height="50px" alt="">
                    <input name="UploadImage" type="file" class="btn btn-success" name="" id="">    
                </div>
                <div class="mb-3 my-2">
                    <label for="">Roll Number</label>
                    <input  class="form-control" type="text" value="<?php  echo $data['RollNumber'] ?>" name="UserPhno" id="" placeholder="+92 123456789">
                </div>
            </div>
            <div class="selectcountry my-3">
                <select name="" id="" class="form-control">
                    <?php
                        while($data=mysqli_fetch_array($result))
                    {
                    ?>
                    <option value=""><?php echo $data['name'] ?></option>
                  <?php  
                }
                ?>
                    </select>
            </div>            
            <div class="selectcity my-3 ">
                <select name="" id="" class="form-control">
                    <?php
                        while($data=mysqli_fetch_array($resu))
                    {
                    ?>
                    <option value=""><?php echo $data['CityKaNaam'] ?></option>
                  <?php  
                }
                ?>
                    </select>
            </div>            
                <div class="class">
                    <button name="update" class="btn btn-success">Update</button>
                    </div>
                    <button class="btn btn-success text-decoration-none my-3"><a id="next-page-anchor" class="text-decoration-none " href="show.php">Next Page</a></button>
            </form>
           <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
<?php
            
            if(isset($_POST['update'])){
                $UserKaNaam =$_POST['UserName'];
                $UserKiEmail =$_POST['UserEmail'];
                $UserKaNo =$_POST['UserPhno'];
                //  echo $UserKaNaam;
                //  echo "<br>";
                //  print $UserKiEmail;
                //  echo "<br>";
                //  print $UserKaNo;
            
                $FileType=$_FILES['UploadImage']['name'];
                 $Tmp_Name =$_FILES['UploadImage']['tmp_name'];
                 $Location ="images/";
                 $SaveImage=$Location.$FileType;
                 move_uploaded_file($Tmp_Name,$SaveImage);
                 
      
                $Query="UPDATE `student` SET `Student_Name`='".$UserKaNaam."',`Student_Email`='".$UserKiEmail."',`Student_PhNo`='".$UserKaNo."',`User_Image`='".$SaveImage."' WHERE id=  '".$_GET['Stu_Id']."' ";
                 $Result = mysqli_query($Connection,$Query);

                 if($Result)
                {
                    header("location:show.php");
                }
             
                
               }
            ?>
       
