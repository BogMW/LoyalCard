function cartSumm(arr){
    var summ = 0;
    if(arr.length > 0) {
        summ = 0;
        arr.forEach(function (item, i){
            summ += +item.price;
        });
    }
    return summ;
}
