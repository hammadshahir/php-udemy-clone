<?php
/**
 * Admin class
 */

 class Admin extends Controller
 {
    public function index()
    {
        $data['title'] = "Admin";
        $this->view('admin/dashboard', $data);
    }

    public function profile($id = null)
    {
        $data['title'] = "Profile";
        $this->view('admin/profile', $data);
    }

    
 }