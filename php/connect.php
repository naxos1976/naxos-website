<?php
$servername = "localhost";
$username = "root"; // Το όνομα χρήστη της MySQL
$password = "your_root_password"; // Βάλε εδώ τον κωδικό σου
$dbname = "naxos_library";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Σφάλμα σύνδεσης: " . $e->getMessage();
    exit();
}
?>
