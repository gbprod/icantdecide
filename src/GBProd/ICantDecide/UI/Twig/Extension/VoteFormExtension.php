<?php


namespace GBProd\ICantDecide\UI\Twig\Extension;

use GBProd\ICantDecide\Application\Command\VoteCommand;
use GBProd\ICantDecide\UI\Form\Type\VoteType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig_Environment;

/**
 * Extension for vote form
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class VoteFormExtension extends \Twig_Extension
{
    /**
     * @var FormBuilderInterface
     */
    private $formBuilder;

    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    /**
     * @param string               $template
     * @param FormBuilderInterface $formBuilder
     */
    public function __construct(
        FormBuilderInterface $formBuilder,
        UrlGeneratorInterface $router
    ) {
        $this->formBuilder  = $formBuilder;
        $this->router       = $router;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'vote_form',
                [$this, 'renderVoteForm'],
                [
                    'needs_environment' => true,
                    'is_safe' => ['html'],
                ]
            ),
        ];
    }

    /**
     * Render vote form
     *
     * @param Twig_Environment $env
     *
     * @return string
     */
    public function renderVoteForm(\Twig_Environment $env, $questionId, $optionId)
    {
        $form = $this->formBuilder
            ->setData(VoteCommand::with($questionId, $optionId))
            ->setAction($this->router->generate('question_vote'))
            ->setMethod('POST')
            ->add('submit', SubmitType::class, ['label' => 'Voter'])
            ->getForm()
        ;

        return $env->render(
            'UIBundle:Question:vote_form.html.twig', [
                'vote_form' => $form->createView(),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'vote_form_extension';
    }
}