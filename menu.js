const products = [
    {
        id: 1,
        image: 'image/cake.jpg',
        title: 'Strawberry Berry Cake',
        price: 10,
    },
    {
        id: 1,
        image: 'image/cake1.jpg',
        title: 'cake apa tu',
        price: 20,
    },
    {
        id: 2,
        image: 'image/cake2.jpg',
        title: 'cake ka',
        price: 20,
    },
    {
        id: 3,
        image: 'image/cake3.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/cake4.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/cake5.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/pastry.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/pastry1.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/pastry2.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/pastry3.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/pastry4.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/pastry5.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/dessert.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/dessert1.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/dessert2.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/dessert3.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/dessert4.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    {
        id: 3,
        image: 'image/dessert5.jpg',
        title: 'cake rasa apa',
        price: 20,
    },
    
];

const categories = [...new Set(products.map((item)=>
    {return item}))]
    let i = 0;
document.getElementById('root').innerHTML = categories.map((item)=>
{
    var {image, title, price} = item;
    return(
        `<div class='box'>
            <div class='img-box'>
                <img class='images' src=${image}></img>
            </div>
        <div class='bottom'>
        <p>${title}</p>
        <h2>RM ${price}.00</h2>` +
        "<button onclick='addtocart("+(i++)+")'>Add to cart</button>"+
        `</div>
        </div>`
    )
}).join('');

var cart = [];

function addtocart(a){
    cart.push({...categories[a]});
    displayCart();
}

function delElement(a){
    cart.splice(a, 1);
    displayCart();
}

function displayCart(a){
    let j = 0, total = 0;
    document.getElementById('count').innerHTML = cart.length;
    if(cart.length == 0){
        document.getElementById('cartItem').innerHTML = "Your cart is empty";
        document.getElementById("total").innerHTML = "RM "+0+".00";
    }
    else{
        document.getElementById('cartItem').innerHTML = cart.map((items)=>
        {
            var {image, title, price} = items;
            total += price;
            document.getElementById("total").innerHTML = "RM "+total+".00";
            return(
                `<div class='cart-item'>
                <div class='row-img'>
                    <img class='rowimg' src=${image}>
                </div>
                <p style=font-size:18px;'>${title}</p>
                <h2 style='font-size: 18px;'>RM ${price}.00</h2>` +
                "<i class='fa-solid fa-trash' onclick='delElement("+ (j++) +")'></i></div>"
            );
        }).join('');
    }
}

function submitOrder() {
    // Calculate the total amount
    let total = 0;
    cart.forEach((item) => {
      total += item.price;
    });
  
    // Create an object with the necessary data
    const order = {
      custID: 'custID', // Replace with your customer ID or retrieve it dynamically
      orderDate: new Date().toISOString().slice(0, 10), // Current date in YYYY-MM-DD format
      orderTime: new Date().toISOString().slice(11, 19), // Current time in HH:MM:SS format
      amount: total,
    };
  
    // Send a POST request to the server to store the order
    fetch('/store-order', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(order),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log('Order stored successfully:', data);
        // Optionally, you can perform additional actions here, such as displaying a success message or redirecting the user to a confirmation page.
      })
      .catch((error) => {
        console.error('Error storing order:', error);
        // Handle the error appropriately, e.g., display an error message to the user.
      });
  }
  