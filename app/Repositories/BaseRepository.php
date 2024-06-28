<?php

namespace App\Repositories;

class BaseRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = new $model;
    }

    public function exists($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($uuid, $data)
    {
        $record = $this->getByUuid($uuid);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->getById($id);
        $record->delete();
        return $record;
    }

    public function getByUuid($uuid, $relationships = [])
    {
        if ($relationships) {
            return $this->model->with($relationships)->where('uuid', $uuid)->paginate(10)->firstOrFail();
        }
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }

    public function getById($id, $relationships = [])
    {
        if ($relationships) {
            return $this->model->with($relationships)->findOrFail($id);
        }
        return $this->model->findOrFail($id);
    }

    public function deleteByUuid($uuid)
    {
        $record = $this->getByUuid($uuid);
        $record->delete();
        return $record;
    }

}