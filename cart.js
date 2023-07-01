var addItemId = 0;

function addToCart(item) {
    addItemId += 1;

    var addToCartBtn = item.querySelector('button');
    addToCartBtn.disabled = true; // Disable the button

    var title = item.querySelector('h4').innerText;
    var price = item.querySelector('.price-tag').innerText;
    var imageSrc = item.querySelector('img').getAttribute('src');
    var menuId = item.getAttribute('data-menu-id');
    var quantity = 1; // Set the default quantity to 1

    var selectedItem = {
        menuId: menuId,
        title: title,
        price: price,
        quantity: quantity
    };

    var selectedItemElement = document.createElement('div');
    selectedItemElement.classList.add('cartItem');
    selectedItemElement.setAttribute('id', 'item' + addItemId);

    var img = document.createElement('img');
    img.setAttribute('src', imageSrc);
    img.classList.add('cartImg');
    img.style.width = '120px'; // Set the width to 80 pixels
    img.style.height = '120px'; // Set the height to 60 pixels

    var titleElement = document.createElement('div');
    titleElement.innerText = title;

    var priceElement = document.createElement('div');
    priceElement.innerText = price;

    var quantityLabel = document.createElement('label');
    quantityLabel.innerText = 'Quantity:';
    var quantityInput = document.createElement('input');
    quantityInput.type = 'number';
    quantityInput.defaultValue = 1;
    quantityInput.min = 1;
    quantityInput.classList.add('quantity-input');
    quantityLabel.appendChild(quantityInput);

    var delBtn = document.createElement('button');
    delBtn.innerText = 'Delete';
    delBtn.classList.add('delete-btn');
    delBtn.setAttribute('onclick', 'del(' + addItemId + ')');

    selectedItemElement.append(img);
    selectedItemElement.append(titleElement);
    selectedItemElement.append(priceElement);
    selectedItemElement.appendChild(quantityLabel);
    selectedItemElement.append(delBtn);

    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    cartItems.push(selectedItem);
    localStorage.setItem('cartItems', JSON.stringify(cartItems));

    showCart();
}

function del(item) {
    document.getElementById('item' + item).remove();

    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    cartItems = cartItems.filter(function (cartItem) {
        return cartItem.indexOf('item' + item) === -1;
    });
    localStorage.setItem('cartItems', JSON.stringify(cartItems));

    showCart();
}

function showCart() {
    var cart = document.getElementById('cart');
    cart.innerHTML = '';

    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    for (var i = 0; i < cartItems.length; i++) {
        var item = document.createElement('div');
        item.innerHTML = cartItems[i];
        cart.appendChild(item);
    }
}

function showCartItems() {
    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    var cartList = document.getElementById('cartItems');

    // Clear existing cart items
    cartList.innerHTML = '';

    // Iterate over cart items and create list elements
    cartItems.forEach(function(item) {
      var li = document.createElement('li');
      var title = document.createElement('span');
      title.classList.add('item-title');
      title.innerText = item.title;
      var price = document.createElement('span');
      price.classList.add('item-price');
      price.innerText = item.price;
      li.appendChild(title);
      li.appendChild(price);
      cartList.appendChild(li);
    });
}

// Path: checkout.js
function checkout() {
    var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    // Send the cart items to the server for insertion into the database
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'order_details.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // If the insertion is successful, redirect to the payment page
            window.location.href = "payment.php";
        }
    };

    xhr.send(JSON.stringify(cartItems));
}

//2
// var addItemId = 0;

// function addToCart(item) {
//     addItemId += 1;

//     var addToCartBtn = item.querySelector('button');
//     addToCartBtn.disabled = true; // Disable the button

//     var title = item.querySelector('h4').innerText;
//     var price = item.querySelector('.price-tag').innerText;
//     var imageSrc = item.querySelector('img').getAttribute('src');
//     var menuId = item.getAttribute('data-menuid');
//     var quantity = 1; // Set the default quantity to 1

//     var selectedItem = {
//         menuId: menuId,
//         title: title,
//         price: price,
//         quantity: quantity
//     };

//     var selectedItem = document.createElement('div');
//     selectedItem.classList.add('cartItem');
//     selectedItem.setAttribute('id', 'item' + addItemId);

//     var img = document.createElement('img');
//     img.setAttribute('src', imageSrc);
//     img.classList.add('cartImg');
//     img.style.width = '120px'; // Set the width to 80 pixels
//     img.style.height = '120px'; // Set the height to 60 pixels

//     var titleElement = document.createElement('div');
//     titleElement.innerText = title;

//     var priceElement = document.createElement('div');
//     priceElement.innerText = price;

