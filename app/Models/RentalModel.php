<?php

namespace App\Models;

use CodeIgniter\Model;

class RentalModel extends Model
{
    protected $table = 'rental';
    protected $primaryKey = 'rental_id';
    protected $allowedFields = ['user_id', 'car_id', 'start_date', 'end_date'];


}
