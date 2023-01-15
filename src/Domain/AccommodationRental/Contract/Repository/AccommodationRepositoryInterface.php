<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\Contract\Repository;

use App\Domain\AccommodationRental\Entity\Accommodation;

interface AccommodationRepositoryInterface
{
    /** @return ?Accommodation */
    public function save(Accommodation $accommodation): ?Accommodation;
}
