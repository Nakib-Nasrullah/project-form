<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Appointment Form</title>
    <style>
        div {
            border: 2px solid black;
            width: 350px;
            padding: 20px;
            margin-left: 440px;
            margin-top: 80px;
        }
        #name, #email, #phone, #date, #time, #reason {
            width: 300px;
            padding: 5px;
            margin-top: 3px;
        }
        label {
            font-weight: bold;
            font-size: 18px;
        }
        #submit {
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
        <h1>Patient Appointment Form</h1>
        <form action="" method="POST">
            <label for="name">Full Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="phone">Phone Number:</label><br>
            <input type="tel" id="phone" name="phone" required><br><br>

            <label for="date">Appointment Date:</label><br>
            <input type="date" id="date" name="date" required><br><br>

            <label for="time">Preferred Time:</label><br>
            <input type="time" id="time" name="time" required><br><br>

            <label for="reason">Reason for Visit:</label><br>
            <textarea id="reason" name="reason" rows="4" required></textarea><br><br>

            <input type="submit" id="submit" name="submit" value="Submit"><br><br>
        </form>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $reason = $_POST['reason'];

        $stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, appointment_date, appointment_time, reason) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $phone, $date, $time, $reason);

        if ($stmt->execute()) {
            echo "<script>alert('Appointment booked successfully!');</script>";
        } else {
            echo "<script>alert('Error: Could not save your appointment.');</script>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>
</body>
</html>
