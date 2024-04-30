<?php
    $country_id=$_POST['countryId'];
    $Sql="SELECT * FROM city where Country_id = '".$country_id."' ";

    $result=mysqli_query($conn,$Sql);


    while($data=mysqli_fetch_all($result)){
        ?>
        <option value=""><?php echo $data['name']?></option>
    <?php
    }

?>