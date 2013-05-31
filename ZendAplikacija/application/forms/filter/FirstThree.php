<?php

class My_FirstThree implements Zend_Filter_Interface
{

    public function filter($value)
    {


        if(isset($value))
        {
            $firstThree = substr($value,0,3);
            $valueFiltered = $firstThree.'_000';

            return $valueFiltered;
        }
    }

}

?>
