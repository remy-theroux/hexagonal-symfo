<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\UseCase;

use App\Domain\AccommodationRental\Contract\NotificationServiceInterface;
use App\Domain\AccommodationRental\Contract\Repository\TenantRepositoryInterface;
use App\Domain\AccommodationRental\Entity\Accommodation;
use App\Domain\AccommodationRental\Contract\Repository\AccommodationRepositoryInterface;
use App\Domain\AccommodationRental\UseCase\Input\AddAccommodationInput;
use App\Domain\AccommodationRental\Contract\UseCase\AddAccommodationInterface;

final class AddAccommodation implements AddAccommodationInterface
{
    public function __construct(
        private readonly AccommodationRepositoryInterface $accommodationRepository,
        private readonly TenantRepositoryInterface $tenantRepository,
        private readonly NotificationServiceInterface $notificationService,
    ) {
    }

    public function __invoke(AddAccommodationInput $input): ?Accommodation
    {
        $this->validate($input);

        $accommodation = new Accommodation(
            $input->getNature(),
            $input->getCity(),
            $input->getOwner(),
            $input->getRoomsNumber(),
            $input->getBedroomsNumber(),
            $input->getAvailableAt()
        );

        $this->accommodationRepository->save($accommodation);

        $tenants = $this->tenantRepository->findByAccommodationSearch($accommodation);
        foreach ($tenants as $tenant) {
            $this->notificationService->notifyInterestedTenant($tenant);
        }

        return $accommodation;
    }
}
