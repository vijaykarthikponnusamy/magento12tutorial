<?php
namespace Ziffity\Feedback\Test\Unit\Model;

class TestCalculator extends \PHPUnit\Framework\TestCase 
{

    protected $objectManager;
    protected $model;

    public function setUp():void 
    {
        $this->objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->model = $this->objectManager->getObject("Ziffity\Feedback\Model\Calculator");
    }

    public function testAdd() {

        $result = $this->model->add(10, 5);

        $expectedResult = 15;

        $this->assertEquals($expectedResult, $result);

    }

}