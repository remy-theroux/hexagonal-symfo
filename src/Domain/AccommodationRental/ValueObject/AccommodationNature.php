<?php

declare(strict_types = 1);

namespace App\Domain\Blog\ValueObject;

enum AccommodationNature: string
{
    case STUDIO = 'studio';
    case FLAT = 'flat';
    case HOUSE = 'house';
    case ROOM = 'room';
}
