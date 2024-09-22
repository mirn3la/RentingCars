<?php

namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model
{
    protected $table = 'car';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'location', 'brand', 'kilo', 'transmission', 'description', 'price', 'seats', 'photos'];

    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[50]',
        'location' => 'required|in_list[Jaen, Sevilla, Granada]',
        'brand' => 'required|in_list[Mercedes,BMW,Hundai,Tesla,Cupra,Tramontana]',
        'kilo' => 'required|numeric',
        'transmission' => 'required|in_list[manual,automatic]',
        'description' => 'required|min_length[3]|max_length[1000]',
        'price' => 'required|numeric',
        'seats' => 'required|numeric',

    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'The title field is required',
            'min_length' => 'The title field must be at least 3 characters long',
            'max_length' => 'The title field cannot exceed 50 characters'
        ],
        'location' => [
            'required' => 'The location field is required',
            'min_length' => 'The location field must be at least 3 characters long',
            'max_length' => 'The location field cannot exceed 50 characters'
        ],
        'brand' => [
            'required' => 'The brand field is required',
            'min_length' => 'The brand field must be at least 3 characters long',
            'max_length' => 'The brand field cannot exceed 50 characters'
        ],
        'kilo' => [
            'required' => 'The kilo field is required',
        ],
        'transmission' => [
            'required' => 'The transmission field is required',
            'min_length' => 'The transmission field must be at least 3 characters long',
            'max_length' => 'The transmission field cannot exceed 50 characters'
        ],
        'description' => [
            'required' => 'The description field is required',
            'min_length' => 'The description field must be at least 3 characters long',
            'max_length' => 'The description field cannot exceed 1000 characters'
        ],
        'price' => [
            'required' => 'The price field is required',
        ],
        'seats' => [
            'required' => 'The seats field is required',
        ],
                         
    ];

}
