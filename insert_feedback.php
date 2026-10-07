<?php
// ૧. ડેટાબેઝ વિગતો
$servername = "localhost";
$username   = "root";      // XAMPP માં બાય ડિફોલ્ટ યુઝર 'root' હોય છે
$password   = "";          // XAMPP માં બાય ડિફોલ્ટ પાસવર્ડ ખાલી હોય છે
$dbname     = "feedback";

// ૨. કનેક્શન બનાવો
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ૩. કનેક્શન તપાસો
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ૪. ફોર્મમાંથી ડેટા મેળવો
$work_culture = $_POST['work_culture'] ?? '';
$department   = $_POST['department'] ?? '';

// ૫. સુધારેલી SQL ક્વેરી (Quotes અને commas સુધાર્યા)
$query = "INSERT INTO dk_enterprice (work_culture, department) VALUES ('$work_culture', '$department')";

// ૬. ક્વેરી રન કરો (mysqli_query માં $conn પહેલું આવે)
if (mysqli_query($conn, $query)) {
    echo "Feedback submitted successfully! <br>";
    echo "<a href='feedback.html'>View all</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}

// ૭. કનેક્શન બંધ કરો
mysqli_close($conn);
?>