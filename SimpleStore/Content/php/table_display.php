<?php

echo "<table class='table table-bordered table-condensed table-striped'>";
echo "<tr>";
echo "<td><b><input type='checkbox' name='all_selected' value=''></b></td>";
echo "<td class='table-title'><b>Name</b></td>";
echo "<td class='table-title'><b>Id</b></td>";
echo "<td class='table-title'><b>Description</b></td>";
echo "<td class='table-title'><b>Price</b></td>";
echo "<td class='table-title'><b>Category Id</b></td>";
echo "<td class='table-title'><b>Created</b></td>";
echo "<td class='table-title'><b>Modified</b></td>";
echo "<td><b>Actions</b></td>";
echo "</tr>";
include('config.php');
$sql = "SELECT * FROM products";

foreach ($conn->query($sql) AS $row) {
echo "<tr>";
echo "<td valign='top'><input type='checkbox' name='prod_{$row['id']}' value='{$row['id']}'></td>";
echo "<td valign='top'>{$row['name']}</td>";
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['description']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['price']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['category_id']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['created']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['modified']) . "</td>";
echo "<td valign='top'><a href=edit.php?id={$row['id']}>Edit</a>&nbsp;&nbsp;<a href=delete.php?id={$row['id']}>Delete</a></td> ";
echo "</tr>";
}
echo "</table>";
echo "<a href=new.php>New Row</a>";
?>
