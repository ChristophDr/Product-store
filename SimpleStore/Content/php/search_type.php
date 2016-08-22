<?php
$temp_text = $_POST['temp_input_text'];
$temp_date = $_POST['temp_input_date'];
echo "<table id='product-table' class='table table-bordered table-condensed table-striped'>";
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

$sql = "SELECT * FROM products WHERE ";
if(!empty($temp_text))
{
  $sql = $sql . "name LIKE '%" . $temp_text . "%' OR description LIKE '%" . $temp_text . "%'";
}
if(!empty($temp_date))
{
  if(!empty($temp_text))
  {
    $sql = $sql . " AND ";
  }
  list($start_date, $end_date) = explode('to', $temp_date);
  $sql = $sql . "created BETWEEN '".  str_replace(' ', '', $start_date) ."' AND '".  str_replace(' ', '', $end_date) ."' ORDER BY created DESC";
}



foreach ($conn->query($sql) AS $row) {
echo "<tr>";
echo "<td valign='top' ><input type='checkbox' name='prod_{$row['id']}' value='{$row['id']}'></td>";
echo "<td valign='top'>{$row['name']}</td>";
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['description']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['price']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['category_id']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['created']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['modified']) . "</td>";
echo "<td valign='top'><a href=edit.php?id={$row['id']}><button type='button' class='btn btn-info btn-fix'><span class='glyphicon glyphicon-edit' aria-hidden='true'>
</span>&nbsp;Edit</button></a><a href=delete.php?id={$row['id']}><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'>
</span>&nbsp;Delete</button></a>&emsp;&emsp;</td> ";
echo "</tr>";
}
echo "</table>";
echo "<a href=new.php>New Row</a>";
?>