//     var quantityLabel = document.createElement('label');
//     quantityLabel.innerText = 'Quantity:';
//     var quantityInput = document.createElement('input');
//     quantityInput.type = 'number';
//     quantityInput.defaultValue = 1;
//     quantityInput.min = 1;
//     quantityInput.classList.add('quantity-input');
//     quantityLabel.appendChild(quantityInput);

//     var delBtn = document.createElement('button');
//     delBtn.innerText = 'Delete';
//     delBtn.classList.add('delete-btn');
//     delBtn.setAttribute('onclick', 'del(' + addItemId + ')');

//     selectedItem.append(img);
//     selectedItem.append(titleElement);
//     selectedItem.append(priceElement);
//     selectedItem.appendChild(quantityLabel);
//     selectedItem.append(delBtn);

//     // var cartItems = document.getElementById('title');
//     // cartItems.append(selectedItem);
//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
//     // cartItems.push(selectedItem.outerHTML);
//     cartItems.push(menuID);
//     // cartItems.push(selectedItem);
//     localStorage.setItem('cartItems', JSON.stringify(cartItems));

//     showCart();
// }

// // function del(item) {
// //     document.getElementById('item' + item).remove();

// //     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
// //     cartItems = cartItems.filter(function (cartItem) {
// //         return cartItem.indexOf('item' + item) === -1;
// //     });
// //     localStorage.setItem('cartItems', JSON.stringify(cartItems));

// //     showCart();
// // }

// function del(item) {
//     document.getElementById('item' + item).remove();

//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
//     cartItems = cartItems.filter(function (cartItem) {
//         return cartItem.id !== 'item' + item;
//     });
//     localStorage.setItem('cartItems', JSON.stringify(cartItems));

//     showCart();
// }
  

// function showCart() {
//     var cart = document.getElementById('cart');
//     cart.innerHTML = '';

//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

//     for (var i = 0; i < cartItems.length; i++) {
//         var item = document.createElement('div');
//         item.innerHTML = cartItems[i];
//         cart.appendChild(item);
//     }
// }

// showCart();

// document.addEventListener('DOMContentLoaded', function() {
//     showCartItems();
//   });
  
//   function showCartItems() {
//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
//     var cartList = document.getElementById('cartItems');
  
//     // Clear existing cart items
//     cartList.innerHTML = '';
  
//     // Iterate over cart items and create list elements
//     cartItems.forEach(function(item) {
//       var li = document.createElement('li');
//       var title = document.createElement('span');
//       title.classList.add('item-title');
//       title.innerText = item.title;
//       var price = document.createElement('span');
//       price.classList.add('item-price');
//       price.innerText = item.price;
//       li.appendChild(title);
//       li.appendChild(price);
//       cartList.appendChild(li);
//     });
// }

// // Path: checkout.js
// function checkout() {
//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

//     // Send the cart items to the server for insertion into the database
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', 'order_details.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/json');

//     xhr.onreadystatechange = function () {
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             // If the insertion is successful, redirect to the payment page
//             window.location.href = "payment.php";
//         }
//     };

//     xhr.send(JSON.stringify(cartItems));
// }

//3
// var addItemId = 0;

// function addToCart(item) {
//     addItemId += 1;

//     var addToCartBtn = item.querySelector('button');
//     addToCartBtn.disabled = true;

//     var title = item.querySelector('h4').innerText;
//     var price = item.querySelector('.price-tag').innerText;
//     var imageSrc = item.querySelector('img').getAttribute('src');
//     var menuId = item.getAttribute('data-menu-id');
//     // Store the menuID in localStorage
//     localStorage.setItem('menuId', menuId);
//     // var menuId = item.menuId;
//     var quantity = 1; // Set the default quantity to 1

//     var selectedItem = {
//         menuId: menuId,
//         title: title,
//         price: price,
//         quantity: quantity
//     };

//     var selectedItemElement = document.createElement('div');
//     selectedItemElement.classList.add('cartItem');
//     selectedItemElement.setAttribute('id', 'item' + addItemId);

//     var img = document.createElement('img');
//     img.setAttribute('src', imageSrc);
//     img.classList.add('cartImg');
//     img.style.width = '120px';
//     img.style.height = '120px';

//     var titleElement = document.createElement('div');
//     titleElement.innerText = title;

//     var priceElement = document.createElement('div');
//     priceElement.innerText = price;

//     var quantityLabel = document.createElement('label');
//     quantityLabel.innerText = 'Quantity:';
//     var quantityInput = document.createElement('input');
//     quantityInput.type = 'number';
//     quantityInput.defaultValue = 1;
//     quantityInput.min = 1;
//     quantityInput.classList.add('quantity-input');
//     quantityLabel.appendChild(quantityInput);

