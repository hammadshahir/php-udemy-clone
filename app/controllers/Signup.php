<?php
/**
 * Singup class
 */

class Signup extends Controller
{
    public function index()
    {
        $user = new User();
        if($user->validate($_POST))
        {
            $_POST['createDate'] = date("Y-m-d H:i:s");
            $user->insert($_POST);
        }

        $data['title'] = 'Singup';
        $this->view('signup', $data);
    }

    public function show()
    {
       
    }
}