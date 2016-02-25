<?php

namespace GBProd\ICantDecide\UI\Form;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('text', TextareaType::class)
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