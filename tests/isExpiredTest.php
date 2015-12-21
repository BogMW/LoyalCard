<?php
require_once ('E:\OpenServer\OpenServer\domains\LoyalCard\isExpired.php');


class isExpiredTest extends PHPUnit_Framework_TestCase
{
    private $isExpired;

    protected function setUp()
    {
        $this->isExpired = new isExpired();
    }

    protected function tearDown()
    {
        $this->isExpired = NULL;
    }
    /**
     * @dataProvider provider
     */
    public function testCheckExpiredDate($a, $b){

        $this->assertTrue($this->isExpired->checkExpiredDate($a, $b));
    }
    public function provider()
    {
        return array(
            array("2017-12-21", "2015-12-21"),
            array("2015-12-21", "2015-12-21"),
            array("2014-12-21", "2015-12-21")
        );
    }
}
