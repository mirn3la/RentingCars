<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $carModel = new \App\Models\CarModel();
        
        $cars = $carModel->findAll();
        $data['cars'] = $cars;

        return view('home',$data);
    }

}
