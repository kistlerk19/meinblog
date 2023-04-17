<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatatableRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Modules\User\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
        //
    }
    public function index(DatatableRequest $request) : JsonResponse
    {
        try {
            return response()->json($this->userService->index($request->data()));
        } catch (Exception $error) {
            return response()->json(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage(),
                ],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    public function get(int $id) : JsonResponse
    {
        try {
            return response()->json($this->userService->get($id));
        } catch (Exception $error) {
            return response()->json(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage(),
                ],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }
    public function update(UserUpdateRequest $updateRequest) : JsonResponse
    {
        try {
            return response()->json($this->userService->update($updateRequest));
        } catch (Exception $error) {
            return response()->json(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage(),
                ],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }
    public function delete(int $id) : JsonResponse
    {
        try {
            $this->userService->delete($id);
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (Exception $error) {
            return response()->json(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage(),
                ],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

}
