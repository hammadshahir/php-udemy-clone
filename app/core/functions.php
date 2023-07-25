<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";

}

function setValue($key)
{
    if(!empty($_POST[$key]))
    {
        return $key;
    }

    return '';
}