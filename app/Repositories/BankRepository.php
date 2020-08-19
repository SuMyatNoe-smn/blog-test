<?php

namespace App\Repositories;

use App\Models\Bank;
use App\Repositories\BaseRepository;

class BankRepository extends BaseRepository
{
    protected $model;

    public function __construct(Bank $model)
    {
        $this->model = $model;
    }
}