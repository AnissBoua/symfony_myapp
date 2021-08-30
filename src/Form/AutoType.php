<?php

namespace App\Form;

use App\Entity\Auto;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque')
            ->add('modele')
            ->add('category', EntityType::class, ['class'=>Category::class, 'placeholder' => 'Choice a category', 'choice_label'=>'name'])
            ->add('puissance')
            ->add('prix')
            ->add('pays')
            ->add('image', FileType::class, ['data_class' => null, 'required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Auto::class,
        ]);
    }
}
