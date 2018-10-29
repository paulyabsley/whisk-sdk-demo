<?php
require_once('../private/init.php');

$title = "Whisk SDK Recipe Shopping List Demo";
$description = "Allow users to add all your recipes and products to an eCommerce shopping list across all of your content and touchpoints. Used by the biggest recipe publishers worldwide.";

$recipes = get_data('recipes');

include_once '_header.php';
echo '<div class="container">';
echo module_page_header($title);
echo module_recipe_card_list($recipes);
echo '</div>';
include_once '_footer.php';