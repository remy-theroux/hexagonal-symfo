<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\UseCase;

use App\Domain\AccommodationRental\Contract\NotificationServiceInterface;
use App\Domain\AccommodationRental\Contract\Repository\AccommodationRepositoryInterface;
use App\Domain\AccommodationRental\Contract\Repository\TenantRepositoryInterface;
use App\Domain\AccommodationRental\Entity\Tenant;
use App\Domain\AccommodationRental\UseCase\Input\AddAccommodationInput;
use PHPUnit\Framework\TestCase;

class AddAccommodationTest extends TestCase
{
    public function test_accommodation_is_added(): void
    {
        $accommodationRepository =  $this->createMock(AccommodationRepositoryInterface::class);
        $accommodationRepository->expects($this->once())->method('save');

        $tenantRepository =  $this->createMock(TenantRepositoryInterface::class);
        $tenantRepository->expects($this->once())->method('findByAccommodationSearch')->willReturn([new Tenant()]);

        $notificationService =  $this->createMock(NotificationServiceInterface::class);
        $notificationService->expects($this->once())->method('notifyInterestedTenant');

        $addAccommodation = new AddAccommodation($accommodationRepository, $tenantRepository, $notificationService);

        $input = (new AddAccommodationInput())
            ->setRoomsNumber(3)
            ->setBedroomsNumber(2);

        $accommodation = ($addAccommodation)($input);

        $this->assertEquals(3, $accommodation->getRoomsNumber());
        $this->assertEquals(2, $accommodation->getBedroomsNumber());
        $this->assertNotNull($accommodation->getCreatedAt());
    }
}
