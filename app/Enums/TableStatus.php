<?php

namespace App\Enums;

enum TableStatus: string
{
    case Pending = 'Pending';
    case Avalaiable = 'Avaliable';
    case Unavaliable = 'Unavaliable';
}
