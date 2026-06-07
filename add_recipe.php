<?php
include 'db.php';

if(isset($_POST['submit']))
{
    $user_id = $_POST['user_id'];
    $category_id = $_POST['category_id'];
    $recipe_name = $_POST['recipe_name'];
    $ingredients = $_POST['ingredients'];
    $instruction = $_POST['instruction'];
    $image = $_FILES['image']['name'];

move_uploaded_file(
    $_FILES['image']['tmp_name'],
    "img/".$image
);

    $sql = "INSERT INTO recipes
    (user_id,category_id,recipe_name,ingredients,instruction,image,status)
    VALUES
    ('$user_id','$category_id','$recipe_name','$ingredients','$instruction','$image','Active')";

    mysqli_query($conn,$sql);

    echo "Recipe Added Successfully";
}
?>
<div class="form-box">
<h2>Add Recipe</h2>

<form method="post" enctype="multipart/form-data">

User ID:
<input type="text" name="user_id"><br><br>

Category ID:
<input type="text" name="category_id"><br><br>

Recipe Name:
<input type="text" name="recipe_name"><br><br>

Ingredients:
<textarea name="ingredients"></textarea><br><br>

Description:
<textarea name="instruction"></textarea><br><br>

Image:
<input type="file" name="image"><br><br>

<input type="submit" name="submit" value="Add Recipe">

</form>
</div>