<?php
namespace Kanonji\Utility;

class ArrayRandomLooper extends ArrayLooper{
    protected function generatorize($array){
        rewind:
        shuffle($array);
        foreach($array as $key => $elem){
            yield $key => $elem;
        }
        goto rewind;
    }
}
