$(document).ready(function() {
	var productItem = [{
			productName: "Shined Clay Pot",
			price: "2.0",
			photo: "menu-1.jpg"
		},
		{
			productName: "Clay Clock",
			price: "10.0",
			photo: "menu-2.jpg"
		},
		{
			productName: "Clay Mug",
			price: "2.0",
			photo: "menu-3.jpg"
		},
		{
			productName: "Clay Bottle",
			price: "3",
			photo: "menu-4.jpg"
		},
		{
			productName: "Guruleththu",
			price: "8",
			photo: "menu-5.jpg"
		},
		{
			productName: "Coconut Shell Spoons",
			price: "0.5",
			photo: "menu-6.jpg"
		},
		{
			productName: "Clay Kettle",
			price: "3",
			photo: "menu-7.jpg"
		},
		{
			productName: "Shined Clay Pans",
			price: "5",
			photo: "menu-8.jpg"
		},
		{
			productName: "Wooden Motar & Pestle",
			price: "2",
			photo: "menu-9.jpg"
		},
		{
			productName: "Clay Macroms",
			price: "2",
			photo: "menu-10.jpg"
		},
		{
			productName: "Clay Plates",
			price: "3",
			photo: "menu-11.jpg"
		},
		{
			productName: "Clay Cups",
			price: "3",
			photo: "menu-13.jpg"
		},
		{
			productName: "Wooden Toys",
			price: "0.3",
			photo: "menu-14.jpg"
		},];
	showProductGallery(productItem);
	showCartTable();
});

function addToCart(element) {
	var productParent = $(element).closest('div.product-item');

	var price = $(productParent).find('.price span').text();
	var productName = $(productParent).find('.productname').text();
	var quantity = $(productParent).find('.product-quantity').val();

	var cartItem = {
		productName: productName,
		price: price,
		quantity: quantity
	};
	var cartItemJSON = JSON.stringify(cartItem);

	var cartArray = new Array();
	// If javascript shopping cart session is not empty
	if (sessionStorage.getItem('shopping-cart')) {
		cartArray = JSON.parse(sessionStorage.getItem('shopping-cart'));
	}
	cartArray.push(cartItemJSON);

	var cartJSON = JSON.stringify(cartArray);
	sessionStorage.setItem('shopping-cart', cartJSON);
	showCartTable();
}

function emptyCart() {
	if (sessionStorage.getItem('shopping-cart')) {
		// Clear JavaScript sessionStorage by index
		sessionStorage.removeItem('shopping-cart');
		showCartTable();
	}
}



function removeCartItem(index) {
	if (sessionStorage.getItem('shopping-cart')) {
		var shoppingCart = JSON.parse(sessionStorage.getItem('shopping-cart'));
		sessionStorage.removeItem(shoppingCart[index]);
		showCartTable();
	}
}

function showCartTable() {
	var cartRowHTML = "";
	var itemCount = 0;
	var grandTotal = 0;

	var price = 0;
	var quantity = 0;
	var subTotal = 0;

	if (sessionStorage.getItem('shopping-cart')) {
		var shoppingCart = JSON.parse(sessionStorage.getItem('shopping-cart'));
		itemCount = shoppingCart.length;

		//Iterate javascript shopping cart array
		shoppingCart.forEach(function(item) {
			var cartItem = JSON.parse(item);
			price = parseFloat(cartItem.price);
			quantity = parseInt(cartItem.quantity);
			subTotal = price * quantity

			cartRowHTML += "<tr>" +
				"<td>" + cartItem.productName + "</td>" +
				"<td class='text-right'>$" + price.toFixed(2) + "</td>" +
				"<td class='text-right'>" + quantity + "</td>" +
				"<td class='text-right'>$" + subTotal.toFixed(2) + "</td>" +
				"</tr>";

			grandTotal += subTotal;
		});
	}

	$('#cartTableBody').html(cartRowHTML);
	$('#itemCount').text(itemCount);
	$('#totalAmount').text("$" + grandTotal.toFixed(2));
}


function showProductGallery(product) {
	//Iterate javascript shopping cart array
	var productHTML = "";
	product.forEach(function(item) {
		productHTML += '<div class="product-item">'+
					'<img src="img/' + item.photo + '"  class="rounded-circle mb-3 mb-sm-0">'+
					'<div class="productname">' + item.productName + '</div>'+
					'<div class="price">$<span>' + item.price + '</span></div>'+
					'<div class="cart-action">'+
						'<input type="text" class="product-quantity" name="quantity" value="1" size="2" />'+
						'<input type="submit" value="Add to Cart" class="add-to-cart" id="button" onClick="addToCart(this)" data-mdb-toggle="modal" data-mdb-target="#exampleModal" />'+
					'</div>'+
				'</div>';
				"<tr>";
		
	});
	$('#product-item-container').html(productHTML);
}

