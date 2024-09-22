<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class User extends Controller
{
    protected $helpers = ['url', 'form'];
    // Login function
    public function getList()
    {
        $userModel = new \App\Models\UserModel();
        $data['users'] = $userModel->findAll();
        $data['content'] = view('user/list', $data);
        echo view('user/list', $data);
    }
    
    public function getLogin()
    {
        $data['content'] = view('user/login');
        echo view('user/login', $data);
    }
    public function getEdit()
    {
        $data['content'] = view('user/edit');
        echo view('user/edit', $data);
    }

    public function getCar()
    {
        $data['content'] = view('user/car');
        echo view('user/car', $data);
    }


    public function getPayment()
    {
        $data['content'] = view('user/payment');
        echo view('user/payment', $data);
    }

    public function getHome()
    {
        $data['content'] = view('home');
        return view('Home');
    }

    public function getUser_ok()
    {
        $data['content'] = view('user/user_ok');
        echo view('user/user_ok', $data);
    }

    public function postLogin()
    {
        $request = \Config\Services::request();
        $validation =  \Config\Services::validation();
        $rules = [
            "email" => [
                "label" => "Email",
                "rules" => "required|valid_email|max_length[250]"
            ],
            "password" => [
                "label" => "Password",
                "rules" => "required|min_length[8]|max_length[30]"
            ] 
        ];
        $data = [];
        $session = session();
        if ($this->validate($rules)) {
            $email = $request->getVar('email');
            $password = $request->getVar('password');
            $user = model('UserModel')->authenticate($email, $password);
            if ($user) {
                $session->set('logged_in', TRUE);
                $session->set('user', $user);
                return redirect()->to(base_url('/'));
            } else {
                $session->setFlashdata('msg', 'Wrong credentials');
        }
        } else {
                $data["errors"] = $validation->getErrors();
            }
            $data['content'] = view('user/login', $data);
            echo view('user/login', $data);
        }

        
        public function getLogout()
        {
            session()->destroy();
            return redirect()->to(base_url('login'));
        }
        public function getUnauthorized()
        {
            echo view('pages/unauthorized');
        }
        

        //Register Functions:
    public function getRegister()
    {
        $data['content'] = view('user/register');
        echo view('user/register', $data);
    }
    public function PostRegister()
    {
        $data = [];

        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[100]',
                'lastname' => 'required|min_length[2]|max_length[100]',
                'email' => 'required|valid_email|max_length[250]|is_unique[user.email]',
                'password' => 'required|min_length[8]|max_length[30]||max_length[30]|regex_match[/^(?=.*[\p{P}]).*(?=.*[A-Z]).*$/]',
                'confirm_password' => 'required|matches[password]',
                'country' => 'required|min_length[2]|max_length[20]',
                'city' => 'required|min_length[2]|max_length[100]',
                'state' => 'required|min_length[2]|max_length[100]',
                'address' => 'required|min_length[2]|max_length[200]',
                'zipcode' => 'required|min_length[3]|max_length[10]',
                'phonenumber' => 'required|min_length[8]|max_length[10]|is_unique[user.phonenumber]',

            ];
            

            if ($this->validate($rules)) {
                $model = new \App\Models\UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'country' => $this->request->getVar('country'),
                    'city' => $this->request->getVar('city'),
                    'state' => $this->request->getVar('state'),
                    'address' => $this->request->getVar('address'),
                    'zipcode' => intval($this->request->getVar('zipcode')),
                    'phonenumber' => intval($this->request->getVar('phonenumber')),
                ];
                
            $query = $model->insert($newData);

            if( $query === false){
                throw new \Exception('Something went wrong, Please try again');
            }else{
                return redirect()->to(base_url('login'));
            }

            } else {
                $validation = \Config\Services::validation();
                $data["errors"] = $validation->getErrors();
            }
            
        } 
        $data['content'] = view('user/register', $data);
        return view('user/register', $data);
    }

    //Update profile:


    public function getProfile()
{
    $session = session();
    helper('form');

    $user = session()->get('user');

     // Check if the user exists
     if (!$user) {
         throw new \Exception('User not found');
     }

    $data['user'] = get_object_vars($user);
    return view('user/profile', $data);
}

    public function UpdateProfile()
{
    $data = [];

    helper(['form']);

    if ($this->request->getMethod() === 'post') {
        $model = new \App\Models\UserModel();
        $user = session()->get('user');
    
        // Get current data
        $currentData = $user;

        // Get new data from form submission
        $newData = [
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'confirm_password' => $this->request->getVar('confirm_password'),
            'country' => $this->request->getVar('country'),
            'city' => $this->request->getVar('city'),
            'state' => $this->request->getVar('state'),
            'address' => $this->request->getVar('address'),
            'zipcode' => $this->request->getVar('zipcode'),
            'phonenumber' => $this->request->getVar('phonenumber'),
            'role' => intval($this->request->getVar('role')),

        ];
    
        // Check which fields have been changed
        $changedFields = [];
        foreach ($newData as $key => $value) {
            if ($key!='confirm_password' && $value !== $currentData->$key) {
                $changedFields[$key] = $value;
            }
        }

        // Modify validation rules based on changed fields
        $rules = [];
        if (isset($changedFields['firstname'])) {
            $rules['firstname'] = 'required|min_length[3]|max_length[100]';
        }
        if (isset($changedFields['lastname'])) {
            $rules['lastname'] = 'required|min_length[2]|max_length[100]';
        }
        if (isset($changedFields['email'])) {
            $rules['email'] = 'required|valid_email|max_length[250]|is_unique[user.email]';
        }
        if (isset($changedFields['password'])) {
            $rules['password'] = 'required|min_length[8]|max_length[30]||regex_match[/^(?=.*[\p{P}]).*(?=.*[A-Z]).*$/]';
            $rules['confirm_password'] = 'matches[password]';
            $changedFields['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }
        if (isset($changedFields['country'])) {
            $rules['country'] = 'required|min_length[2]|max_length[20]';
        }
        if (isset($changedFields['city'])) {
            $rules['city'] = 'required|min_length[2]|max_length[100]';
        }
        if (isset($changedFields['state'])) {
            $rules['state'] = 'required|min_length[2]|max_length[100]';
        }
        if (isset($changedFields['address'])) {
            $rules['address'] = 'required|min_length[2]|max_length[200]';
        }
        if (isset($changedFields['zipcode'])) {
            $rules['zipcode'] = 'required|min_length[3]|max_length[10]';
        }
        if (isset($changedFields['phonenumber'])) {
            $rules['phonenumber'] = 'required|min_length[8]|max_length[15]|is_unique[user.email]';
        }
       

        if ($this->validate($rules)) {
            $userArray = get_object_vars($user);

            $query = $model->update($userArray, $changedFields);

            if( $query === false){
                $errors = $model->errors();
                if (!empty($errors)) {
                    throw new \Exception('Something went wrong, Please try again');
                } else {
                    // Database error
                    $error = $model->db->error();
                    throw new \Exception($error['message']);
                }            
            }else{

                //TODO : update the user in session 
                $userSessionData = session()->get('user');

                foreach ($changedFields as $key => $value) {
                    if ($value !== $userSessionData->$key) {
                        $userSessionData->$key = $value;
                    }
        }
                session()->set('user', $userSessionData);
                return redirect()->to(base_url('user/profile'));
            }
        } else {
            $validation = \Config\Services::validation();
            $data["errors"] = $validation->getErrors();
        } 
    }
    $user = session()->get('user');

    $data['user'] = get_object_vars($user);
    $data['content'] = view('user/profile', $data);
    return view('user/profile', $data);
}

//delete user:
public function deleteUser()
{
    $model = new \App\Models\UserModel();
    $user = session()->get('user');

    $result = $model->delete($user->email);

    if ($result === false) {
        $errors = $model->errors();
        if (!empty($errors)) {
            throw new \Exception('Something went wrong, Please try again');
        } else {
            $error = $model->db->error();
            throw new \Exception($error['message']);
        }
    } else {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
public function getProfileByEmail($email){
    $model = new \App\Models\UserModel();
    $user = $model->where('email', $email)->first();

    // Check if the user exists
    if (!$user) {
        throw new \Exception('User not found');
    }

    $data['user'] = get_object_vars($user);
    return view('user/profileByemail', $data);
}

public function UpdateProfileByEmail($email)
{
    $data = [];

    helper(['form']);
    
    if ($this->request->getMethod() === 'post') {
        $model = new \App\Models\UserModel();
        $user = $model->where('email', $email)->first();
    
        // Get current data
        $currentData = $user;

        // Get new data from form submission
        $newData = [
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'email' => $this->request->getVar('email'),
            'country' => $this->request->getVar('country'),
            'city' => $this->request->getVar('city'),
            'state' => $this->request->getVar('state'),
            'address' => $this->request->getVar('address'),
            'zipcode' => $this->request->getVar('zipcode'),
            'phonenumber' => $this->request->getVar('phonenumber'),
            'role' => $this->request->getVar('role')
        ];
    
        // Check which fields have been changed
        $changedFields = [];
        foreach ($newData as $key => $value) {
            if ($key!='confirm_password' && $value !== $currentData->$key) {
                $changedFields[$key] = $value;
            }
        }

        // Modify validation rules based on changed fields
        $rules = [];
        if (isset($changedFields['firstname'])) {
            $rules['firstname'] = 'required|min_length[3]|max_length[100]';
        }
        if (isset($changedFields['lastname'])) {
            $rules['lastname'] = 'required|min_length[2]|max_length[100]';
        }
        if (isset($changedFields['email'])) {
            $rules['email'] = 'required|valid_email|max_length[250]|is_unique[user.email]';
        }
        if (isset($changedFields['country'])) {
            $rules['country'] = 'required|min_length[2]|max_length[20]';
        }
        if (isset($changedFields['city'])) {
            $rules['city'] = 'required|min_length[2]|max_length[100]';
        }
        if (isset($changedFields['state'])) {
            $rules['state'] = 'required|min_length[2]|max_length[100]';
        }
        if (isset($changedFields['address'])) {
            $rules['address'] = 'required|min_length[2]|max_length[200]';
        }
        if (isset($changedFields['zipcode'])) {
            $rules['zipcode'] = 'required|min_length[3]|max_length[10]';
        }
        if (isset($changedFields['phonenumber'])) {
            $rules['phonenumber'] = 'required|min_length[8]|max_length[15]|is_unique[user.email]';
        }
        if (isset($changedFields['role'])) {
            $rules['role'] = 'required|in_list[a,v]';
        }

        if ($this->validate($rules)) {
            $userArray = get_object_vars($user);

            $query = $model->update($userArray, $changedFields);

            if( $query === false){
                $errors = $model->errors();
                if (!empty($errors)) {
                    throw new \Exception('Something went wrong, Please try again');
                } else {
                    // Database error
                    $error = $model->db->error();
                    throw new \Exception($error['message']);
                }            
            }else{

                return redirect()->to(base_url('/user'));
            }
        } else {
            $validation = \Config\Services::validation();
            $data["errors"] = $validation->getErrors();
        } 
    }

    $data['user'] = get_object_vars($user);
    $data['content'] = view('user/profileByemail', $data);
    return view('user/profileByemail', $data);
}
}
