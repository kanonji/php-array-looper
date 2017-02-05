<?php
namespace Kanonji\Utility\Tests;

use PHPUnit\Framework\TestCase;
use Kanonji\Utility\ArrayRandomLooper;

class ArrayRandomLooperTest extends TestCase{

    public function setup(){}

    public function test_AbleToGetValuesCircularly(){
        $array = [10, 20, 30];
        $arrayLooper = new ArrayRandomLooper($array);

        $expected = [10, 10, 10, 20, 20, 20, 30, 30, 30];
        $actual = [];
        for($i = 0; $i < count($expected); ++$i){
            $actual[] = $arrayLooper->draw();
        }
        $this->assertNotEquals($expected, $actual);
        sort($actual);
        $this->assertEquals($expected, $actual);
    }
}
