<?php

  $connect = mysqli_connect("localhost", "root", "", "thechampinkjet");


  if (isset($_POST['query'])) {

  	$search_query = $_POST['query'];


    $query = "SELECT S_Name FROM style ";
    $result = mysqli_query($connect, $query);

  if (mysqli_num_rows($result) > 0) {
   while ($country_row = mysqli_fetch_array($result)) {
    echo $country_row['S_Name']."<br/>";
  }
} else {
  echo "<p style='color:red'>Country not found...</p>";
}

}
?>
