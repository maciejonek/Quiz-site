<?php
$query = "SELECT * FROM assocUsersQuizy WHERE id_user='{$user->id}'";
$score = 0;
$result = executeQuery($query);
while($row = mysqli_fetch_array($result)){
    $score += $row['punkty'];
}
