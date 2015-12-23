<?php
require_once('E:\OpenServer\OpenServer\domains\LoyalCard\addSumm_class.php');


class addSumm_classTest extends PHPUnit_Framework_TestCase
{
    private $addSumm;

    protected function setUp()
    {
        $this->addSumm = new addSumm_class();
    }

    protected function tearDown()
    {
        $this->addSumm = NULL;
    }
    /**
     * @dataProvider provider
     */
    public function testAddSumm($a, $b){

        $this->assertEquals($b ,$this->addSumm->addSumm($a));

    }
    public function provider()
    {
        return array(
            array([20, 50, 30], 100),
            array([100, 0, 100], 200),
            array([1, 1, 1, 1, 1, 1, 1, 1, 1, 1], 10)
        );
    }
}