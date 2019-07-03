<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EquipoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoria')
            ->add('sexo', ChoiceType::class, [
                'choices'  => [
                    'Femenino' => "Femenino",
                    'Masculino' => "Masculino",
                    'Mixto' => "Mixto",
                ],
            ])
            ->add('numJugadores')
            ->add('guardar', SubmitType::class, ['label' => 'Crear']);
    }
}
