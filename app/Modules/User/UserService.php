<?php

declare (strict_types = 1);

namespace App\Modules\User;

/**
 * Summary of UserService
 */

class UserService
{
    public function __construct(private readonly UserDataTableRepository $dataTableRepository)
    {
        //
    }
    public function index(array $data) : array
    {
        $results =  $this->dataTableRepository->index(
            $data["columns"],
            $data["start"],
            $data["length"],
            $data["order"],
            $data["search"],
        );

        $results["data"] = array_map(function ($row) {
            $row["actions"] = "";
            return $row;
        }, $results["data"]);

        dd($results);
        return $results;
    }
}