<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarsRequest;
use Izupet\Api\Traits\ApiResponse;

class CarsController extends Controller
{
    use ApiResponse;

    public function __construct(
        \App\Repositories\CarsRepository $carsRepository
    )
    {
        $this->carsRepository = $carsRepository;
    }

    public function index(CarsRequest $request)
    {
        $data = $this->carsRepository->all($request->all());

        return $this->respondCollection($data);
    }

    public function show(CarsRequest $request, \App\Car $car)
    {
        $data = $this->carsRepository->find($request->all(), $car);

        return $this->respondOne($data);
    }

    public function store(CarsRequest $request)
    {
        $car = $this->carsRepository->create($request->all());

        return $this->respond('Ok', 201, $car);
    }

    public function update(CarsRequest $request, \App\Car $car)
    {
        $car = $this->carsRepository->update($request->all(), $car);

        return $this->respond('Ok', 200, $car);
    }

    public function destroy(\App\Car $car)
    {
        $this->carsRepository->delete($car);

        return $this->respond('Ok', 200);
    }
}
