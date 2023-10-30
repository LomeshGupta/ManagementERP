<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\UserSetup;
use App\Libraries\Password;

class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'image' => $session->get('image'),
        );
        if ($data['user']['name']) {
            echo view('base/header.php', $data);
            echo view('users/signup.php', $data);
        } else {
            return redirect()->to(base_url('signin'));
        }
    }
    public function edituser()
    {
        $id = $_POST['user'];
        $session = session();
        $data['user'] = array(
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'image' => $session->get('image'),
        );
        $userModel = new UserModel();
        $data['users'] = $userModel->find($id);
        if ($data['user']['name']) {
            echo view('base/header.php', $data);
            echo view('users/updateuser.php', $data);
        } else {
            return redirect()->to(base_url('signin'));
        }
    }

    public function store()
    {
        helper(['form']);
        // $rules = [
        //     'name'          => 'required|min_length[2]|max_length[50]',
        //     'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email]',
        //     'image' => 'uploaded[file]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[file,10000]',
        //     'password'      => 'required|min_length[4]|max_length[50]'
        // ];
        $pass = new Password();

        // if ($this->validate($rules)) {
        $userModel = new UserModel();
        $userSetup = new UserSetup();
        $newName = '';
        $imageFile = $this->request->getFile('file');
        if (!empty($imageFile->guessExtension())) {
            $newName = $imageFile->getRandomName();
            $imageFile->move('../public/uploads', $newName);
        }
        $data = [
            'username' => $this->request->getVar('username'),
            'name'     => $this->request->getVar('name'),
            'email'    => $this->request->getVar('email'),
            'Image' =>  $newName,
            'type'  => $imageFile->getClientMimeType(),
            'password' => $pass->create_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'gender'  => $this->request->getVar('gender'),
            'mobile' => $this->request->getVar('mobile'),
            'designation' => $this->request->getVar('designation'),
            'status' => $this->request->getVar('status')
        ];
        $data2 = [
            'username' => $this->request->getVar('username')
        ];
        $done = $userModel->save($data);
        $userSetup->save($data2);
        if ($done) {
            return redirect()->to(base_url('userlist'));
        } else {
            $data['validation'] = $this->validator;
            echo view('base/header');
            echo view('users/signup', $data);
        }
    }
}
