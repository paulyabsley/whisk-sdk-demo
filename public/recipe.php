<?php
require_once('../private/init.php');


$url_val = filter_input(INPUT_GET, 'recipe', FILTER_SANITIZE_STRING);
$recipe = get_recipe_from_url($url_val);
$title = $recipe["title"];
$description = $recipe["description"];

include_once '_header.php';
// echo '<article class="h-recipe">';
// echo '<h1 class="p-name fn">' . $title . '</h1>';
// echo '<p class="p-summary">' . $description . '</p>';
// echo '<h2>Ingredients</h2>';
// echo '<ul>';
// foreach ($recipe["ingredients"] as $key => $ingredient) {
// 	echo '<li class="p-ingredient"><span itemprop="recipeIngredient">' . $ingredient . '</span></li>';
// }
// echo '</ul>';
// echo '<button type="button" id="recipe-ingredients">Buy Ingredients</button>';
// echo '<h2>Directions</h2>';
// echo '<ol class="e-instructions">';
// foreach ($recipe["directions"] as $key => $direction) {
// 	echo '<li>' . $direction . '</li>';
// }
// echo '</ol>';
// echo '</article>';

?>

<article class="h-recipe">
  <h1 class="p-name">Bagels</h1>
 
  <ul>
    <li class="p-ingredient">Flour</li>
    <li class="p-ingredient">Sugar</li>
    <li class="p-ingredient">Yeast</li>
  </ul>
 
  <p>Takes <time class="dt-duration" datetime="1H">1 hour</time>,
     serves <data class="p-yield" value="4">four people</data>.</p>
 
  <div class="e-instructions">
    <ol>
      <li>Start by mixing all the ingredients together.</li>
    </ol>
  </div>
</article><button type="button" id="recipe-ingredients">Buy Ingredients</button>

<?php

include_once '_footer.php';