<?php


class Product
{

    public function getProduct()
    {

        if (array_key_exists('basket', $_POST)) {
            $content = (json_decode($_POST['basket']));
            $contents = (json_decode($content));
             var_dump($contents);
           
        }
    }
}
