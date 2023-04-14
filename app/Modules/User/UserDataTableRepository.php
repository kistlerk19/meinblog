<?php

declare (strict_types = 1);

namespace App\Modules\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Summary of UserRepository
 */

class UserDataTableRepository
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

    public function index(
        array $columns,
        int $start,
        int $length,
        array $order,
        array $search,
    ) : array
    {
        $query = $this->buildSQL(
            $columns,
            $start,
            $length,
            $order,
            $search,
        );

        $result = json_decode(json_encode(DB::select($query["sql"], $query["bindings"])), true);

        return [
            "recordsFiltered" => json_decode(json_encode(DB::selectOne($query["countSql"], $query["bindings"])), true)["total"],
            "recordsTotal" => User::count(),
            "data" => $result,
        ];
    }

    private function buildSQL(
        array $columns,
        int $start,
        int $length,
        array $order,
        array $search,
    ) : array
    {
        $selectColumns = implode(",", $this->selectColumns);
        $orderQuery = $this->buildOrderByQuery($columns, $order);

        return [
            "sql" => "SELECT $selectColumns
                      FROM $this->table
                      $orderQuery
                      LIMIT $length OFFSET $start",
            "countSql" => "SELECT COUNT(*) as total
                      FROM $this->table
                      LIMIT $length OFFSET $start",
            "bindings" => [],
        ];
    }

    private function buildOrderByQuery(array $columnList, array $orderList) : string
    {
        $orderByQueryList = [];

        foreach ($orderList as $toOrderElement) {
            $orderBy = $toOrderElement["dir"];
            if($columnList[$toOrderElement["column"]]["orderable"] == true) {
                $columnName = $columnList[$toOrderElement["column"]]["data"];
                if(in_array($columnName, $this->orderColumns)) {
                    $orderByQueryList[] = "{$this->exceptionColumns[$columnName]} $orderBy";
                }
            }
        }

        if (count($orderByQueryList) > 0) {
            return "ORDER BY " . implode(",", $orderByQueryList);
        }
        
        return "";
    }
}