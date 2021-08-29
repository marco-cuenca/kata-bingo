<?php

namespace App\Repositories\Interfaces\Shared;

interface ICrudRepository
{
    public function all();

    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function find($id);
}
