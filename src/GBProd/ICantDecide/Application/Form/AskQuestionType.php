<?php

namespace GBProd\ICantDecide\Application\Form;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as Type;
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
            ->add('text', Type\TextareaType::class)
            ->add('endDate', Type\DateTimeType::class, [
                'data' => new \DateTimeImmutable('+1 day')
            ])
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