<!DOCTYPE html>
<html>
<head>
    <title>Recipe List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'db.php';

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];

    $result = mysqli_query($conn,
    "SELECT * FROM recipes WHERE recipe_name LIKE '%$search%'");
}
else
{
    $result = mysqli_query($conn,
    "SELECT * FROM recipes");
}
?>

<h1>Online Recipe Management System</h1>
<p>Manage recipes with Add, Search, Edit and Delete operations.</p>

<a href="register.php" class="nav-btn">Register</a>
<a href="login.php" class="nav-btn">Login</a>
<a href="add_recipe.php" class="nav-btn">Add Recipe</a>

<br><br>

<h2>Recipe List</h2>
<?php
$count = mysqli_num_rows($result);
echo "<h3>Total Recipes: $count</h3>";
?>
<form method="GET">
    Search Recipe:
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>

<br>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
<th>Recipe Name</th>
<th>Ingredients</th>
<th>Instruction</th>
<th>Image</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['recipe_name']; ?></td>
    <td><?php echo $row['ingredients']; ?></td>
    <td><?php echo $row['instruction']; ?></td>
    
   <td>
    <img src="img/<?php echo $row['image']; ?>" width="100">
</td>

    <td><?php echo $row['status']; ?></td>
    <td>
<a href="edit_recipe.php?id=<?php echo $row['id']; ?>">
Edit
</a>
|
<a href="delete_recipe.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this recipe?')">
Delete
</a>
</td>
</tr>
<?php
}
?>

</table>

<hr>

<p align="center">
Developed by NEDA JAVERIA IMAM | 2026
</p>

</body>
</html>