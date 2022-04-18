<?php

namespace App\Controllers;

use App\Models\AccountsModel;

class Awesome extends BaseController
{
    protected $accountsModel;
    
    public function __construct()
    {
        $this->accountsModel = new AccountsModel();
    }

    public function index()
    {
        $accounts = $this->accountsModel->findAll();
        $identitas = [
            'css' => '/cssFile/style.css',
            'title' => 'Login',
            'accounts' => $accounts
        ];
        
       return view('/Pages/index', $identitas);
    }

    public function save() 
    {
        
        if(!$this->validate([
            'username' => 'is_unique[accounts.username]'
        ])) {
            return redirect()->to('Awesome/gagal');
        }
        
        $namaGambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/' . $namaGambar);
        if(empty($namaGambar))
        $namaGambar = 'default.png';
        
        $password = $this->request->getVar('password');

        $this->accountsModel->save([
            'fname' => $this->request->getVar('fname'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'bdate' => $this->request->getVar('bdate'),
            'gender' => $this->request->getVar('gender'),
            'status' => $this->request->getVar('status'),
            'bio' => $this->request->getVar('bio'),
            'gambar' => $namaGambar
        ]);
        
        return redirect()->to('/Awesome/berhasil');
    }

    public function berhasil() 
    {
        $identitas = [
            'css' => '/cssFile/styleRegist.css',
            'title' => 'Register'
        ];

       return view('/Pages/register', $identitas);
    }

    public function gagal()
    {
        $identitas = [
            'css' => '/cssFile/styleAuthenticate.css',
            'title' => 'Register'
        ];

        return view('/Pages/gagal', $identitas);
    }

    public function auth()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->accountsModel->where('username', $username)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to("/Awesome/home/" . $data['id']);
            }else{  
                return redirect()->to('/Awesome/gagalLogin');
            }
        }else{
            return redirect()->to('/Awesome/gagalLogin');
        }
    }

    public function gagalLogin()
    {
        $identitas = [
            'css' => '/cssFile/styleAuthenticate.css',
            'title' => 'Error Login'
        ];
        
        return view('/Pages/gagalLogin', $identitas);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Awesome');
    }
    
    public function home($id)
    {
        session();
        $identitas = [
            'css' => '/cssFile/styleHome.css',
            'title' => 'Home Page',
            'account' => $this->accountsModel->getId($id)
        ];
        return view('Pages/home', $identitas);
    }

    public function edit($id)
    {
        session();
        $identitas = [
            'css' => '/cssFile/styleEdit.css',
            'title' => 'Home Page',
            'account' => $this->accountsModel->getId($id)
        ];
        return view('Pages/edit', $identitas);
    }

    public function delete($id) 
    {
        $this->accountsModel->delete($id);
        return redirect()->to("/Awesome");
    }
    
    public function update($id)
    {   
        $namaGambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/' . $namaGambar);
        if(empty($namaGambar)) {
            $namaGambar = $this->request->getVar('gambar1');
        }

        $username = $this->request->getVar('username');
        $usernameLama = $this->accountsModel->getId($id);
        
        $kondisi = true;
        if($username == $usernameLama['username'])
            $kondisi = false;
        
        if($kondisi) {
            if(!$this->validate([
                'username' => 'is_unique[accounts.username]'
            ])) {
                session()->setFlashdata('eror', 'Username is already use by another user');
                return redirect()->to("/Awesome/edit/$id");
            }
        }

        $password = $this->request->getVar('password');
        
        if($password == null) 
            $password = $this->request->getVar('password1');
        else 
           $password = password_hash($password, PASSWORD_DEFAULT);

        $gender = $this->request->getVar('gender1');
        if($gender == null) 
            $gender = $this->request->getVar('gender');

        $this->accountsModel->save([
            'id' => $id,
            'fname' => $this->request->getVar('fname'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'bdate' => $this->request->getVar('bdate'),
            'gender' => $gender,
            'status' => $this->request->getVar('status'),
            'bio' => $this->request->getVar('bio'),
            'gambar' => $namaGambar,
        ]);
        
        return redirect()->to("/Awesome/home/$id");
    }
    
}