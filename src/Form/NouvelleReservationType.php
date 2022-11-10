<?php

namespace App\Form;

use App\Entity\NouvelleReservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NouvelleReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenoms')
            ->add('email')
            ->add('telephone')
            ->add('adress')
            ->add('ville')
            ->add('arrive')
            ->add('depart')
            ->add('paye')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NouvelleReservation::class,
        ]);
    }
}
