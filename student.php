<?php
    include "connection.php";
    include "starter.php";

    
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
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
    <style>
        .form
        {
            display:flex;
            justify-content :center;
            height:100vh;
        };
        #border
        {

            width: 600px;
            height: 500px;
            border: 2px solid black;
            padding-left:20px;
            padding-right:8px;

        }
    </style>
    <body>
    <div class="form">
    <form id="border" class="my-3 mx-5"  action="" method="post" enctype="multipart/form-data">
    <div class="inputname mt-3">
        <label for="">Enter Name</label>
        <input type="text" name="Student_name" id="" class="form-control" placeholder="Enter Name">
    </div>
    <div class="inputAge mt-3">
        <label for="">Enter Age</label>
        <input type="number" name="Student_nameAge" id="" class="form-control" placeholder="Enter Age">
    </div>
    <div class="inputimage mt-3">
        <input type="file" name="Student_nameImg" id="" class="form-control">
    </div>
    <div class="inputrollNo mt-3">
        <label for="">Enter Roll No</label>
    <input type="number" name="Student_nameRollNo" id="" class="form-control" placeholder="Enter Roll No">
    </div>
    <div class="country mt-2">
        <select class="form-control" name="country" id="country" onchange="getCity(this.value)">
            <option value="">Select Country</option>
            <?php
                $Q="SELECT * FROM `country` ";
                $Result=mysqli_query($conn,$Q);
                while($ShowCountry=mysqli_fetch_array($Result)){
                    ?>
                    <option value="<?php echo $ShowCountry['id']?>"><?php echo $ShowCountry['name']?></option>
                <?php
                }
            ?>
        </select>
    </div>
    <div class="city">
        <select class="form-control mt-2" name="cityid" id="cityid">
            <option value="">Select City</option>
        </select>
    </div>
    <button name="sumbit" class="btn btn-success mt-3">Sumbit </button>
    </form>
    </div>
    <?php
        if(isset($_POST['sumbit']))
        {
           $StudentName=$_POST['Student_name'];
           $StudentAge=$_POST['Student_nameAge'];
           //Img
           $StudentImg =$_FILES['Student_nameImg']['name'];          
           $StudentImg_tmpname =$_FILES['Student_nameImg']['tmp_name'] ;
           $location="images/";
           $saveImg=$location.$StudentImg;       
           move_uploaded_file($StudentImg_tmpname,$saveImg);
           $StudentRollNo=$_POST['Student_nameRollNo'];
           //Country_id
          $Student_Country_id=$_POST['country'];
           ///City_id
          $Student_City_id=$_POST['city'];


         $Query="INSERT INTO student(`name`,age,`img`,Rollnumber,Country_id,City_id)values( '".$StudentName."','".$StudentAge."','".$saveImg."' ,'".$StudentRollNo."','".$Student_Country_id."' ,'".$Student_City_id."' )";
        //   $Query="INSERT INTO student(`name`,age,`img`,RollNumber)values( '".$StudentName."','".$StudentAge."','".$saveImg."' ,'".$StudentRollNo."')";

            $sql=mysqli_query($conn,$Query);
            
            if($sql){
                echo "Insert";      
            }
        }
        
    ?>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function getCity()
    {
      var country_id= $("#country option:selected").attr('value');
        console.log(country_id)
    $.ajax({
        url:"student.php",
        type:"POST",
        data:"countryId="+country_id,
        cache:false,
        success:function(html)
        {
            $("#cityid").html(html);
        }
    
    })

    }
</script>
    <?php
    $country_id=$_POST['countryId'];
    $Sql="SELECT * FROM city where Country_id =  '".$country_id."' ";

    $result=mysqli_query($conn,$Sql);


    while($data=mysqli_fetch_array($result)){
        ?>
    <option value=""><?php echo $data['name']?></option>
    <?php
    }

?>


</body>
</html>
