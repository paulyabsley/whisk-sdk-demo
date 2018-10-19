<?php
require_once('../private/init.php');


$url_val = filter_input(INPUT_GET, 'recipe', FILTER_SANITIZE_STRING);
$recipe = get_recipe_from_url($url_val);
$title = $recipe["title"];
$description = $recipe["description"];

include_once '_header.php';
echo '<article itemscope itemtype="http://schema.org/Recipe">';
echo '<h1 itemprop="name">' . $title . '</h1>';
echo '<img src="/images/' . $recipe["image"] . '" alt="" itemprop="image">';
echo '<p itemprop="description">' . $description . '</p>';
echo '<ul>';
echo '<li>Prep time: ' . $recipe["prep_time"] . '</li>';
echo '<li>Cook time: ' . $recipe["cook_time"] . '</li>';
echo '</ul>';
echo '<h2>Ingredients</h2>';
echo '<ul>';
foreach ($recipe["ingredients"] as $key => $ingredient) {
	echo '<li itemprop="recipeIngredient">' . $ingredient . '</li>';
}
echo '</ul>';
echo '<button type="button" id="recipe-ingredients">Buy Ingredients</button>';
echo '<h2>Directions</h2>';
echo '<ol class="e-instructions" itemprop="HowToSection">';
foreach ($recipe["directions"] as $key => $direction) {
	echo '<li itemprop="HowToStep">' . $direction . '</li>';
}
echo '</ol>';
echo '</article>';
include_once '_footer.php';