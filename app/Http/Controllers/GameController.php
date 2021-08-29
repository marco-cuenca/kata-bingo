<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckWinnerRequest;
use App\Repositories\Interfaces\IGameRepository;

// use Illuminate\Http\Request;

class GameController extends Controller
{
    /** @var IGameRepository */
    private $repository;

    public function __construct(IGameRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($game)
    {
        return $this->repository->find($game);
    }

    public function create()
    {
        return $this->repository->create(null);
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function getNumber($id)
    {
        return $this->repository->getNumber($id);
    }

    public function checkWinner($id, CheckWinnerRequest $request)
    {
        return $this->repository->checkWinner($id, $request);
    }
}
