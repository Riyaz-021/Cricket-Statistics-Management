<?php
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'DBMSPROJECT';

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
// SQL query to select all records from the table
$sql = "SELECT * FROM jb";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>J.Bumrah</title>
    <style>
        img{
            height: 200px;
            width: 200px;
        }
        .container-fluid{
            margin-top: 20px;
            color: whitesmoke;
        }
        p{
            color:whitesmoke;
            padding-left: 20px;
            padding-right:20px;
        }
        h3{
            color:whitesmoke;
        }
        table,tr,th,td{
            color:whitesmoke;
        }
        table{
            border:2px solid white;
            border-collapse: separate;
            border-spacing: 10px;
        }
        th, td {
            border: 1px solid black; /* Just for demonstration purposes */
            padding: 15px; /* Just for demonstration purposes */
        }
    </style>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-light">
        <a class="navbar-brand" href="Homepage.html"><b>Cricket Info</b></a>
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="Homepage.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Help.html">Help</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </nav>
    <center>
        <div class="container-fluid">
            <img src="./statpage/ind/jb.jpg" style ="clip-path: circle(50% at 50% 50%);"/>
            <h3>JASPRIT BUMRAH</h3>
            <p>India</p>
        </div>
        <p>Jasprit Jasbirsingh Bumrah is an Indian international cricketer who plays for the Indian cricket team in all formats of the game. A right-arm fast bowler with a unique bowling action, Bumrah is currently considered one of the best bowlers in the world and one of the greatest fast bowlers India has produced</p>
        <h3 class="stats">STATS</h3>
        <div class="container-fluid">
            <table border="1">
                <tr>
                    <th>FORMAT</th>
                    <th>MATCHES</th>
                    <th>INNINGS</th>
                    <th>RUNS GIVEN</th>
                    <th>WICKETS</th>
                    <th>BEST BOWLING</th>
                    <th>ECONOMY</th>
                    <th>AVERAGE</th>
                    <th>STRIKE RATE</th>
                    <th>5 WICKET HAULS</th>

                    <!-- Add more columns as per your table structure -->
                </tr>
                <?php
                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["format"] . "</td>";
                        echo "<td>" . $row["matches"] . "</td>";
                        echo "<td>" . $row["innings"] . "</td>";
                        echo "<td>" . $row["runsgiven"] . "</td>";
                        echo "<td>" . $row["wickets"] . "</td>";
                        echo "<td>" . $row["bestbowl"] . "</td>";
                        echo "<td>" . $row["economy"] . "</td>";
                        echo "<td>" . $row["avg"] . "</td>";
                        echo "<td>" . $row["sr"] . "</td>";
                        echo "<td>" . $row["fwh"] . "</td>";
                        // Output more columns as needed
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </table>
        </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Close connection
$conn->close();
?>