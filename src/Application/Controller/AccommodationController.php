<?php

declare(strict_types = 1);

namespace App\Application\Controller\BackOffice\OwnerProspecting;

use App\Application\Form\AddAccommodationInputType;
use App\Domain\AccommodationRental\UseCase\AddAccommodation;
use App\Domain\AccommodationRental\UseCase\Input\AddAccommodationInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccommodationController extends AbstractController
{
    public function __construct(
        private readonly AddAccommodation $addAccommodation,
    ) {
    }

    /**
     * @Route("/accommodations", name="add_accommodation", methods={"GET", "POST"})
     */
    public function addAccommodation(Request $request): Response
    {
        $input = new AddAccommodationInput();

        $form = $this->createForm(AddAccommodationInputType::class, $input);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var AddAccommodationInput $input */
            $input = $form->getData();

            $accommodation = ($this->addAccommodation)($input);
            if (null === $accommodation) {
                $this->addFlash('error', 'Votre logement a été ajouté');
            } else {
                $this->addFlash('success', 'Votre logement a été ajouté');
            }

            return $this->redirectToRoute('list_accommodation');
        }

        return $this->render('add-accommodation.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
