<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'image' => $session->get('image'),
        );
        if ($data['user']['name']) {
            echo view('base/header.php',$data);
            echo view('base/dashboard', $data);
        }
        else{
            return redirect()->to(base_url('signin'));
        }
    }
}
