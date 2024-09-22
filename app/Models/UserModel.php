<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'email';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'city', 'state', 'address', 'zipcode', 'country', 'phonenumber','role'];
    protected $useTimestamps = false;
    protected $validationRules = [
        'firstname' => 'required|min_length[3]|max_length[100]',
        'lastname' => 'required|min_length[2]|max_length[100]',
        'email' => 'required|valid_email|max_length[250]|is_unique[user.email]',
        'password' => 'required|min_length[8]|max_length[250]',
        'country' => 'required|min_length[2]|max_length[20]',
        'city' => 'required|min_length[2]|max_length[100]',
        'state' => 'required|min_length[2]|max_length[100]',
        'address' => 'required|min_length[2]|max_length[200]',
        'zipcode' => 'required|min_length[3]|max_length[10]',
        'phonenumber' => 'required|min_length[8]|max_length[15]|is_unique[user.phonenumber]',
    ];
    protected $validationMessages = [    
        'firstname' => ['required' => 'The first name field is required.'],
        'lastname' => ['required' => 'The last name field is required.'],
        'email' => [ 
            'required' => 'The email field is required.',
            'valid_email' => 'The email field must contain a valid email address.',
            'is_unique' => 'The email address you entered is already registered.',    
        ],
        'password' => [
            'required' => 'The password field is required.',
            'min_length' => 'The password must be at least 8 characters long.',
        ],
        'country' => ['required' => 'The country field is required.'],
        'city' => ['required' => 'The city field is required.'],
        'state' => ['required' => 'The state field is required.'],
        'address' => ['required' => 'The address field is required.'],
        'zipcode' => [
            'required' => 'The zipcode field is required.',
            'min_length' => 'The zipcode must be at least 3 characters long.',
        ],
        'phonenumber' => [
            'required' => 'The phone number field is required.',
            'min_length' => 'The phone number must be at least 3 characters long.',
            'max_length' => 'The phone number must be maximum of 8 characters ',
            'is_unique' => 'The phone number you entered is already registered.'
        ],
    ];

    protected $defaultValues = [
        'role' => 'v'
    ];

    public function authenticate($email, $password)
    {
        $user = $this->where('email', $email)->first();
        if ($user && password_verify($password, $user->password))
            return $user;
        return FALSE;
    }
}

?>