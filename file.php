<?php
//$servername = "172.30.251.114";
//$username = "ose";
//$password = "openshift";
//$dbname = "quotes";
// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn = mysqli_connect($_ENV["MYSQLDB_SERVICE_HOST"],"instructor","openshift","instructor",
 $_ENV["MYSQLDB_SERVICE_PORT"])
     or die("Error " . mysqli_error($conn));
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo " \n";
$sql = "SELECT instructorNumber, instructorName, email, city, state, postalCode, country
    from instructors";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
        //  echo "InNum:- " . $row["instructorNumber"]. " " ;
        //  echo "InName:- " . $row["instructorName"]. " " ;
        //  echo "Email:- " . $row["email"]. " " ;
        //  echo "City:- " . $row["city"]. " " ;
        //  echo "State:- " .  $row["state"]. " " ;
        //  echo "PostalCode:- " . $row["postalCode"]. " " ;
        //  echo "Country:- " . $row["country"]. " " ;
        //echo " \n";
         //  $id = $row["id"];
        $instructorNumber = $row["$instructorNumber"];
        $instructorName =  $row["instructorName"];
        $email = $row["email"];
        $city =  $row["city"];
        $state = $row["state"];
        $postalCode =  $row["postalCode"];
        $country = $row["country"];
        echo "  <div style='margin:30px 0px;'>
        // Id: $id<br />
           Instructor Number: $instructorNumber<br />
           Instructor Name: $instructorName<br />
           Email: $email<br />
           City: $city<br />
           State: $state<br />
           Postal Code: $postalCode<br />
           Country: $country<br />
           </div>
           ";
   }
} else {
   echo "0 results";
}
$conn->close();
?>
