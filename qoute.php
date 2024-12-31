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

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    $file = $_FILES['file'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        $sql = "INSERT INTO qoute_entries (first_name, last_name, email, phone, file_path) 
                VALUES ('$first_name', '$last_name', '$email', '$phone', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Your qoute was sent successfully!');
                    window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "File upload failed!";
    }

    $conn->close();
}
?>
