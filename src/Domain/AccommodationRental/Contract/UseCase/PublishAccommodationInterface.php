<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\Contract\UseCase;

use App\Domain\AccommodationRental\UseCase\Input\PublishAccommodationInput;

interface PublishAccommodationInterface
{
    public function __invoke(PublishAccommodationInput $input): bool;
}
