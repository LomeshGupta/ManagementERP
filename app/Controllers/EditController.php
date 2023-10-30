<?php

namespace App\Controllers;

use App\Models\UserSetup;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Libraries\Password;
use PHPUnit\Framework\Constraint\IsEmpty;

class EditController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('users/edit.php', $data);
    }

    public function edit()
    {
        // echo $id.$value;
        if (isset($_POST['value']) && isset($_POST['name']) && isset($_POST['id'])) {
            $username = trim(preg_replace('/\s+/', ' ', $_POST['id']));
            $val = trim(preg_replace('/\s+/', ' ', $_POST['value']));
            $field = trim(preg_replace('/\s+/', ' ', $_POST['name']));
            $userModel = new UserSetup();
            $userModel->set($field, $val)->where('username', $username)->update();
            echo 1;
        } else {
            echo 0;
        }
        exit;
    }

    public function updateuser($id)
    {
        helper(['form']);
        $pass = new Password();
        // if ($this->validate($rules)) {
        $userModel = new UserModel();
        $userSetup = new UserSetup();
        $usern = $userModel->where('id', $id)->find();
        $imageFile = $this->request->getFile('file');
        $newName = '';
        $a = $imageFile->guessExtension();
        if (!empty($a)) {
            $newName = $imageFile->getRandomName();
            $imageFile->move('../public/uploads', $newName);
            $data = [
                'Image' => $newName,
                'type'  => $imageFile->getClientMimeType()
            ];
            $userModel->update($id, $data);
        }
        if ($usern[0]['password'] == $this->request->getVar('password')){
        }else
        {
            $data = [
                'password' => $pass->create_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $userModel->update($id, $data);
        }
        $data = [
            'username' => $this->request->getVar('username'),
            'name'     => $this->request->getVar('name'),
            'email'    => $this->request->getVar('email'),
            'gender'  => $this->request->getVar('gender'),
            'mobile' => $this->request->getVar('mobile'),
            'designation' => $this->request->getVar('designation'),
            'status' => $this->request->getVar('status')
        ];
        $done = $userModel->update($id, $data);
        $userSetup->set('username',$this->request->getVar('username') )->where('username', $usern[0]['username'])->update();
        if ($done) {
            return redirect()->to(base_url('userlist'));
        } else {
            $data['validation'] = $this->validator;
            echo view('base/header');
            echo view('users/signup', $data);
        }
    }
}
