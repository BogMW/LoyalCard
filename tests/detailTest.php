<?php
require_once ('E:\OpenServer\OpenServer\domains\LoyalCard\detail.php');


class detailTest extends PHPUnit_Framework_TestCase
{
    private $detail;

    protected function setUp()
    {
        $this->detail = new detail();
    }

    protected function tearDown()
    {
        $this->detail = NULL;
    }
    /**
     * @dataProvider provider
     */
    public function testAddSumm($a, $b, $c){

        $this->assertEquals($b ,$this->detail->AddSumm($a));
        $this->assertEquals($c ,$this->detail->CountOfSumm($a));
    }
    public function provider()
    {
        return array(
            array([20, 50, 30], 100, 3),
            array([100, 0, 100], 200, 2),
            array([1, 1, 1, 1, 1, 1, 1, 1, 1, 1], 10, 10)
        );
    }
}