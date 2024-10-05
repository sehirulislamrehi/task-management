<?php

namespace App\Enum;

enum LogEventType: string
{
    case CREATE = 'create';
    case READ = 'read';
    case UPDATE = 'update';
    case DELETE = 'delete';
}
