<?php

declare (strict_types = 1);

namespace App\Modules\Datatable;

abstract class Button
{
    public static function actionButton(
        string $eventName,
        string $text,
        string $colour,
    )
    {
        return "<a class='btn $colour btn-sm ms-1 me-1' href='javascript:void(0)' onclick='$eventName'>$text</a>";
    }
}