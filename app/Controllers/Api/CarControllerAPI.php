<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CarModel;

class CarControllerAPI extends ResourceController
{
    protected $modelName = 'App\Models\CarModel';
    protected $format    = 'json';

    // GET /api/cars
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/cars/{id}
    public function show($id = null)
    {
        $car = $this->model->find($id);
        if (!$car) {
            return $this->failNotFound("Car not found with ID $id");
        }
        return $this->respond($car);
    }

    // POST /api/cars
    public function create()
    {
        helper(['form']);

        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
            $data['image_path'] = $imageName;
        }

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        $data['id'] = $this->model->getInsertID(); // add inserted ID
        return $this->respondCreated($data);
    }

    // PUT /api/cars/{id}
   public function update($id = null)
{
    helper(['form']);

    // Use getPost() to get all form-data fields (text inputs)
    $data = $this->request->getPost();

    // Get file from multipart
    $image = $this->request->getFile('image');
    if ($image && $image->isValid() && !$image->hasMoved()) {
        $imageName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/uploads', $imageName);
        $data['image_path'] = $imageName;
    }

    if (!$this->model->update($id, $data)) {
        return $this->failValidationErrors($this->model->errors());
    }

    return $this->respondUpdated($data);
}


    // DELETE /api/cars/{id}
    public function delete($id = null)
    {
        $car = $this->model->find($id);
        if (!$car) {
            return $this->failNotFound("Car not found with ID $id");
        }

        if (!empty($car['image_path']) && file_exists(ROOTPATH . 'public/uploads/' . $car['image_path'])) {
            unlink(ROOTPATH . 'public/uploads/' . $car['image_path']);
        }

        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Car deleted']);
    }
}
