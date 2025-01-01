<?php
if(isset($_POST['addlap']) ){
    require_once('connection.php');
   echo "<prev>";
   print_r($_FILES['image']);
   echo "</prev>";
   $img_name= $_FILES['image']['name'];
   $tmp_name= $_FILES['image']['tmp_name'];
   $error= $_FILES['image']['error'];
    if($error === 0){
        $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc= strtolower($img_ex);
        $allowed_exs = array("jpg","jpeg","png","webp","svg");
        if(in_array($img_ex_lc,$allowed_exs)){
            $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path='images/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
                $lapname=mysqli_real_escape_string($con,$_POST['lapname']);
                $company=mysqli_real_escape_string($con,$_POST['company']);
                $ram=mysqli_real_escape_string($con,$_POST['ram']);
                $processor=mysqli_real_escape_string($con,$_POST['processor']);
                $price=mysqli_real_escape_string($con,$_POST['price']);
                $available="Y";
                $query="INSERT INTO laptops(LAP_NAME,COMPANY,RAM,PRICE,LAP_IMG,AVAILABLE,processor) values('$lapname','$company',$ram,$price,'$new_img_name','$available','$processor')";
                $res=mysqli_query($con,$query);
                if($res){
                    echo '<script>alert("New Laptop Added Successfully!!")</script>';
                    echo '<script> window.location.href = "adminlaptop.php";</script>';                }
        }else{
            echo '<script>alert("Cant upload this type of image")</script>';
            echo '<script> window.location.href = "addlap.php";</script>';   
        }
    }
    else{
        $em="unknown error occured";
        header("Location: addlap.php?error=$em");
    }
}
else{
    echo "false";
}



?>
