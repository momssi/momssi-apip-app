<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function setModel(Model $model):static;
}
