<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatatableRequest;
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
}
