<?php

require_once ('E:\OpenServer\OpenServer\domains\LoyalCard\checkNumberLength.php');


class checkSeriesTest extends PHPUnit_Framework_TestCase
{
    private $checkNumberLength;

    protected function setUp()
    {
        $this->checkNumberLength = new checkNumberLength();
    }

    protected function tearDown()
    {
        $this->checkNumberLength = NULL;
    }
    /**
     * @dataProvider provider
     */
    public function testCheckNumber($a, $b){

        $this->assertEquals($b, $this->checkNumberLength->checkNumber($a));
    }
    public function provider()
    {
        return array(
            array('0123456789','0123456789'),
            array('012345678', 'Number must contain 10 digits, but this number have 9'),
            array('01234567890', 'Number must contain 10 digits, but this number have 11'),
        );
    }
}