<?php

require_once ('E:\OpenServer\OpenServer\domains\LoyalCard\paginator_class.php');


class paginator_classTest extends PHPUnit_Framework_TestCase
{
    private $paginator;

    protected function setUp()
    {
        $this->paginator = new paginator();
    }

    protected function tearDown()
    {
        $this->paginator = NULL;
    }
    /**
     * @dataProvider provider
     */
    public function testCheckRecordCount($a, $b, $c){

        $this->assertEquals($c, $this->paginator->checkRecordCount($a, $b));
    }
    public function provider()
    {
        return array(
            array(100, 10, "There is shown 10 of 100 records"),
            array(50, 20, "There is shown 20 of 50 records"),
            array(100, 20, "There is shown 10 of 100 records"),
            array(9, 8, NULL)
        );
    }
}
