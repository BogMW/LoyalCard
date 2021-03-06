// Array of products with 'name', 'price', and link to photo
var  phones = [
    {   name: 'SamsungGalaxyS6',
        photo: 'url("../images/samsung-galaxy-s6.jpg")',
        price: '15999'    },

    {   name: 'LgG4',
        photo: 'url("../images/LG-G4.jpg")',
        price: '14999'    },

    {   name: 'SonyXperiaZ5',
        photo: 'url("../images/sony_xperia_z5.jpg")',
        price: '16999'    },

    {   name: 'AppleiPhone6',
        photo: 'url("../images/iPhone-6.jpg")',
        price: '21499'    },

    {   name: 'HTCOneM9',
        photo: 'url("../images/HTC-One-M9.jpg")',
        price: '17999'    },

    {   name: 'MicrosoftLumia950',
        photo: 'url("../images/nokia_lumia_950.jpg")',
        price: '18999'    }
];

//Create one element of product

function CreatePhone (id){
    var phone = document.createElement('div');
    phone.id = 'phone';
    phone.className = 'phone';
    phone.style.display = 'inline-block';
    products.appendChild(phone);
    var images = document.createElement('div');
    var names = document.createElement('div');
    var prices = document.createElement('div');
    var enter = document.createElement('input');
    images.className = "picture";
    names.className = "name";
    prices.className = "price";
    images.style.background = phones[id].photo + 'no-repeat';
    names.innerHTML = phones[id].name;
    prices.innerHTML = phones[id].price;
    enter.type = 'button';
    enter.value = 'Add to cart';
    enter.id = id;
    enter.setAttribute('onclick', "addToCart (this.getAttribute('id'))");
    phone.appendChild(images);
    phone.appendChild(names);
    phone.appendChild(prices);
    phone.appendChild(enter);
}

//Generate all products from array

function Creator() {
    for (i = 0; i < phones.length; i++) {
        CreatePhone(i);
    }
}

// Emulate of login with one series and number check

function enterToShop(series, number){
    if (series === 'AA' && number === '0050906598') {
        document.getElementById('login-popup').style.display = 'none';
        document.getElementById('cart-series').innerHTML = series;
        document.getElementById('cart-number').innerHTML = number;
        return true;
    } else {
        alert('User with this card not exist! Check your data.');
        return false;
    }
}


var summ = 0;
var cart = [];

//Add product to cart after clicking on "Add to cart" button

function addToCart (id){
cart.push(phones[id]);
    cartSumm(cart);
    updateCart();
    if (document.getElementById('totalPrice').getAttribute('onclick') == 'closeDetail()') {
        closeDetail();
    }
}

// Generate and show cart

function showCart() {
    var cart = document.createElement('div');
    cart.id = 'cart';
    cart.className = 'cart';
    cart.style.cursor = 'pointer';
    cartContainer.appendChild(cart);
    var totalPrice = document.createElement('h2');
    totalPrice.className = 'totalPrice';
    totalPrice.id = 'totalPrice';
    totalPrice.innerHTML = 'Total price of your order is';
    totalPrice.setAttribute('onclick', "detail()");
    cart.appendChild(totalPrice);
    var orderSumm = document.createElement('div');
    orderSumm.id = 'orderSumm';
    orderSumm.class = 'orderSumm';
    orderSumm.innerHTML = summ + 'UAH';
    orderSumm.setAttribute('onclick', "detail()");
    cart.appendChild(orderSumm);
    var edit = document.createElement('input');
    edit.type = 'button';
    edit.value = 'Confirm';
    edit.id = 'edit';
    edit.setAttribute('onclick', "sendDate()");
    cart.appendChild(edit);
}

// Calculate total summ of all products

function cartSumm(arr){
    if(cart.length > 0) {
        summ = 0;
        arr.forEach(function (item, i){
            summ += +item.price;
        });
    }
    return summ;
}

var counter = 0;

//Update cart total price when added new product

function updateCart(){
    if(counter == 0) {
        showCart();
        counter++;
    } else {
        orderSumm.innerHTML = summ + 'UAH';
    }
}


// Create detail cart

function detail() {
    document.getElementById('cart').style.backgroundColor = 'white';
    document.getElementById('cart').style.borderRadius = '10px';
    document.getElementById('cart').style.border = '1px solid darkcyan';
    document.getElementById('cart').style.padding = '10px';
    var list = document.createElement('ul');
    list.id = 'list';
    list.style.listStyle = 'none';
    document.getElementById('cart').insertBefore(list, edit);
    function cartDetail() {
        for (i = 0; i < cart.length; i++) {
            CreateCartDetail(i);
        }
    }
    cartDetail();
    document.getElementById('totalPrice').removeAttribute('onclick');
    document.getElementById('totalPrice').setAttribute('onclick', "closeDetail()");
    document.getElementById('orderSumm').removeAttribute('onclick');
    document.getElementById('orderSumm').setAttribute('onclick', "closeDetail()");
}

//Generate list of products in detail cart

function CreateCartDetail(id){
    var pos = document.createElement('li');
    pos.innerHTML = cart[id].name + ' - ' + cart[id].price + 'UAH';
    document.getElementById('list').appendChild(pos);
}

// Close the detail cart

function closeDetail(){
    document.getElementById('cart').style.backgroundColor = '';
    document.getElementById('cart').style.borderRadius = '';
    document.getElementById('cart').style.border = '';
    document.getElementById('cart').style.padding = '';
    document.getElementById('cart').removeChild(document.getElementById('list'));
    document.getElementById('totalPrice').removeAttribute('onclick');
    document.getElementById('totalPrice').setAttribute('onclick', "detail()");
    document.getElementById('orderSumm').removeAttribute('onclick');
    document.getElementById('orderSumm').setAttribute('onclick', "detail()");
}

function sendDate() {
    $.ajax({
        type: 'POST',
        url: 'shop.php',
        data: {
            "cartNumber": $("#cart-number").text(),
            "cartSumm": parseInt($("#orderSumm").text())
        },
        success: function () {
            if (summ == 0) {
                alert('Add new products to cart');
            } else {
                alert('Thank you!');
            }
            summ = 0;
           cart = [];
            orderSumm.innerHTML = 0;
        }
    })
}