<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Libraries\Password;
  
class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('base/signin');
    } 
  
    public function loginAuth() 
    {
        $session = session();
        $userModel = new UserModel();
        $name = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $userModel->where('username', $name)->first();
        $pas = new Password();
        if($data){
            $pass = $data['password'];;
            $auth =$pas->validate_password($password, $pass);

            if($auth){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'image' => $data['Image'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url());
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }
}