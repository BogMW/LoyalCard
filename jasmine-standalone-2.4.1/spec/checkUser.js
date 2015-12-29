describe('Check user', function(){
    it('should return true if user correct and return false if wrong user', function(){
        expect(enterToShop('AA', '0050906598')).toEqual('True');
    }) ;
});
