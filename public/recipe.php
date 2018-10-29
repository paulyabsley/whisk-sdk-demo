<?php
require_once('../private/init.php');

$url_val = filter_input(INPUT_GET, 'recipe', FILTER_SANITIZE_STRING);
$recipe = get_recipe_from_url($url_val);
$title = $recipe["title"];
$description = $recipe["description"];

include_once '_header.php';
echo module_recipe($recipe);
include_once '_footer.php';