
<?php
    include "starter.php";
    include "connection.php";
?>
<?php
    $Query= "SELECT * FROM student";

    $result =mysqli_query($conn,$Query);
    $Qu =  "SELECT * from country ";
    
    $resu =mysqli_query($conn,$Qu);
    
    $Que =  "SELECT * from city ";
    $res =mysqli_query($conn,$Que);

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
        <link rel="stylesheet" href="./style.css">
    </head>
        <style>
            a{
                color:white;
            }
            #myBtn:hover
            {
                background-color:#C6452A;
            }
            #myBtn
            {
                background-color:blue;
            }
            #delete-anchor
            {
                color:white;
            }
           #edit-anchor
           {
            color:white;
           }
           #my-btn-edit
           {
            background-color:blue;
           }
           #my-btn-edit:hover
           {
            background-color:Green;
           }
           #perivous-page-btn:hover
           {
            color:white;
           }

        
        </style>
    <body>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Image</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Country</th>
      <th scope="col">City</th>
      <th> </th>
      <th></th>
    </tr>
  </thead>
<?php
    while($data=mysqli_fetch_array($result)){
        ?>
        <tbody>
    <tr>
      <th scope="row"><?php print $data['id']?></th>
      <td><?php print $data['name']?></td>
      <td><?php print $data['Age']?></td>
      <td><img  src="<?php print $data['Img']?>" width="50px" height="50px" alt=""></td>
      <td><?php print $data['RollNumber']?></td>
      
      <?php
        ($showCountry=mysqli_fetch_array($resu))
        ?>
            <td><?php print_r($showCountry['name']) ?></td>
            <?php
            ($showCity=mysqli_fetch_array($res))
            ?>
            <td><?php print $showCity['CityKaNaam']?></td>
            <td><button id="Btn_class_delete"  class=" btn btn-success"><a id="delete-anchor" href="delete.php?Student_id=<?php print $data['id']?>" class="text-decoration-none ">Delete</a></button></td>
            <td><button id="Btn_class_edit" class="btn btn-success"><a id="edit-anchor" class="text-decoration-none" href="update.php?Stu_Id=<?php echo $data['id'] ?>">Edit</a></button></td>
    </tr>
  </tbody>
    <?php
    }
    ?>
</table>
        <!-- Bootstrap JavaScript Libraries -->
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
