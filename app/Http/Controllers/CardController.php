<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Repositories\Interfaces\ICardRepository;

class CardController extends Controller
{
    /** @var ICardRepository */
    private $repository;

    public function __construct(ICardRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function show($card)
    {
        return $this->repository->find($card);
    }

    public function create(CardRequest $card)
    {
        return $this->repository->create($card);
    }

}
