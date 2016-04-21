<?php

namespace GBProd\ICantDecide\UI\Form;

use GBProd\ICantDecide\Application\Command\VoteCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * form for vote command
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class VoteType extends AbstractType
{
    /**
     * {inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('questionId', Type\HiddenType::class)
            ->add('optionId', Type\HiddenType::class)
        ;
    }
    
    /**
     * {inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VoteCommand::class,
        ]);
    }
}