<?php

namespace App\Domains;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    public function __construct(protected Model $model) {}

    protected function getQueryBuilder():Builder
    {
        return $this->model->query();
    }

    public function setModel(Model $model):static
    {
        $this->model = $model;
        return $this;
    }
}
