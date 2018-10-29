<?php

/**
 * Header
 * @param string $title
 * @return string
 */
function module_page_header($title) {
	$bc = 'header';
	$o = '<header class="' . $bc . '">';
	$o .= '<h1 class="' . $bc . '__title">' . $title . '</h1>';
	$o .= '</header>';
	return $o;
}

/**
 * Recipe
 * @param array $recipe
 * @return string
 */
function module_recipe($recipe) {
	$o = '<div class="container">';
	$o .= '<article itemscope itemtype="http://schema.org/Recipe" class="recipe">';
	$o .= module_recipe_header($recipe);
	$o .= '<div class="recipe__body">';
	$o .= module_recipe_intro($recipe);
	$o .= '<div class="recipe__instructions">';
	$o .= module_recipe_method($recipe);
	$o .= module_recipe_ingredients($recipe);
	$o .= '</div>'; // .recipe__instructions
	$o .= '</div>'; // .recipe__body
	$o .= '</article>';
	$o .= '</div>'; // .container
	return $o;
}

/**
 * Recipe Header
 * @param array $recipe
 * @return string
 */
function module_recipe_header($recipe) {
	$bc = 'recipe__head';
	$o = '';
	$o .= '<header class="' . $bc . '">';
	$o .= '<div class="' . $bc . '-inner">';
	$o .= '<div class="' . $bc . '-image" style="background-image: url(/images/' . $recipe["image"] . '"></div>';
	$o .= '<h1 class="' . $bc . '-title" itemprop="name">' . $recipe["title"] . '</h1>';
	$o .= '<ul class="' . $bc . '-meta">';
	$o .= '<li class="' . $bc . '-meta-item">Prep time: <meta itemprop="prepTime" content="' . $recipe["prep_time"] . '">' . $recipe["prep_time_long"] . '</li>';
	$o .= '<li class="' . $bc . '-meta-item">Cook time: <meta itemprop="cookTime" content="' . $recipe["cook_time"] . '">' . $recipe["cook_time_long"] . '</li>';
	$o .= '<li class="' . $bc . '-meta-item">Serving: <meta itemprop="recipeYield" content="' . $recipe["yeild"] . '">' . $recipe["yeild_long"] . '</li>';
	$o .= '</ul>';
	$o .= '</div>'; // .header__inner
	$o .= '</header>';
	return $o;
}

/**
 * Recipe Intro
 * @param array $recipe
 * @return string
 */
function module_recipe_intro($recipe) {
	$o = '<div class="recipe__intro">';
	$o .= '<div class="recipe__image">';
	$o .= '<img src="/images/' . $recipe["image"] . '" alt="" itemprop="image">';
	$o .= '</div>'; // .recipe__image
	$o .= '<p class="recipe__description" itemprop="description">' . $recipe["description"] . '</p>';
	$o .= '</div>'; // .recipe__intro
	return $o;
}

/**
 * Recipe Ingredients
 * @param array $recipe
 * @return string
 */
function module_recipe_ingredients($recipe) {
	$bc = 'recipe';
	$o = '<div class="' . $bc . '__ingredients">';
	$o .= '<h2 class="' . $bc . '__sub-head">Ingredients</h2>';
	foreach ($recipe["ingredients"] as $key => $ingredient) {
		if (is_array($ingredient)) {
			$o .= '<h3 class="' . $bc . '__tertiary-head">' . $key . '</h3>';
			$o .= '<ul class="' . $bc . '__ingredient-list">';
			foreach ($ingredient as $key => $ing) {
				$o .= '<li itemprop="recipeIngredient" content="' . $ing . '">' . $ing . '</li>';
			}
			$o .= '</ul>';
		} else {
			if ($key == 0) $o .= '<ul class="' . $bc . '__ingredient-list">';
			$o .= '<li itemprop="recipeIngredient" content="' . $ingredient . '">' . $ingredient . '</li>';
			if ($key == count($recipe["ingredients"]) - 1) $o .= '</ul>';
		}
	}
	$o .= '<button type="button" id="recipe-ingredients" class="' . $bc . '__buy">Buy Ingredients</button>';
	$o .= '</div>'; // .recipe__ingredients
	return $o;
}

/**
 * Recipe Method
 * @param array $recipe
 * @return string
 */
function module_recipe_method($recipe) {
	$bc = 'recipe';
	$o = '<div class="' . $bc . '__method">';
	$o .= '<h2 class="' . $bc . '__sub-head">Method</h2>';
	$o .= '<ol itemprop="recipeInstructions" class="' . $bc . '__method-list">';
	foreach ($recipe["directions"] as $key => $direction) {
		$o .= '<li itemprop="HowToStep">' . $direction . '</li>';
	}
	$o .= '</ol>';
	$o .= '</div>'; // .recipe__method
	return $o;
}