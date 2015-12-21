<?php

require_once ('E:\OpenServer\OpenServer\domains\LoyalCard\checkSeries.php');


class checkSeriesTest extends PHPUnit_Framework_TestCase
{
    private $checkSeries;

    protected function setUp()
    {
        $this->checkSeries = new checkSeries();
    }

    protected function tearDown()
    {
        $this->checkSeries = NULL;
    }
    /**
     * @dataProvider provider
     */
    public function testCheckRecordSeries($a, $b){

        $this->assertEquals($b, $this->checkSeries->checkRecordSeries($a));
    }
    public function provider()
    {
        return array(
            array('AA',"AA"),
            array('aa', "AA"),
            array('a1', "Digits not allowed in Series"),
            array('a', 'Series must contain 2 symbol')

        );
    }
}