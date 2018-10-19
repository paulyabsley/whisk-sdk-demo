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
echo '<li>Prep time: <meta itemprop="prepTime" content="' . $recipe["prep_time"] . '">' . $recipe["prep_time_long"] . '</li>';
echo '<li>Cook time: <meta itemprop="cookTime" content="' . $recipe["cook_time"] . '">' . $recipe["cook_time_long"] . '</li>';
echo '<li>Serving: <meta itemprop="recipeYield" content="' . $recipe["yeild"] . '">' . $recipe["yeild_long"] . '</li>';
echo '</ul>';
echo '<h2>Ingredients</h2>';
echo '<ul>';
foreach ($recipe["ingredients"] as $key => $ingredient) {
	if (is_array($ingredient)) {
		echo '<h3>' . $key . '<h3>';
		echo '<ul>';
		foreach ($ingredient as $key => $ing) {
			echo '<li itemprop="recipeIngredient">' . $ing . '</li>';
		}
		echo '</ul>';
	} else {
		echo '<li itemprop="recipeIngredient">' . $ingredient . '</li>';
	}
}
echo '</ul>';
echo '<button type="button" id="recipe-ingredients">Buy Ingredients</button>';
echo '<h2>Directions</h2>';
echo '<ol itemprop="recipeInstructions">';
foreach ($recipe["directions"] as $key => $direction) {
	echo '<li itemprop="HowToStep">' . $direction . '</li>';
}
echo '</ol>';
echo '</article>';
include_once '_footer.php';