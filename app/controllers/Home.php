<?php

class Home extends Controller

{
    public function index()
    {
        $this->view('home');
    }

    public function edit($id)
    {
        echo "Home Page - Edit".$id;
    }

    public function delete($id)
    {
        echo "Home Page - Delete".$id;
    }
}