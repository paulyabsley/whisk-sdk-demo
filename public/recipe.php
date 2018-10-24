<?php
require_once('../private/init.php');

$url_val = filter_input(INPUT_GET, 'recipe', FILTER_SANITIZE_STRING);
$recipe = get_recipe_from_url($url_val);
$title = $recipe["title"];
$description = $recipe["description"];

include_once '_header.php';

echo module_recipe($recipe);

// echo module_header($recipe["title"], $recipe["image"]);

// echo '<div class="container">';
// echo '<article itemscope itemtype="http://schema.org/Recipe" class="recipe">';
// echo '<h1 itemprop="name" class="recipe__title">' . $title . '</h1>';

// echo '<div class="recipe__meta">';
// echo '<div class="recipe__image">';
// echo '<img src="/images/' . $recipe["image"] . '" alt="" itemprop="image">';
// echo '</div>'; // .recipe__image
// echo '<div class="recipe__details">';
// echo '<p class="recipe__description" itemprop="description">' . $description . '</p>';
// echo '<ul class="recipe__info-list">';
// echo '<li>Prep time: <meta itemprop="prepTime" content="' . $recipe["prep_time"] . '">' . $recipe["prep_time_long"] . '</li>';
// echo '<li>Cook time: <meta itemprop="cookTime" content="' . $recipe["cook_time"] . '">' . $recipe["cook_time_long"] . '</li>';
// echo '<li>Serving: <meta itemprop="recipeYield" content="' . $recipe["yeild"] . '">' . $recipe["yeild_long"] . '</li>';
// echo '</ul>';
// echo '</div>'; // .recipe__image
// echo '</div>'; // .recipe__meta

// echo '<div class="recipe__ingredients">'; 
// echo '<h2>Ingredients</h2>';
// foreach ($recipe["ingredients"] as $key => $ingredient) {
// 	if (is_array($ingredient)) {
// 		echo '<h3>' . $key . '<h3>';
// 		echo '<ul>';
// 		foreach ($ingredient as $key => $ing) {
// 			echo '<li itemprop="recipeIngredient" content="' . $ing . '">' . $ing . '</li>';
// 		}
// 		echo '</ul>';
// 	} else {
// 		if ($key == 0) echo '<ul>';
// 		echo '<li itemprop="recipeIngredient" content="' . $ingredient . '">' . $ingredient . '</li>';
// 		if ($key == count($recipe["ingredients"]) - 1) echo '</ul>';
// 	}
// }
// echo '<button type="button" id="recipe-ingredients">Buy Ingredients</button>';
// echo '</div>'; // .recipe__ingredients

// echo '<div class="recipe__method">'; 
// echo '<h2>Method</h2>';
// echo '<ol itemprop="recipeInstructions">';
// foreach ($recipe["directions"] as $key => $direction) {
// 	echo '<li itemprop="HowToStep">' . $direction . '</li>';
// }
// echo '</ol>';
// echo '</div>'; // .recipe__method

// echo '</article>';
// echo '</div>'; // .container

include_once '_footer.php';