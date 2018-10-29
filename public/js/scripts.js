var whisk = whisk || {};
whisk.queue = whisk.queue || [];

function buyIngredients() {
	whisk.queue.push(function() {
		whisk.shoppingList.addRecipeToList({
			recipeUrl: window.location.href,
		});
	});
}

var buyIngredientsButton = document.getElementById('recipe-ingredients') || false;
if (buyIngredientsButton) {
	buyIngredientsButton.addEventListener("click", buyIngredients);
}

// whisk.queue.push(function() {
// 	whisk.listeners.addClickListener('recipe-ingredients', 'shoppingList.addRecipeToList', {
// 		recipeUrl: window.location.href,
// 	});
// });