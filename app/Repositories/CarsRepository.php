<?php

namespace App\Repositories;

class CarsRepository
{
    public function __construct(
        \App\Car $car
    )
    {
        $this->car = $car;
    }

    public function all(array $input)
    {
        return $this->car->apiGet('fields', 'pagination', 'search', 'order', 'filter', 'relations', $input);
    }

    public function create(array $input)
    {
        return $this->car->apiCreate('fields', $input);
    }

    public function update(array $input, \App\Car $car)
    {
        return $car->apiUpdate('fields', 'relations', $input);
    }

    public function delete(\App\Car $car)
    {
        return $car->apiDelete();
    }

    public function find(array $input, \App\Car $car)
    {
        return $car;
    }
}
