<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\UserSetup;
  
class ProfileController extends Controller
{
    public function index()
    {
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'file_name' => $session->get('file_name'),
        );
        echo view('profile',$data);
    }
    public function Userlist()
    {
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'image' => $session->get('image'),
        );
        $userModel = new UserModel();
        $data['all'] = $userModel->findall();
        if ($data['user']['name']) {
            echo view('base/header',$data);
        echo view('users/userlist',$data);
        }
        else{
            return redirect()->to(base_url('signin'));
        }
    }
    public function usersetup()
    {
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'image' => $session->get('image'),
        );
        $userModel = new UserSetup();
        $data['usersetup'] = $userModel->findall();
        if ($data['user']['name']) {
            echo view('base/header',$data);
        echo view('users/usersetup',$data);
        }
        else{
            return redirect()->to(base_url('signin'));
        }
    }

    public function chat()
    {
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'image' => $session->get('image'),
        );
        echo view('base/header',$data);
        echo view('chat');
    }
}