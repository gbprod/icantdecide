<?php

namespace GBProd\ICantDecide\Application\Handler;

use GBProd\ICantDecide\Application\Query\AvailableQuestionsQuery;
use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;
use GBProd\ICantDecide\CoreDomain\Specification\Question\IsAvailable;

/**
 * Handler for available questions
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class AvailableQuestionsHandler
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
     * Handle question query
     * 
     * @return array<Question>
     */
    public function handle(AvailableQuestionsQuery $query)
    {
        return $this->repository->findSatisfying(
            new IsAvailable()
        );
    }
}