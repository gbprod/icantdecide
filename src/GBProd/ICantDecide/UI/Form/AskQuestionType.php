<?php

namespace GBProd\ICantDecide\UI\Form;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Braincrafted\Bundle\BootstrapBundle\Form\Type\BootstrapCollectionType;

/**
 * form for ask question command
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class AskQuestionType extends AbstractType
{
    /**
     * {inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', Type\TextareaType::class)
            ->add('endDate', Type\DateTimeType::class, [
                'data' => new \DateTimeImmutable('+1 day')
            ])
            ->add('options', BootstrapCollectionType::class, [
                'entry_type' => Type\TextType::class,
                'entry_options'  => [
                    'required'  => true,
                ],
                'allow_add'    => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'prototype'    => true,
                'add_button_text'    => 'Ajouter',
                'delete_button_text' => 'Enlever',
                'sub_widget_col'     => 9,
                'button_col'         => 3,
            ]);
        ;
    }
    
    /**
     * {inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AskQuestionCommand::class,
        ]);
    }
}