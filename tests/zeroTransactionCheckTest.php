<?php

require_once ('E:\OpenServer\OpenServer\domains\LoyalCard\zeroTransactionCheck.php');


class zeroTransactionCheckTest extends PHPUnit_Framework_TestCase
{
    private $zeroTransactionCheck;

    protected function setUp()
    {
        $this->zeroTransactionCheck = new zeroTransactionCheck();
    }

    protected function tearDown()
    {
        $this->zeroTransactionCheck = NULL;
    }
    /**
     * @dataProvider provider
     */
    public function testZeroCheck($a, $b){

        $this->assertEquals($b, $this->zeroTransactionCheck->zeroCheck($a));
    }
    public function provider()
    {
        return array(
            array(12345,12345),
            array(0.1, 'Transaction can\'t equal or be less than zero'),
            array(-12345, 'Transaction can\'t equal or be less than zero'),
        );
    }
}