<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\UseCase;

use App\Domain\AccommodationRental\Entity\Accommodation;
use App\Domain\AccommodationRental\RepositoryInterface\AccommodationRepositoryInterface;
use App\Domain\AccommodationRental\UseCase\Input\AddAccommodationInput;
use App\Domain\AccommodationRental\UseCase\Interface\AddAccommodationInterface;

final class AddAccommodation implements AddAccommodationInterface
{
    public function __construct(
        private readonly AccommodationRepositoryInterface $accommodationRepository,
    ){
    }

    public function __invoke(AddAccommodationInput $input): ?Accommodation
    {
        $accommodation = (new Accommodation())
            ->setNature($input->getNature())
            ->setCity($input->getCity())
            ->setOwner($input->getOwner())
            ->setRoomsNumber($input->getRoomsNumber())
            ->setBedroomsNumber($input->getBedroomsNumber());

        $ownerAccommodations = $this->accommodationRepository->findByOwner($input->getOwner()->getId());

        return $accommodation;
    }
}
