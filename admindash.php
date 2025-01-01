<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link  rel="stylesheet" href="css/logo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
</head>
<body background=images/adminbg1.jpg>
<style>
        button
        {
        margin-top:10px;
        border:1px solid #000;width:120px;height:40px;border-radius:10px;
        }

        *{
            margin: 0;
            padding: 0;

        }
        body{
            width: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;
        }
        .hai{
            width: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%),url("C:/xampp/htdocs/laptop/images/lapbg.jpg");
            background-position: center;
            background-size: cover;
            height: 109vh;
            animation: infiniteScrollBg 50s linear infinite;
        }
        .main{
            width: 100%;
            /* background: linear-gradient(to top, rgba(0,0,0,0)50%, rgba(0,0,0,0)50%); */
            background-position: center;
            background-size: cover;
            height: 109vh;
            animation: infiniteScrollBg 50s linear infinite;
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

        .menu{
            width: 400px;
            float: left;
            height: 70px;

        }

        ul{
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        ul li{
            list-style: none;
            margin-left: 62px;
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

        .content-table{
        border-collapse: collapse;
            
            font-size: 0.9em;
        
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow:0 0  20px rgba(0,0,0,0.15);
            margin-left : 350px ;
            margin-top: 25px;
            width: 800px;
            height: 500px;
        }
        .content-table thead tr{
            background-color: orange;
            color: white;
            text-align: left;
        }

        .content-table th,
        .content-table td{
            padding: 12px 15px;


        }

        .content-table tbody tr{
            border-bottom: 1px solid #dddddd;
        }
        .content-table tbody tr:nth-of-type(even){
            background-color: #f3f3f3;

        }
        .content-table tbody tr:last-of-type{
            border-bottom: 2px solid orange;
        }

        .content-table thead .active-row{
            font-weight:  bold;
            color: orange;
        }


        .header{
            margin-top: 700px;
            margin-left: 650px;
        }

        .header-center{
            margin-top: 250px;
            font-size: 50px;
            color: white;
            text-align:center;
        }

        .nn{
            width:100px;
            background: #ff7200;
            border:none;
            height: 40px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color:white;
            transition: 0.4s ease;

        }
        .nn .hover{
            background: #ffffff;
        }


        .nn a{
            text-decoration: none;
            color: black;
            font-weight: bold;
            
        }
</style>

<?php
//database connection
require_once('connection.php');
$query="select *from feedback";
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


?>

    <div class="hai">
        <div class="navbar">
        <a href="admindash.php"> 
            <div class="icon">
            <h2 class="logo">RentNRun</h2>
            </div></a>
            <div class="menu">
                <ul>
                    <li><button><a href="adminlaptop.php">LAPTOPS</a></button></li>      
                    <li><button><a href="adminusers.php">USERS</a></button></li>                    
                    <li><button><a href="adminbook.php">REQUESTS</a></button></li>
                    <li><button><a href="ser_request.php">SERVICES</a></button></li>    
                  <li> <button class="nn"><a href="index.php">LOGOUT</a></button></li>
                </ul>
            </div> 
            
        </div>
        <h1 class="header-center">Welcome to Admin Dashboard</h1>

</div>

</body>
</html>