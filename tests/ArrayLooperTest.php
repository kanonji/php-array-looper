<?php
namespace Kanonji\Utility\Tests;

use PHPUnit\Framework\TestCase;
use Kanonji\Utility\ArrayLooper;

class ArrayLooperTest extends TestCase{

    public function setup(){}

    public function test_AbleToGetValuesCircularly(){
        $array = [10, 20, 30];
        $arrayLooper = new ArrayLooper($array);

        $expected = [10, 20, 30, 10, 20, 30, 10, 20, 30];
        $actual = [];
        for($i = 0; $i < count($expected); ++$i){
            $actual[] = $arrayLooper->draw();
        }
        $this->assertEquals($expected, $actual);
    }

    public function test_AbleToGetKeysCircularly(){
        $array = [10, 20, 30];
        $arrayLooper = new ArrayLooper($array);

        $expected = [0, 1, 2, 0, 1, 2, 0, 1, 2];
        $actual = [];
        for($i = 0; $i < count($expected); ++$i){
            $actual[] = $arrayLooper->drawKey();
        }
        $this->assertEquals($expected, $actual);
    }

    public function test_AbleToGetKeyValuesCircularly(){
        $array = [10, 20, 30];
        $arrayLooper = new ArrayLooper($array);

        $expected = [[0 => 10], [1 => 20], [2 => 30], [0 => 10], [1 => 20], [2 => 30], [0 => 10], [1 => 20], [2 => 30]];
        $actual = [];
        for($i = 0; $i < count($expected); ++$i){
            $actual[] = $arrayLooper->drawWithKey();
        }
        $this->assertEquals($expected, $actual);
    }
}
