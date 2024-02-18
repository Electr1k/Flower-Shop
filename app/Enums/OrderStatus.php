<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Accepted = 'Принят';
    case Going = 'Собирается';
    case Delivery = 'Доставляется';
    case Completed = 'Завершен';

}
