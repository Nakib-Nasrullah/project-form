<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style media="screen">
        
        div{
           border: 2px solid black;
           width: 350px;
           padding: 20px;
            margin-left: 340px;
            margin-top: 80px;
        }
        #ID,#firstname,#lastname,#number,#email,#password{
            width: 300px;
            padding: 5px;
            margin-top: 3px;
        }
        label{
           font-weight: bold; 
           font-size: 18px;
        }
        #submit{
            margin-left: 130px;
            width: 80px;
            padding: 6px;
            font-size: 16px;
            font-weight: bold;
            background-color: green;
            color: white;
            border-radius: 20px;
            border: 1px solid blue;
        }

    </style>
</head>
<body>
    <div>
        <form action="registration form.php" method="post">
            <label for="">Student ID</label><br>
            <input id="ID" type="number" name="idnumber" value="" placeholder="Enter your student ID" required><br><br>
            <label for="">First Name</label><br>
            <input id="firstname" type="text" name="firstname" value="" placeholder="Enter your first name" required>
            <br>
            <br>
            <label for="">Last Name</label><br>
            <input id="lastname" type="text" name="lastname" placeholder="Enter your last name" required><br><br>
            <label for="">Phone Number</label><br>
            <input id="number" type="number" name="phonenumber" value="" placeholder="Enter your phone number" required><br><br>
            <label for="">Email</label><br>
            <input id="email" type="email" name="email" value="" placeholder="Enter your Email" required><br><br>
            <label for="">Set Password</label><br>
            <input id="password" type="password" name="password" value="" placeholder="Set a password" required><br><br>
            <input id="submit" type="submit" name="submit" value="submit"><br><br>
        </form>
    </div>
    <?php 
    $servername="localhost";
    $username="root";
    $password="";
    $database_name="aub";
    $conn=mysqli_connect($servername,$username,$password,$database_name);

        if (isset($_POST['submit'])) {
            $id=$_POST['idnumber'];
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $phonenumber=$_POST['phonenumber'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            $sql="INSERT INTO students_registration(Student_ID,First_Name,Last_Name,Phone_Number,Email,Password) 
            values('$id','$firstname','$lastname','$phonenumber','$email','$password')";
            $query=mysqli_query($conn,$sql);

            if ($query){
                ?>
                    <script type="text/javascript">
                        alert('Registration successfull');
                    </script>
                <?php    
        }
        }
    ?>
</body>
</html>