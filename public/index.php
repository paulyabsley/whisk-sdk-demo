<?php
require_once('../private/init.php');

$title = "Whisk SDK Recipe Shopping List Demo";
$description = "Allow users to add all your recipes and products to an eCommerce shopping list across all of your content and touchpoints. Used by the biggest recipe publishers worldwide.";

$recipes = get_data('recipes');

include_once '_header.php';
echo '<h1>' . $title . '</h1>';
echo '<ul>';
foreach ($recipes as $key => $value) {
	$slug = slugify($key);
	echo '<li><a href="/recipe/' . $slug . '/">' . $key . '</a></li>';
}
echo '</ul>';
include_once '_footer.php';