//     var delBtn = document.createElement('button');
//     delBtn.innerText = 'Delete';
//     delBtn.classList.add('delete-btn');
//     delBtn.setAttribute('onclick', 'del(' + addItemId + ')');

//     selectedItemElement.append(img);
//     selectedItemElement.append(titleElement);
//     selectedItemElement.append(priceElement);
//     selectedItemElement.appendChild(quantityLabel);
//     selectedItemElement.append(delBtn);

//     // var cartItems = document.getElementById('title');
//     // cartItems.append(selectedItem);
//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
//     // cartItems.push(selectedItem.outerHTML);
//     cartItems.push(selectedItem);
//     // cartItems.push(selectedItem);
//     localStorage.setItem('cartItems', JSON.stringify(cartItems));

//     showCart();
// }

// // function del(item) {
// //     document.getElementById('item' + item).remove();

// //     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
// //     cartItems = cartItems.filter(function (cartItem) {
// //         return cartItem.indexOf('item' + item) === -1;
// //     });
// //     localStorage.setItem('cartItems', JSON.stringify(cartItems));

// //     showCart();
// // }

// function del(item) {
//     document.getElementById('item' + item).remove();

//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
//     cartItems = cartItems.filter(function (cartItem) {
//         return cartItem.id !== 'item' + item;
//     });
//     localStorage.setItem('cartItems', JSON.stringify(cartItems));

//     showCart();
// }
  

// function showCart() {
//     var cart = document.getElementById('cart');
//     cart.innerHTML = '';

//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

//     for (var i = 0; i < cartItems.length; i++) {
//         // var item = document.createElement('div');
//         // item.innerHTML = cartItems[i];
//         // cart.appendChild(item);

//         // var item = document.createElement('div');
//         // var title = document.createElement('h4');
//         // title.innerText = cartItems[i].title;
//         // item.appendChild(title);
//         // cart.appendChild(item);
//         var item = cartItems[i];
//         var title = item.title;
//         var menuId = item.menuId;
    
//         var itemElement = document.createElement('div');
//         itemElement.innerHTML = "<div>Menu ID: " + menuId + "</div><div>Title: " + title + "</div>";
//         cart.appendChild(itemElement);
        
//     }
// }

// showCart();

// document.addEventListener('DOMContentLoaded', function() {
//     showCartItems();
// });
  
// function showCartItems() {
//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
//     var cartList = document.getElementById('cartItems');
  
//     // Clear existing cart items
//     cartList.innerHTML = '';
  
//     // Iterate over cart items and create list elements
//     cartItems.forEach(function(item) {
//       var li = document.createElement('li');
//       var menuId = document.createElement('span');
//       menuId.classList.add('item-menuid');
//       menuId.innerText = "Menu ID: " + item.menuId;
//       var title = document.createElement('span');
//       title.classList.add('item-title');
//       title.innerText = item.title;
//       var price = document.createElement('span');
//       price.classList.add('item-price');
//       price.innerText = item.price;
//       li.appendChild(menuId);
//       li.appendChild(title);
//       li.appendChild(price);
//       cartList.appendChild(li);
//     });
// }

// // Path: checkout.js
// // function checkout() {
// //     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
// //     var menuId = localStorage.getItem('menuId'); // Retrieve the stored menuID

// //     // Create the order item with the menuID
// //     var orderItem = {
// //         menuId: menuId,
// //         items: cartItems
// //     };

// //     // Send the cart items to the server for insertion into the database
// //     var xhr = new XMLHttpRequest();
// //     xhr.open('POST', 'order_details.php', true);
// //     xhr.setRequestHeader('Content-Type', 'application/json');

// //     xhr.onreadystatechange = function () {
// //         if (xhr.readyState === 4 && xhr.status === 200) {
// //             // If the insertion is successful, redirect to the payment page
// //             window.location.href = "payment.php";
// //         }
// //     };

// //     xhr.send(JSON.stringify(cartItems));
// // }

// function checkout() {
//     var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
  
//     // Iterate over cart items and create order items for each
//     for (var i = 0; i < cartItems.length; i++) {
//         var menuId = cartItems[i].menuId;

//         // Create the order item with the menuID
//         var orderItem = {
//             menuId: menuId,
//             items: [cartItems[i]]
//         };

//         // Send the order item to the server for insertion into the orderitem table
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', 'order_details.php', true);
//         xhr.setRequestHeader('Content-Type', 'application/json');

//         xhr.onreadystatechange = function () {
//             if (xhr.readyState === 4 && xhr.status === 200) {
//                 // If the insertion is successful, redirect to the payment page
//                 window.location.href = "payment.php";
//             }
//         };

//         xhr.send(JSON.stringify(orderItem));
//     }
// }