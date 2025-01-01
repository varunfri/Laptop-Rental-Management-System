<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link  rel="stylesheet" href="css/logo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    
</head>

<body class="body">

<style>
    html{
        scroll-behavior:smooth;
    }
 
    *{
        margin: 0;
        padding: 0;

    }

    body{
        background: url("images/lapbg.jpg") fixed;
        width: 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 100vh;
    }

    .navbar{
        width: 1200px;
        height: 75px;
        margin: auto;
    }

    .icon{
        width:200px;
        float: left;
        height : 70px;
    }

    

    ul{
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    ul li{
        list-style: none;
        margin-left: 40px;
        margin-top: 27px;
        font-size: 14px;

    }

    ul li a{
        text-decoration: none;
        color: black;
        font-family: Arial;
        font-weight: bold;
        transition: 0.4s ease-in-out;

    }

    ul li a:hover{
        color:#7f95b2;

    }
    .box{
        margin-bottom:30px;
        position:center;
        top: 50%;
        left: 50%;
        padding: 20px;
        box-sizing: border-box;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,.5);
        background: linear-gradient(to top, rgba(255, 251, 251, 0.8)50%,rgba(250, 246, 246, 0.8)50%);
        display: flex;
        align-content: center;
        width: auto;
        height: 220px;
        transition: transform 0.2s ease;
        cursor:pointer;
        margin-top: 80px;
        margin-left: 600px;
    }
    .box:hover {
            transform: translateY(-5px);
        }
    .box .imgBx{
        width: 180px;
        flex:0 0 150px;
    }

    .box .imgBx img{
        max-width:140%;
    }

    .box .content{
        padding-left: 150px;
        height: 100px;
    }

    .box .button{
        width: 150px;
        height: 50px;
        background: #ff7200;
        border:none;
        margin-top: 30px;
        /* margin-left: 100; */
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color:#fff;
        transition: 0.4s ease;
    }

    .utton{
        width: 240px;
        height: 40px;
    
        background: #ff7200;
        border:none;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color:#fff;
        transition: 0.4s ease;
    }
 
    .de{
        float: left;
        clear: left;
        display: block;

    }


    .de li a:hover{
        color:black;

    }
    .de .lis:hover{
        color: white;
    }


    .nn{
        width:100px;
        /* background: #ff7200; */
        border:none;
        height: 40px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color:white;
        transition: 0.4s ease;

    }


    .nn a{
        text-decoration: none;
        color: black;
        font-weight: bold;
        
    }

    .overview{
        text-align: center;
        margin-top: 40px;
        margin-left:400px;
        width:450px;
        border-radius:10px;
        background: linear-gradient(to top, rgb(255 255 255 / 60%) 50%,rgb(255 255 255 / 60%) 50%);
    }

    .circle{
        border-radius:48%;
        width:65px;
    }

   
    .phello{ 
         
        width:180px;
        margin-left: 0px;
        padding: 0px;
    }

    #stat{
        margin-left: -8px;
    }
    
    
    .modals {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            }
   
       

</style>

<?php 
    require_once('connection.php');
        session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $uname = $rows['FNAME']." ".$rows['LNAME'];
    $sql2="select *from laptops where AVAILABLE='Y'";
    $laptops= mysqli_query($con,$sql2);


    ?>

 
  <div class="cd">
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">RentNRun</h2>
            </div>
            <div class="menu">
               
                <ul>
                    <li><button
                    style="border:none;width:100px;height:40px;border-radius:10px;"
                    ><a href="lapdetails.php">HOME</a></button></li>
                    <li><button
                        style="border:none;width:110px;height:40px;border-radius:10px;"
                    ><a href="service.php">SERVICES</a></button></li>                 
                    <li><button
                    style="border:none;width:100px;height:40px;border-radius:10px;"
                    ><a id="stat" href="bookinstatus.php">STATUS</a></button>
                    </li>
                    <li><img src="images/profile.png" class="circle" alt="Alps"></li>
                     <li><button style="border:none;height:50px;border-radius:10px;">
                        <p class="phello" >HELLO! &nbsp;
                        <a id="pname"><?php echo $uname ?></button></a>
                        </p>  
                    </li>
                    <li><button class="nn"><a href="index.php">LOGOUT</a></button></li>
                </ul>
            </div>
            
            
        </div>
      <div><h1 class="overview">OUR LAPTOPS OVERVIEW</h1>

    <ul class="de">
    <?php
        while($result= mysqli_fetch_array($laptops))
        {
            $lap_image = $result['LAP_IMG'];
            $lap_name =  $result['LAP_NAME'];
            //echo $result['LAP_ID'];
            //echo $result['AVAILABLE'];
        
    ?>    
    
    <li>
    <form method="POST">
    <div class="box">
       <div class="imgBx" onclick="showDetails('<?php echo $lap_name;?>','<?php echo $lap_image ;?>')">
            <img src="images/<?php echo $result['LAP_IMG']?>">
        </div>
        <div class="content">
            <?php $res=$result['LAP_ID'];?>
            <h1><?php echo $result['LAP_NAME']?></h1>
            <h2>COMPANY : <a><?php echo $result['COMPANY']?></a> </h2>
            <h2>RAM SIZE : <a><?php echo $result['RAM']?></a> </h2>
             <h2>PROCESSOR : <a><?php echo $result['processor']?></a> </h2>
            <h2>Rent Per Day : <a>₹<?php echo $result['PRICE']?>/-</a></h2>

            <button type="submit"  name="booknow" class="button" style="margin-top: 5px;"><a href="booking.php?id=<?php echo $res;?>">book</a></button>
        </div>
    </div></form></li>
    <?php
        }
    
    ?>
    <?php 
    require_once('connection.php');
        

    $value = $_SESSION['email'];
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    ?>
    </ul>
    </div>
  </div>
  </div>     

  <!-- Modal for displaying detailed laptop information -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modal-content"></div>
    </div>
</div>
</body>
<script>
    
       function showDetails(lap_name,lap_image) {
         
        // You can customize this function to fetch more details via AJAX if needed
        var modals = document.getElementById('modal');
        var modalsContent = document.getElementById('modal-content');
        modals.style.display = "block";
        modalsContent.innerHTML = `
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
         }

        .modal-content {
            background-color: #c6c6c69e;
            margin:8% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
            position: relative;
        } 
        .imgs{
            height:100%;
            width:100%;
        }

        .close {
            position: absolute;
            right: 25px;
            top: 17px;
            color: black;
            font-size: 38px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: red;
            text-decoration: none;
            cursor: pointer;
        }

        .h1{
        text-align:center;
        border-radius: 10px;
        margin-left:auto;margin-right:auto;
        width:auto; height:auto;
        background:linear-gradient(to top, rgb(255 255 255 / 90%) 50%,rgb(255 255 255 / 90%) 50%)
        }
    </style>
            <h1 class="h1">${lap_name}</h1>
            </br>   
            <div >
            <center> 
            <img class="imgs" src="images/${lap_image}" >
            </center>
            </div> 
            
        `;
    }

    

     // Function to close modal
     function closeModal() {
        var modal = document.getElementById('modal');
        if (modal) {
            modal.style.display = "none";
        } else {
            console.error('Modal not found.');
        }
    }
    document.addEventListener('keydown', function(event) {
                if (event.key === "Escape") {
                    closeModal();
                }
            });

    // Event listener to close modal when clicking outside of it
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modal');
        if (event.target == modal) {
            closeModal();
        }
    });
</script>
</html>