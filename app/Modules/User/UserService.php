<?php

declare (strict_types = 1);

namespace App\Modules\User;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;

/**
 * Summary of UserService
 */

class UserService
{
    public function __construct(
        private readonly UserDataTableRepository $dataTableRepository,
        private readonly UserRepository $userRepository,
    )
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

        // dd($results);
        return $results;
    }
    public function get(int $id) : UserResource
    {
        $user = $this->userRepository->get($id);

        return new UserResource($user);
    }
    public function update(UserUpdateRequest $updateRequest) : UserResource
    {
        $user = $this->userRepository->update($updateRequest);

        return new UserResource($user);
    }
    public function delete(int $id)
    {
        $this->userRepository->delete($id);
    }
}