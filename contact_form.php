<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "162.244.93.14";
    $username = "riwservi_data";
    $password = "WxFFYwfmSp6gFWyzJ2SQ";
    $dbname = "riwservi_data";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $secretKey = "6LfMFaoqAAAAAKu9NWwnbH8W-5b9OdDgMZrT_1b7";
    $captchaResponse = $_POST['g-recaptcha-response'];

    $verifyURL = "https://www.google.com/recaptcha/api/siteverify";
    $response = file_get_contents($verifyURL . "?secret=" . $secretKey . "&response=" . $captchaResponse);
    $responseKeys = json_decode($response, true);

    if ($responseKeys['success']) {
        $full_name = $_POST['fname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact_form_entries (full_name, email, address, phone, message) 
                VALUES ('$full_name', '$email', '$address', '$phone', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Form submitted successfully!');
                    window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>
                alert('Please complete the CAPTCHA.');
                window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
              </script>";
    }

    $conn->close();
}
?>
