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

<div itemscope itemtype="http://schema.org/Recipe">
   <span itemprop="name">Banana Bread</span> 

   <img itemprop="image" src="bananabread.jpg" alt="Banana bread" />

   Prep Time: <meta itemprop="prepTime" content="PT15M">15 minutes 
   Cook time: <meta itemprop="cookTime" content="PT1H">1 hour 
   Yield: <span itemprop="recipeYield">1 loaf</span> 

   Ingredients: 
   - <span itemprop="recipeIngredient">banana</span> 
   - <span itemprop="recipeIngredient">egg</span> 
   - <span itemprop="recipeIngredient">sugar</span> 

   Instructions:
   <span itemprop="recipeInstructions"> Preheat the oven to 350 degrees. Mix in the ingredients in a bowl. Add the flour last. Pour the mixture into a loaf pan and bake for one hour.</span> 
</div>
<button type="button" id="recipe-ingredients">Buy Ingredients</button>

<?php

include_once '_footer.php';