<?php

namespace App\Form;

use App\Entity\Cars;
use App\Entity\Categories;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', options:[
                label => 'Nom'
            ])
            ->add('description', options:[
                label => 'Description'
            ])
            ->add('price', options:[
                label => 'Prix'
            ])
            ->add('distance', options:[
                label => 'Distance'
            ])
            ->add('year', options:[
                label => 'Année'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cars::class,
        ]);
    }
}
