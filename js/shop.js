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

function Creator() {
    for (i = 0; i < phones.length; i++) {
        CreatePhone(i);
    }
}

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

function addToCart (id){
cart.push(phones[id]);
    cartSumm(cart);
    updateCart();
}

function cartSumm(arr){
    if(cart.length > 0) {
        summ = 0;
        arr.forEach(function (item, i){
            summ += +item.price;
        });
    }
    return summ;
}

function showCart() {
    var cart = document.createElement('div');
    cart.id = 'cart';
    cart.className = 'cart';
    cartContainer.appendChild(cart);
    var totalPrice = document.createElement('h2');
    totalPrice.className = 'totalPrice';
    totalPrice.innerHTML = 'Total price of your order is';
    cart.appendChild(totalPrice);
    var orderSumm = document.createElement('div');
    orderSumm.id = 'orderSumm';
    orderSumm.class = 'orderSumm';
    orderSumm.innerHTML = summ + 'UAH';
    cart.appendChild(orderSumm);
}

var counter = 0;

function updateCart(){
    if(counter == 0) {
        showCart();
        counter++;
    } else {
        orderSumm.innerHTML = summ + 'UAH';
    }
}