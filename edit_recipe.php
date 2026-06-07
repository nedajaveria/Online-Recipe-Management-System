<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM recipes WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $recipe_name = $_POST['recipe_name'];
    $ingredients = $_POST['ingredients'];
    $instruction = $_POST['instruction'];

    mysqli_query($conn,
    "UPDATE recipes
    SET recipe_name='$recipe_name',
    ingredients='$ingredients',
    instruction='$instruction'
    WHERE id=$id");

    header("Location:view_recipes.php");
}
?>

<h2>Edit Recipe</h2>

<form method="POST">

Recipe Name:<br>
<input type="text" name="recipe_name"
value="<?php echo $row['recipe_name']; ?>"><br><br>

Ingredients:<br>
<textarea name="ingredients"><?php echo $row['ingredients']; ?></textarea><br><br>

Instruction:<br>
<textarea name="instruction"><?php echo $row['instruction']; ?></textarea><br><br>

<input type="submit" name="update" value="Update">

</form>