<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url("images/lapbg1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            overflow: hidden;
        }
        .home-btn {
            position: absolute;
            top: 20px;
            font-size:20px;
            left: 20px;
            background-color: #ff7200;
            color: black;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        /* Alert Box Styles */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 16px;
            transition: opacity 0.3s ease;
        }

            .alert-success {
                background-color: #d4edda;
                border-color: #c3e6cb;
                color: #155724;
            }

            .alert-error {
                background-color: #f8d7da;
                border-color: #f5c6cb;
                color: #721c24;
            }


        .blur-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            filter: blur(20px);
            z-index: -1;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form {
            width: 300px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
        }

        .form h2 {
            text-align: center;
            color: black;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .form input[type="text"],
        .form input[type="email"],
        .form textarea,
        .form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #ff7200;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .form input[type="submit"]:hover {
            background-color: #ff9f1a;
        }
    </style>
</head>
<?php 
    require_once('connection.php');
        session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $sql2="select *from laptops where AVAILABLE='Y'";
    $laptops= mysqli_query($con,$sql2);
    $uname = $rows['FNAME']." ". $rows['LNAME'];
    $uemail = $rows['EMAIL'];
    

?>
<?php    require 'config.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './vendor/autoload.php';
    require_once('connection.php');

    $user_id = $_SESSION['email'];
    $sql="select * from users where EMAIL='$user_id'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $name = htmlspecialchars($user['name']);
        $email = htmlspecialchars($user['email']);
    } else {
        // Handle case where user data is not found
        $name = '';
        $email = '';
    }
    // Handle form submission
    if (isset($_POST['submit'])) {
        // Sanitize and validate form inputs
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $category = mysqli_real_escape_string($con, $_POST['category']);
        $req_type = mysqli_real_escape_string($con, $_POST['requestType']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
        $req_date = Date('Y-m-d');
        // Validate required fields
        if (empty($category) || empty($req_type) || empty($message)) {
            echo '<script>alert("Please fill in all fields.")</script>';
        } else {
            // Insert into service table
            $sql = "INSERT INTO service (name, email, category, req_type, message,req_date) 
                    VALUES ('$uname', '$uemail', '$category', '$req_type', '$message', '$req_date')";

            if (mysqli_query($con, $sql)) {
                // Optionally, redirect to a confirmation page
                send_mail($uemail, $uname, $category, $req_type, $message);
                echo '<script>  alert("Service Request Submitted");</script>'; 
                echo '<script> window.location.href = "lapdetails.php";</script>'; 
                exit;
                //  header("Location: con.php");
            } else {
                echo '<script>alert("Failed to submit service request. Please try again.")</script>';
            }
        }
    }

    function send_mail($uemail, $uname, $category, $req_type, $message,) {
        $mail = new PHPMailer(true);
        require 'config.php';
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = $host; // SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = $username; // SMTP username
            $mail->Password = $password; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom($username, 'RentNRun');
            $mail->addAddress($uemail, 'Recipient Name');

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Service Request Submitted';
            $mail->Body    = '
            <!DOCTYPE html>
    <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Service Request Submitted</title>
                <style>
                    body, h1, p {
                        margin: 0;
                        padding: 0;
                    }
                    body {
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        background-color: #f4f4f4;
                        padding: 20px;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 5px;
                        box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    }
                    h1 {
                        font-size: 24px;
                        color: #333;
                        margin-bottom: 10px;
                    }
                    p {
                        font-size: 16px;
                        color: #666;
                        margin-bottom: 20px;
                    }
                    .highlight {
                        color: #007bff;
                        font-weight: bold;
                    }
                    .footer {
                        margin-top: 20px;
                        border-top: 1px solid #ccc;
                        padding-top: 10px;
                        font-size: 14px;
                        color: #666;
                        text-align: center;
                    }
                    .logo {
                        text-align: center;
                        margin-bottom: 30px;
                    }
                    .logo img {
                        max-width: 500px;
                        height: auto;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="logo">
                        <img src="https://i.ibb.co/xhyJVPR/logo-1.png" alt="Company Logo">
                    </div>
                    <h1>Service Request Submitted</h1>
                    <p>Hello ' . htmlspecialchars($uname) . ',</p>
                    <p>Thank you for submitting your service request. Here are the details of your request:</p>
                    <ul>
                       
                        <li><strong>Category:</strong> ' . htmlspecialchars($category) . '</li>
                        <li><strong>Request Type:</strong> ' . htmlspecialchars($req_type) . '</li>
                        <li><strong>Message:</strong> ' . htmlspecialchars($message) . '</li>
                    </ul>
                    <p>We will review your request and get back to you shortly. If you have any questions, please contact us at rentnrun1@gmail.com.</p>
                    <div class="footer">
                        <p>Best regards,<br>Your Service Team<br><span class="highlight">RentNRun</span></p>
                    </div>
                </div>
            </body>
    </html>';

            $mail->send();
        } catch (Exception $e) {
            // Optionally, handle errors
            echo "<script>alert('.htmlspecialchars($e).');</script>";
        }
    }

?>

<body>
<a href="lapdetails.php" class="home-btn">Home</a>
    <div class="blur-background"></div>

    <div class="container">
        <form class="form" method="POST" onsubmit="return validateForm()">
            <h2>Service Request</h2>
            <input type="text" required id="username" name="name" value="<?php echo $uname ?>" readonly>
            <input type="text" required id="username" name="name" value="<?php echo $uemail?>" readonly>
            <!-- <input type="email" required id="mail" name="email" placeholder="Your Email"> -->
            <select name="category" required id="category" onchange="updateRequestType()">
                <option value="">Select Category</option>
                <option value="Technical Support">Technical Support</option>
                <option value="Maintenance Services">Maintenance Services</option>
                <option value="Upgrade Services">Upgrade Services</option>
                <option value="Rental Extension">Rental Extension</option>
                <option value="Replacement Request">Replacement Request</option>
                <option value="Account and Billing">Account and Billing</option>
                <option value="General Inquiry">General Inquiry</option>
            </select>
            <select name="requestType" required id="requestType">
                <option value="">Select Request Type</option>
            </select>
            <textarea rows="5"name="message" required id="msg" placeholder="Your Message"></textarea>
            <input type="submit" value="Submit" name="submit"> 
        </form>
    </div>

    <script>
        const requestTypes = {
            "Technical Support": ["Hardware Issues", "Software Issues", "Network/Connectivity Problems"],
            "Maintenance Services": ["Regular Maintenance Check", "Cleaning Service", "Battery Replacement"],
            "Upgrade Services": ["RAM Upgrade", "Storage Upgrade", "Software Upgrade"],
            "Rental Extension": ["Extend Current Rental Period"],
            "Replacement Request": ["Replace Damaged Laptop", "Upgrade to a Different Model"],
            "Account and Billing": ["Billing Inquiry", "Account Issues", "Refund Request"],
            "General Inquiry": ["Rental Terms and Conditions", "Service Availability", "Other Questions"]
        };

        function updateRequestType() {
            const category = document.getElementById("category").value;
            const requestTypeSelect = document.getElementById("requestType");

            // Clear previous options
            requestTypeSelect.innerHTML = '<option value="">Select Request Type</option>';

            if (category && requestTypes[category]) {
                requestTypes[category].forEach(type => {
                    const option = document.createElement("option");
                    option.value = type;
                    option.textContent = type;
                    requestTypeSelect.appendChild(option);
                });
            }
        }

        function validateForm() {
            // var name = document.getElementById("username").value.trim();
            // var email = document.getElementById("mail").value.trim();
            var category = document.getElementById("category").value.trim();
            var requestType = document.getElementById("requestType").value.trim();
            var message = document.getElementById("msg").value.trim();

            // Check if name field is empty
            // if (name === "") {
            //     alert("Please enter your name.");
            //     return false;
            // }

            // Check if email field is empty and if it is a valid email format
            // if (email === "") {
            //     alert("Please enter your email address.");
            //     return false;
            // } else if (!validateEmail(email)) {
            //     alert("Please enter a valid email address.");
            //     return false;
            // }

            // Check if request category is selected
            if (category === "") {
                alert("Please select a request category.");
                return false;
            }

            // Check if request type is selected
            if (requestType === "") {
                alert("Please select a request type.");
                return false;
            }

            // Check if message field is empty
            if (message === "") {
                alert("Please enter your message.");
                return false;
            }

            // If all validations pass, form will submit
            return true;
        }

        // Function to validate email format
        // function validateEmail(email) {
        //     var re = /\S+@\S+\.\S+/;
        //     return re.test(email);
        // }
    </script>
</body>
</html>
