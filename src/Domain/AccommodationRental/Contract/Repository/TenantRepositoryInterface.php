<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\Contract\Repository;

use App\Domain\AccommodationRental\Entity\Accommodation;
use App\Domain\AccommodationRental\Entity\Tenant;

interface TenantRepositoryInterface
{
    /** @return Tenant[] */
    public function findByAccommodationSearch(Accommodation $accommodation): array;
}
