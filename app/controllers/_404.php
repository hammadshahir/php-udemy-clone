<?php

class _404 extends Controller
{
    function index()
    {
       $data['title'] = "404 | Page Not Found";
       $this->view('404', $data);
    } //End of function index
}