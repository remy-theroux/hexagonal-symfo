<?php

declare(strict_types = 1);

namespace App\Application\Form;

use App\Domain\AccommodationRental\Entity\City;
use App\Domain\AccommodationRental\UseCase\Input\AddAccommodationInput;
use App\Domain\Blog\ValueObject\AccommodationNature;
use PHPUnit\Framework\Constraint\GreaterThan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AddAccommodationInputType extends AbstractType
{
    /**
     * @param FormBuilderInterface|FormBuilderInterface[] $builder
     * @param array<mixed> $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', EntityType::class, [
                'label'       => 'Nom du propriétaire',
                'class' => City::class,
                'constraints' => [new NotNull()],
            ])
            ->add('roomsNumber', IntegerType::class, [
                'label'       => 'Nombres de pièces',
                'constraints' => [
                    new LessThanOrEqual(8),
                    new GreaterThan(0),
                ],
            ])
            ->add('bedroomsNumber', IntegerType::class, [
                'label'       => 'Nombre de chambres',
                'constraints' => [
                    new LessThanOrEqual(7),
                    new GreaterThan(0),
                ],
            ])
            ->add('nature', EnumType::class, [
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'class'    => AccommodationNature::class,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'  => AddAccommodationInput::class,
        ]);
    }
}
