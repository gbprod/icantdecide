<?php

namespace GBProd\ICantDecide\UI\Controller;

use GBProd\ICantDecide\Application\Query\AvailableQuestionsQuery;
use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
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
        
        return $this->render(
            'UI:Question:index.html.twig',
            array(
                'questions' => $result,
            )
        );
    }
}
