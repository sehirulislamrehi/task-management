<?php

namespace App\Enum;

enum TaskStatusEnum:string
{
    case PENDING="Pending";
    case IN_PROGRESS="In-Progress";
    case COMPLETE="Complete";


    public static function all(): array
    {
        return [
            self::PENDING->value,
            self::IN_PROGRESS->value,
            self::COMPLETE->value,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::IN_PROGRESS => 'In-Progress',
            self::COMPLETE => 'Complete',
        };
    }
}
