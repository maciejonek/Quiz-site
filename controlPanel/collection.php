<?php
$query = "SELECT * FROM quizy";
$result = mysqli_query($connection,$query);
echo '<table>';
while($row = mysqli_fetch_array($result)){
    echo '<form action="controlPanel.php" method="post">';
    echo '<input type="hidden" name="toDelete" value="'.$row['id'].'">';
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['nazwa'].'</td>';
    echo '<td>'.$row['kategoria'].'</td>';
    echo '<td>'.$row['user_id'].'</td>';
    echo '<td>'.'<input type="submit" name="delete" value="delete">'.'</td>';
    echo '</tr>';
    echo '</form>';
}
if(isset($_POST['delete'])){
    $query = "DELETE FROM pytania WHERE id_quiz='{$_POST['toDelete']}'";
    mysqli_query($connection,$query);
    $query = "DELETE FROM quizy WHERE id='{$_POST['toDelete']}'";
    mysqli_query($connection,$query);
    header('Location: controlPanel.php');
    exit();
}
echo '</table>';