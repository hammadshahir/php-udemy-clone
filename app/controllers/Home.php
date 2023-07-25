<?php

class Home extends Controller

{
    public function index()
    {
        $data['title'] = 'Home';

        $this->view('home', $data);
    }

    public function edit($id)
    {
        echo "Home Page - Edit".$id;
    }

    public function update($id)
    {
        echo "Home Page - Update".$id;
    }

    public function delete($id)
    {
        echo "Home Page - Delete".$id;
    }
}