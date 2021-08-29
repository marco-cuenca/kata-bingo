<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\Shared\ICrudRepository;

interface IGameRepository extends ICrudRepository
{
    public function getNumber($id);

    public function checkWinner($id, $request);
}
