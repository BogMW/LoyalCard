<?php
require_once('E:\OpenServer\OpenServer\domains\LoyalCard\countOfSumm_class.php');


class countOfSumm_classTest extends PHPUnit_Framework_TestCase
{
    private $countOfSumm;

    protected function setUp()
    {
        $this->countOfSumm = new countOfSumm_class();
    }

    protected function tearDown()
    {
        $this->countOfSumm = NULL;
    }
    /**
     * @dataProvider provider
     */
    public function testCountOfSumm($a, $b){

        $this->assertEquals($b ,$this->countOfSumm->countOfSumm($a));

    }
    public function provider()
    {
        return array(
            array([20, 50, 30], 3),
            array([100, 0, 100], 2),
            array([1, 1, 1, 1, 1, 1, 1, 1, 1, 1], 10)
        );
    }
}