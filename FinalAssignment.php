<?php

// Database connection settings
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "art_gallery";   

// Connect to MySQL server
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);


// Drop tables if they already exist (prevents errors)
$conn->query("DROP TABLE IF EXISTS submissions");
$conn->query("DROP TABLE IF EXISTS patrons");
$conn->query("DROP TABLE IF EXISTS artists");
$conn->query("DROP TABLE IF EXISTS paintings");

echo "Old tables removed (if existed).<br><br>";


// Create TABLE: paintings
$paintings_sql = "
CREATE TABLE paintings(
    painting_id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255),
    year_created INT,
    medium VARCHAR(100),
    style VARCHAR(100),
    location VARCHAR(255),
    value_euro DECIMAL(15, 2)
);
";

if ($conn->query($paintings_sql) === TRUE) {
    echo "Table 'paintings' created.<br>";
} else {
    echo "Error creating paintings table: " . $conn->error . "<br>";
}

// Insert painting records
$insert_paintings = "
INSERT INTO paintings VALUES
(111111, 'Birds', 'Emily Mucko', 2007, 'oil paints', 'landscape', 'Kosovo', 54000),
(111112, 'Bridge City', 'Siobhan Nelson', 2005, 'waterpaints', 'portrait', 'London', 35000),
(111113, 'Cerulean Coast', 'Genaviv Oliver Alfred', 2010, 'acrylics', 'landscape', 'Paris', 14000),
(111114, 'Sunrise Industry', 'Paul Bauld', 2007, 'waterpaints', 'portrait', 'Warsaw', 9000),
(111115, 'Treaty Stone', 'Micky Cashen', 2010, 'waterpaints', 'landscape', 'Kosovo', 10000),
(111116, 'The Cathedral', 'Rome Santos', 2007, 'waterpaints', 'landscape', 'London', 4000);
";

$conn->query($insert_paintings);
echo "Inserted paintings.<br><br>";


// Create TABLE: artists
$artists_sql = "
CREATE TABLE artists(
    artist_id VARCHAR(255) PRIMARY KEY,
    artist_name VARCHAR(255),
    paintings_made INT,
    email VARCHAR(255)
);
";

if ($conn->query($artists_sql) === TRUE) {
    echo "Table 'artists' created.<br>";
}

// Insert artists
$insert_artists = "
INSERT INTO artists VALUES
('A1212', 'Emily Mucko', 4, 'EmilyM@yahoo'),
('A1213', 'Siobhan Nelson', 2, 'Siobhan1Nelly@gmail'),
('A1214', 'Genaviv Oliver Alfred', 3, 'GenOLiverAlfred19@yahoo'),
('A1215', 'Paul Bauld', 1, 'PaulB13@yahoo'),
('A1216', 'Micky Cashen', 5, 'Mick1997@yahoo'),
('A1217', 'Rome Santos', 2, 'RomeSantos05@yahoo');
";

$conn->query($insert_artists);
echo "Inserted artists.<br><br>";



// Create TABLE: patrons
$patrons_sql = "
CREATE TABLE patrons(
    patrons_id VARCHAR(255) PRIMARY KEY,
    patrons_name VARCHAR(255),
    phone_num VARCHAR(30),
    donations INT
);
";

if ($conn->query($patrons_sql) === TRUE) {
    echo "Table 'patrons' created.<br>";
}

// Insert patrons
$insert_patrons = "
INSERT INTO patrons VALUES
('P5121', 'Brendan Hans', '01 999 54637', 98000),
('P5122', 'Nanda O Sullivan', '00 997 90940', 6000),
('P5123', 'Angel Pican', '03 423 43342', 20000),
('P5124', 'Jake Halligan', '12 327 33362', 1600),
('P5125', 'Alex Orlik', '12 328 49484', 1400),
('P5126', 'Ava O Mahony', '09 898 97323', 7);
";

$conn->query($insert_patrons);
echo "Inserted patrons.<br><br>";



// Create TABLE: submissions
$submissions_sql = "
CREATE TABLE submissions(
    submission_id INT PRIMARY KEY,
    painting_id INT,
    submission_date DATE
);
";

if ($conn->query($submissions_sql) === TRUE) {
    echo "Table 'submissions' created.<br>";
}

// Insert submissions
$insert_submissions = "
INSERT INTO submissions VALUES
(2001, 111111, '2023-01-15'),
(2002, 111112, '2023-02-10'),
(2003, 111113, '2023-03-05'),
(2004, 111114, '2023-04-21'),
(2005, 111115, '2023-05-30');
";

$conn->query($insert_submissions);
echo "Inserted submissions.<br><br>";

echo "<strong>All tables created and data inserted successfully!</strong>";

$conn->close();
?>
