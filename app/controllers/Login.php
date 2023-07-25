<?php
/***
 * Login
 */

 class Login extends Controller
 {
    function index()
    {
        $data['title'] = 'Login';
        return $this->view('login', $data);
    }
 }

