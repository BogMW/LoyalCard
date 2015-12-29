describe('Calculate summ', function(){
    it('should return summ of price in array, that consist of object', function(){
        expect(cartSumm([{price:5},{price:10},{price:1},{price:4} ])).toEqual(20);
    }) ;
    it('should return summ of price in array, that consist of object', function(){
        expect(cartSumm([{price:5},{price:10},{price:1},{price:4} ])).toEqual(19);
    }) ;
    it('should return summ of price in array, that consist of object', function(){
        expect(cartSumm([{price:1},{price:0},{price:1},{price:0} ])).toEqual(2);
    }) ;
});
