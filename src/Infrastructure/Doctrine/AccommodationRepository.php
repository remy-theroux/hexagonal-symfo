<?php

declare(strict_types = 1);

namespace App\Infrastructure\Doctrine;

use App\Domain\AccommodationRental\Contract\Repository\AccommodationRepositoryInterface;
use App\Domain\AccommodationRental\Entity\Accommodation;
use Doctrine\ORM\EntityRepository;

final class AccommodationRepository extends EntityRepository implements AccommodationRepositoryInterface
{
    public function save(Accommodation $accommodation): ?Accommodation
    {
        $this->getEntityManager()->persist($accommodation);
        $this->getEntityManager()->flush();

        return $accommodation;
    }
}
