<?php

declare (strict_types = 1);

namespace App\Modules\User;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Modules\Datatable\Button;

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
            $eventId = $row["id"];
            $row["actions"] = Button::actionButton("editItem($eventId)", "Edit", "btn-dark");
            $row["actions"] .= Button::actionButton("deleteItem($eventId)", "Delete", "btn-danger");
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
    public function update(UserUpdateRequest $request) : UserResource
    {
        $user = $this->userRepository->update($request);

        return new UserResource($user);
    }
    public function delete(int $id)
    {
        $this->userRepository->delete($id);
    }
}