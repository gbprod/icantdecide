<?php

namespace GBProd\ICantDecide\Application\Handler;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand;
use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;

/**
 * Handler for AskQuestionCommand
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class AskQuestionHandler
{
    /**
     * @var QuestionRepository
     */
    private $repository;
    
    /**
     * @param QuestionRepository
     */
    public function __construct(QuestionRepository $repository)
    {
       $this->repository = $repository;
    }
    
    /**
     * Handle AskQuestionCommand
     * 
     * @param AskQuestionCommand $command
     */
    public function handle(AskQuestionCommand $command)
    {
        return Question::ask(
            $command->text
        );
    }
}