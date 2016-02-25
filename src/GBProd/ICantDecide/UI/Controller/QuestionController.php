<?php

namespace GBProd\ICantDecide\UI\Controller;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand;
use GBProd\ICantDecide\Application\Query\AvailableQuestionsQuery;
use GBProd\ICantDecide\UI\Form\AskQuestionType;
use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller for Questions
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class QuestionController extends Controller
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
     * @param CommandBus $commandBus
     */
    public function __construct(
        CommandBus $commandBus,
        EngineInterface $templating,
        FormFactory $formFactory
    )  {
        $this->templating  = $templating;
        $this->commandBus  = $commandBus;
        $this->formFactory = $formFactory;
    }

    /**
     * Question index action
     *
     * @return Response
     */
    public function index()
    {
        $query = new AvailableQuestionsQuery();
        $result = $this->commandBus->handle($query);

        return $this->templating->renderResponse(
            'UIBundle:Question:index.html.twig',
            array(
                'questions' => $result,
            )
        );
    }

    /**
     * Question index action
     *
     * @return Response
     */
    public function ask(Request $request)
    {
        $command = new AskQuestionCommand();

        $form = $this->formFactory->create(
            AskQuestionType::class,
            $command
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            $question = $this->commandBus->handle($command);
            dump($question); exit;
        }

        return $this->templating->renderResponse(
            'UIBundle:Question:ask.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
