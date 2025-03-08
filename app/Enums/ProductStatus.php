<?php

namespace App\Enums;

enum ProductStatus: string
{
    case PENDING = 'panding';
    case ACTIVE = 'active';
    case NEW = 'new';
    case SALE = 'sale';
    case SOLD = 'sold';
}
