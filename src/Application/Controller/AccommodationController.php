<?php

declare(strict_types = 1);

namespace App\Application\Controller\BackOffice\OwnerProspecting;

use App\Application\Form\AddAccommodationInputType;
use App\Domain\AccommodationRental\Contract\UseCase\AddAccommodationInterface;
use App\Domain\AccommodationRental\UseCase\AddAccommodation;
use App\Domain\AccommodationRental\UseCase\Input\AddAccommodationInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class AccommodationController extends AbstractController
{
    public function __construct(private readonly AddAccommodationInterface $addAccommodation) { }

    /**
     * @Route("/accommodations", name="add_accommodation", methods={"GET", "POST"})
     */
    public function addAccommodation(Request $request): Response
    {
        $form = $this->createForm(AddAccommodationInputType::class, new AddAccommodationInput());
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

    /**
     * @Route("/api/accommodations", name="api_add_accommodation", methods={"POST"})
     */
    public function addAccommodation(AddAccommodationInput $input): Response
    {
        $errors = $this->validator->validate($input);
        if (count($errors) > 0) {
            return new JsonResponse(['errors' => $errors],Response::HTTP_BAD_REQUEST);
        }

        $owner = $this->ownerRepository->findByUserId($this->getUser()->getId());
        $input->setOwner($owner);

        $accommodation = ($this->addAccommodation)($input);

        return new JsonResponse($accommodation);
    }
}
