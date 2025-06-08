<?php

namespace App\Controllers;

use App\Models\CarModel;
use App\Models\RentalModel;

class CarController extends BaseController
{
    public function car()
    {
        $carModel = new CarModel();
        $data['cars'] = $carModel->findAll();
        return view('car_list', $data);
    }

    public function create()
    {
        return view('create_car');
    }

    public function store()
    {
        $carModel = new CarModel();
        $image = $this->request->getFile('image');
        $imageName = '';

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
        }

        $data = [
            'car_name' => $this->request->getPost('car_name'),
            'description' => $this->request->getPost('description'),
            'car_price' => $this->request->getPost('car_price'),
            'status' => $this->request->getPost('status'),
            'image_path' => $imageName,
        ];

        $carModel->save($data);
        return redirect()->to('/car');
    }

    public function edit($id)
    {
        $carModel = new CarModel();
        $data['car'] = $carModel->find($id);
        return view('edit_car', $data);
    }

    public function update($id)
    {
        $carModel = new CarModel();
        $image = $this->request->getFile('image');
        $imageName = $this->request->getPost('old_image');

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
        }

        $data = [
            'car_name' => $this->request->getPost('car_name'),
            'description' => $this->request->getPost('description'),
            'car_price' => $this->request->getPost('car_price'),
            'status' => $this->request->getPost('status'),
            'image_path' => $imageName,
        ];

        $carModel->update($id, $data);
        return redirect()->to('/car');
    }

    public function delete($id)
    {
        $carModel = new CarModel();
        $car = $carModel->find($id);

        if (!empty($car['image_path']) && file_exists(ROOTPATH . 'public/uploads/' . $car['image_path'])) {
            unlink(ROOTPATH . 'public/uploads/' . $car['image_path']);
        }

        $carModel->delete($id);
        return redirect()->to('/car');
    }

    public function rent_cars()
    {
        $carModel = new CarModel();
        $data['cars'] = $carModel->findAll();
        return view('rent-cars', $data);
    }

    public function rentCar()
    {
        $rentalModel = new RentalModel();
        $carModel = new CarModel();

        $carName = $this->request->getPost('car_name');
        $fullName = $this->request->getPost('fullname');
        $rentedDays = $this->request->getPost('rental_days');

        $car = $carModel->where('car_name', $carName)->first();

        if (!$car || strtolower($car['status']) !== 'available') {
            return redirect()->back()->with('error', 'Car is not available for rent.');
        }

        $rentalModel->insert([
            'fullname' => $fullName,
            'car_name' => $carName,
            'rented_days' => $rentedDays,
        ]);

        $carModel->update($car['id'], ['status' => 'Rented']);

        return redirect()->to('/rent')->with('message', 'Car rented successfully!');
    }
}
