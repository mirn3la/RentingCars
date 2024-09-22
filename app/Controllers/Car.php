<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Car extends Controller
{
    
    public function getCarList()
    {
        $carModel = new \App\Models\CarModel();
        $cars = $carModel->findAll();
        $data['cars'] = $cars;
        
        echo view('car/carlist', $data);
    }

    public function getCreateCar()
    {
        helper(['url', 'form', 'upload']);

        echo view('car/create');
    }
 
    public function PostCreateCar()
    {
        helper(['url','form']);

        $title = $this->request->getVar('title');
        $location = $this->request->getVar('location');
        $brand = $this->request->getVar('brand');
        $kilo = $this->request->getVar('kilo');
        $transmission = $this->request->getVar('transmission');
        $description = $this->request->getVar('description');
        $price = $this->request->getVar('price');
        $seats = $this->request->getVar('seats');
        $photos = $this->request->getFileMultiple('photos');

        $validation =  \Config\Services::validation();
        $rules = [
            'title' => 'required|min_length[3]|max_length[50]',
            'location' => 'required|in_list[Jaen, Sevilla, Granada]',
            'brand' => 'required|in_list[Mercedes,BMW,Hundai,Tesla,Cupra,Tramontana]',
            'kilo' => 'required|numeric',
            'transmission' => 'required|in_list[manual,automatic]',
            'description' => 'required|min_length[3]|max_length[1000]',
            'price' => 'required|numeric',
            'seats' => 'required|numeric',

        ];

        if ($this->validate($rules)) {
            $model = new \App\Models\CarModel();

            $newData = [
                'title' => $this->request->getVar('title'),
                'location' => $this->request->getVar('location'),
                'brand' => $this->request->getVar('brand'),
                'kilo' => intval($this->request->getVar('kilo')),
                'transmission' => $this->request->getVar('transmission'),
                'description' => $this->request->getVar('description'),
                'price' => intval($this->request->getVar('price')),
                'seats' => intval($this->request->getVar('seats')),
                'photos' => [],

            ];
            if (is_array($photos)) {
                foreach ($photos as $photo) {
                    if (is_object($photo) && $photo->isValid()) {
                        $newName = $photo->getRandomName();
                        $photo->move(env('uploadDirectory'), $newName);
                        $newData['photos'][] = env('uploadPrefix') . $newName;
                    }
                }
                $newData['photos'] = json_encode($newData['photos']);

            }else{
                foreach ($photos as $photo) {
                    if ($photo->isValid()) {
                        $newName = $photo->getRandomName();
                        $photo->move(env('uploadDirectory'), $newName);
                        $newData['photos'] = env('uploadPrefix') . $newName;
                    }
                }
                $newData['photos'] = json_encode($newData['photos']);
                
            }
           

            $query = $model->insert($newData);

            if( $query === false){
                $errors = $model->errors();

                if (!empty($errors)) {
                    print_r($errors);
                    exit();
                    throw new \Exception('Something went wrong, Please try again');
                } else {
                    $error = $model->db->error();
                    throw new \Exception($error['message']);
                }
                throw new \Exception('Something went wrong, Please try again');
            }else{
                return redirect()->to('car');
            }

            return redirect()->to('car/create')->with('success', 'Car created successfully');
        } else {
            $validation = \Config\Services::validation();
            $data["errors"] = $validation->getErrors();
            return view('car/create', $data);
        }
    }

    public function getCarDetail($id)
    {
        $model = new \App\Models\CarModel();
        helper('form');

        $car = $model->find($id);

        // Check if the car exists
        if (!$car) {
            throw new \Exception('Car not found');
        }
    
        $data['car'] = $car;

        echo view('car/cardetail', $data);
    }

    public function deleteCar($id)
{
    $model = new \App\Models\CarModel();
    helper('form');

    $result = $model->delete($id);

    if ($result === false) {
        $errors = $model->errors();
        if (!empty($errors)) {
            throw new \Exception('Something went wrong, Please try again');
        } else {
            $error = $model->db->error();
            throw new \Exception($error['message']);
        }
    } else {
        return redirect()->to(base_url('/'));
    }
}
}

?>