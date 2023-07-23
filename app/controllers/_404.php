<?php

class _404
{
    function index()
    {
       $data['title'] = "404";
       $this->view('404', $data);
    }
}