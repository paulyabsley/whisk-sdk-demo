<?php
require_once('../private/init.php');


$url_val = filter_input(INPUT_GET, 'recipe', FILTER_SANITIZE_STRING);
$recipe = get_recipe_from_url($url_val);
$title = $recipe["title"];
$description = $recipe["description"];

include_once '_header.php';
echo '<article class="h-recipe">';
echo '<h1 class="p-name">' . $title . '</h1>';
echo '<p class="p-summary">' . $description . '</p>';
echo '<h2>Ingredients</h2>';
echo '<ul>';
foreach ($recipe["ingredients"] as $key => $ingredient) {
	echo '<li class="p-ingredient"><span itemprop="recipeIngredient">' . $ingredient . '</span></li>';
}
echo '</ul>';
echo '<button type="button" id="recipe-ingredients">Buy Ingredients</button>';
echo '<h2>Directions</h2>';
echo '<ol class="e-instructions">';
foreach ($recipe["directions"] as $key => $direction) {
	echo '<li>' . $direction . '</li>';
}
echo '</ol>';
echo '</article>';

include_once '_footer.php';