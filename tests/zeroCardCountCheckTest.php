<?php

require_once ('E:\OpenServer\OpenServer\domains\LoyalCard\zeroCardCountCheck.php');


class zeroCardCountCheckTest extends PHPUnit_Framework_TestCase
{
    private $zeroCardCountCheck;

    protected function setUp()
    {
        $this->zeroCardCountCheck = new zeroCardCountCheck();
    }

    protected function tearDown()
    {
        $this->zeroCardCountCheck = NULL;
    }
    /**
     * @dataProvider provider
     */
    public function testzeroCountCheck($a, $b){

        $this->assertEquals($b, $this->zeroCardCountCheck->zeroCountCheck($a));
    }
    public function provider()
    {
        return array(
            array(100,100),
            array(0, 'You must choose at least 1 card'),
            array(-9, 'You must choose at least 1 card'),
        );
    }
}