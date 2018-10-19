<?php

/**
 * Turn string into url slug
 * @param string $string
 * @return string
 */
function slugify($string) {
	// https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
	// Replace non letter or digits by -
	$string = preg_replace('~[^\pL\d]+~u', '-', $string);
	// Transliterate
	$string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
	// Remove unwanted characters
	$string = preg_replace('~[^-\w]+~', '', $string);
	// Trim
	$string = trim($string, '-');
	// Remove duplicate -
	$string = preg_replace('~-+~', '-', $string);
	// Lowercase
	$string = strtolower($string);
	return $string;
}

/**
 * Redirect to passed location
 * @param string $location
 * @return void
 */
function redirect($location) {
	header("Location: $location");
	exit;
}

/**
 * Get Data
 * @param string $file
 * @return array
 */
function get_data($file) {
	try {
		$valid_json_file = file_exists(PRIVATE_DIR . '/' . $file . '.json');
		if ($valid_json_file) {
			$json = file_get_contents(PRIVATE_DIR . '/' . $file . '.json');
		} else {
			throw new Exception('Requested data file \'' . $file . '.json\' does not exist');
		}
		return json_decode($json, true, 50);
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
		exit;
	}
}

/**
 * Get recipe
 * @param string $recipe
 * @return array
 */
function get_recipe($recipe) {
	try {
		$recipes = get_data("recipes");
		if (isset($recipes[$recipe])) {
			return $recipes[$recipe];
		} else {
			throw new Exception('Undefined index: \'' . $recipe . '\' does not exist');
		}
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
		exit;
	}
}

/**
 * Get recipe from url
 * @param string $url
 * @return array
 */
function get_recipe_from_url($url) {
	$recipes = get_data("recipes");
	foreach ($recipes as $key => $value) {
		$recipe = slugify($key);
		if ($recipe === $url) {
			return get_recipe($key);
		}
	}
	redirect('/');
}