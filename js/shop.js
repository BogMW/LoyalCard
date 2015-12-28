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
    var images = document.createElement('div');
    var names = document.createElement('div');
    var prices = document.createElement('div');
    images.className = "picture";
    names.className = "name";
    prices.className = "price";
    images.style.background = phones[id].photo + 'no-repeat';
    names.innerHTML = phones[id].name;
    prices.innerHTML = phones[id].price;
    document.body.appendChild(images);
    document.body.appendChild(names);
    document.body.appendChild(prices);
}

function Creator() {
    for (i = 0; i < phones.length; i++) {
        CreatePhone(i);
    }
}
