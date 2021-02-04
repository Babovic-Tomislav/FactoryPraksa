<?php


namespace App\Repository\Vacation;


use App\Models\Vacation;

class VacationRepository implements VacationRepositoryInterface
{

    public function create(array $data)
    {
        Vacation::create($data);
    }
}