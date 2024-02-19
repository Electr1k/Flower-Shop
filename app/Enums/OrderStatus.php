<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Accepted = 'Accepted';
    case Going = 'Going';
    case Delivery = 'Delivery';
    case Completed = 'Completed';

}
