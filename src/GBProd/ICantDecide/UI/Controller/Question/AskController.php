<?php

namespace GBProd\ICantDecide\UI\Controller\Question;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand;
use GBProd\ICantDecide\Application\Query\AvailableQuestionsQuery;
use GBProd\ICantDecide\UI\Form\AskQuestionType;
use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\RouterInterface;

/**
 * Controller for Questions
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class AskController extends Controller
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param CommandBus $commandBus
     */
    public function __construct(
        CommandBus $commandBus,
        EngineInterface $templating,
        FormFactory $formFactory,
        RouterInterface $router,
        SessionInterface $session
    )  {
        $this->templating  = $templating;
        $this->commandBus  = $commandBus;
        $this->formFactory = $formFactory;
        $this->router      = $router;
        $this->session     = $session;
    }


    /**
     * Question index action
     *
     * @return Response
     */
    public function ask(Request $request)
    {
        $command = new AskQuestionCommand();
        $command->options = ['', '', ''];

        $form = $this->formFactory
            ->createBuilder(AskQuestionType::class, $command)
            ->setMethod('POST')
            ->add('submit', SubmitType::class)
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $question = $this->commandBus->handle($command);
            $this->session->getFlashBag()->add('notice', 'Question Ajoutée');

            return $this->redirect(
                $this->router->generate('question_index')
            );
        }

        return $this->templating->renderResponse(
            'UIBundle:Question:ask.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
