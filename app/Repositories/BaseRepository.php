<?php
namespace App\Repositories;

abstract class BaseRepository
{

    protected $model;

    public function __construct(\Model $model)
    {
        $this->model = $model;
    }
    public function store(array $data)
    {
        return $this->model->store($data);
    }
    public function getAll()
    {
        return $this->model->orderBy('id', 'ASC')->get();
    }
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }
    public function update(array $data, $id)
    {
        $model = $this->getById($id);
        $model->fill($data);
        return $model->push();
    }
    
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
