<?php

declare (strict_types = 1);

namespace App\Modules\User;

use App\Models\User;
use App\Modules\Datatable\DataTableRepository;
use Illuminate\Support\Facades\DB;

/**
 * Summary of UserRepository
 */

class UserDataTableRepository extends DataTableRepository
{
    protected string $table = "users";
    protected array $orderColumns = [
        "id",
        "name",
        "email",
    ];
    protected array $searchColumns = [
        "name",
        "email",
    ];
    
    protected array $selectColumns = [
        "users.id",
        "users.name",
        "users.email",
    ];
    protected array $exceptionColumns = [
        "id" => "users.id",
        "name" => "users.name",
        "email" => "users.email",
    ];
    
    protected string $joinQuery = "";

    protected string $where = "users.id > 0";

    
}