<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\RepositoryInterface;

use App\Domain\AccommodationRental\Entity\Accommodation;

interface AccommodationRepositoryInterface
{
    /** @return Accommodation[] */
    public function findByOwner(int $ownerId): array;
}
