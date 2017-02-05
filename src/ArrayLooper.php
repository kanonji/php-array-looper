<?php
namespace Kanonji\Utility;

class ArrayLooper{
    protected $originalArray;
    protected $generator;

    public function __construct($array){
        $this->originalArray = $array;
        $this->generator = $this->generatorize($array);
    }

    public function draw(){
        $value = $this->generator->current();
        $this->generator->next();
        return $value;
    }

    public function drawKey(){
        $key = $this->generator->key();
        $this->generator->next();
        return $key;
    }

    public function drawWithKey(){
        $value = $this->generator->current();
        $key = $this->generator->key();
        $this->generator->next();
        return [$key => $value];
    }

    protected function generatorize($array){
        rewind:
        foreach($array as $key => $elem){
            yield $key => $elem;
        }
        goto rewind;
    }
}
