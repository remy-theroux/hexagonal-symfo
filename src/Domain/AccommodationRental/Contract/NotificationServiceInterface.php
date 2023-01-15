<?php declare(strict_types = 1);

namespace App\Domain\AccommodationRental\Contract;

use App\Domain\AccommodationRental\Entity\Tenant;

interface NotificationServiceInterface
{
    public function notifyInterestedTenant(Tenant $tenant): void;
}
