<?php

$query = "SELECT * FROM kategorie";
$result = mysqli_query($connection,$query);
echo '<table>';
while($row = mysqli_fetch_array($result)){
    echo '<form action="controlPanel.php" method="post">';
    echo '<input type="hidden" name="toDelete" value="'.$row['nazwa'].'">';
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['nazwa'].'</td>';
    echo '<td>'.'<input type="submit" name="delete" value="delete">'.'</td>';
    echo '</tr>';
    echo '</form>';
}
echo '</table>';

echo '<table>';
echo '<form action="controlPanel.php" method="post">';
echo '<tr>';
echo '<td><input type="text" name="category" placeholder="Category" </td>';
echo '<td>'.'<input type="submit" name="add" value="add">'.'</td>';
echo '</tr>';
echo '</form>';
echo '</table>';

if(isset($_POST['delete'])){
    $query = "DELETE FROM quizy WHERE nazwa='{$_POST['toDelete']}'";
    mysqli_query($connection,$query);
    $query = "DELETE FROM kategorie WHERE nazwa='{$_POST['toDelete']}'";
    mysqli_query($connection,$query);
    header('Location: controlPanel.php');
    exit();
}

if(isset($_POST['add']) && !empty($_POST['category'])){
    $query = "SELECT * FROM kategorie WHERE nazwa = '{$_POST['category']}'";
    $result = mysqli_query($connection,$query);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        echo 'This category already exists!';
    }
    else {
        $query = "INSERT INTO kategorie (nazwa) VALUES ('{$_POST['category']}')";
        mysqli_query($connection, $query);
        header('Location: controlPanel.php');
        exit();
    }
}