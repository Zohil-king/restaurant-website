<?php
// Database connection
$servername = "localhost";
$username = "root";   // default XAMPP username
$password = "";       // default XAMPP password is empty
$dbname = "restaurant_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];

// Insert into database
$sql = "INSERT INTO bookings (name, email, booking_date, booking_time, guests)
        VALUES ('$name', '$email', '$date', '$time', '$guests')";

if ($conn->query($sql) === TRUE) {
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #ffecd2, #fcb69f);
        text-align: center;
        padding: 50px;
      }
      .card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        display: inline-block;
        max-width: 500px;
        animation: fadeIn 1s ease-in-out;
      }
      h2 {
        color: #333;
        margin-bottom: 15px;
      }
      p {
        font-size: 18px;
        margin: 10px 0;
      }
      .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: #ff7b54;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        transition: 0.3s;
      }
      .btn:hover {
        background: #e85d3c;
      }
      @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
      }
    </style>
  </head>
  <body>
    <div class="card">
      <h2>🎉 Thank you, <?php echo htmlspecialchars($name); ?>!</h2>
      <p>Your booking has been confirmed.</p>
      <p><strong>Date:</strong> <?php echo htmlspecialchars($date); ?></p>
      <p><strong>Time:</strong> <?php echo htmlspecialchars($time); ?></p>
      <p><strong>Guests:</strong> <?php echo htmlspecialchars($guests); ?></p>
      <a href="booking.html" class="btn">Make Another Booking</a>
      <a href="index.html" class="btn">Go Home</a>
    </div>
  </body>
  </html>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
