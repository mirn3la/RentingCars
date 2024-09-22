<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Rent extends Controller
{

    

    public function CheckCars()
    {

        $validation =  \Config\Services::validation();

        $validation->setRules([
            'pickup-location' => 'required|in_list[Jaen,Sevilla,Granada]',
            'dropoff-location' => 'required|in_list[Jaen,Sevilla,Granada]',
            'pickup-date' => 'required|valid_date',
            'dropoff-date' => 'required|valid_date',
            'car-type' => 'required|in_list[Mercedes,BMW,Hundai,Tesla,Cupra,Tramontana]'
        ]);

        if ($validation->run($this->request->getGet()) === false) {
            $errors = $validation->getErrors();
            print_r($errors);exit();
        } else {
            $pickupLocation = $this->request->getGet('pickup-location');
            $dropoffLocation = $this->request->getGet('dropoff-location');
            $pickupDate = $this->request->getGet('pickup-date');
            $dropoffDate = $this->request->getGet('dropoff-date');
            $carType = $this->request->getGet('car-type');

        }

        
        $carModel = new \App\Models\CarModel();

        $pickupLocation = $pickupLocation;
        $carType = $carType;

        $cars = $carModel
            ->where('location', $pickupLocation)
            ->where('brand', $carType)
            ->findAll();
        $availableCars = [];
        foreach ($cars as $car) {
            $carId = $car['id'];
        
            $isAvailable = $this->AvailableCar($carId, $pickupDate, $dropoffDate);
        
            if ($isAvailable) {
                $availableCars[] = $car;
            } 
        }

        
        $data['availableCars'] = $availableCars;

        echo view('car/rent', $data);
    }

    
    private function AvailableCar($id, $pickupDate, $dropoffDate)
    {
        $db = \Config\Database::connect();
        $currentDate = $pickupDate;

        while ($currentDate <= $dropoffDate) {
            $query = $db->table('rental')
                ->select('*')
                ->where('car_id', $id)
                ->where('start_date <=', $currentDate)
                ->where('end_date >=', $currentDate)
                ->get();

        $result = $query->getResult();

            if (!empty($result)) {
                return false;
            }

        $currentDate = date('Y-m-d', strtotime($currentDate . '+1 day'));
    }
    return true;
}




    public function RentCar($id)
    {
        

        $validation = \Config\Services::validation();

        $validation->setRules([
            'pickup_date' => 'required|valid_date',
            'dropoff_date' => 'required|valid_date'
        ]);

        if ($validation->run($this->request->getPost()) === false) {
            return redirect()->back()->with('msg', $validation->getErrors());

        }else{
            $startDate = $this->request->getPost('pickup_date');
            $endDate = $this->request->getPost('dropoff_date');

            if ($startDate >= $endDate) {
                $errors['pickup-date'] = 'The pickup date must be before the dropoff date.';
                print_r($errors);
                exit();
            }else{
                $user = session()->get('user');
                $userId = $user->email;
                $carId = $id;
            }
        }

        $rentalModel = new \App\Models\RentalModel();
        if($this->AvailableCar($carId,$startDate,$endDate)){
            $data = [
                'user_id' => $userId,
                'car_id' => $carId,
                'start_date' => $startDate,
                'end_date' => $endDate
            ];
            $rentalId = $rentalModel->insert($data);
    
            if ($rentalId !== false) {
                return redirect()->back()->with('success', 'Car rented successfully.');

            } else {
                session()->setFlashdata('msg', 'An error has occurred');
                return redirect()->back();            
            }
        }else{
            session()->setFlashdata('msg', 'Car Already Rented');
            return redirect()->back();
        }
        
    }
    public function date_check($pickupDate)
    {
        $dropoffDate = $this->request->getPost('dropoff_date');

        if ($pickupDate >= $dropoffDate) {
            $this->validation->setError('pickup_date', 'The pickup date must be before the dropoff date.');

            return false;
        }

        return true;
    }
    
}
