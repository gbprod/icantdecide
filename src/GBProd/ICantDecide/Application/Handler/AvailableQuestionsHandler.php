<?php

namespace GBProd\ICantDecide\Application\Handler;

use GBProd\ICantDecide\Application\Query\AvailableQuestionsQuery;
use GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView\DataStore;
use GBProd\ICantDecide\CoreDomain\Specification\Question\IsAvailable;

/**
 * Handler for available questions
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class AvailableQuestionsHandler
{
    /**
     * @var DataStore
     */
    private $dataStore;

    /**
     * @param DataStore
     */
    public function __construct(DataStore $dataStore)
    {
       $this->dataStore = $dataStore;
    }

    /**
     * Handle question query
     *
     * @return array<Question>
     */
    public function handle(AvailableQuestionsQuery $query)
    {
        return $this->dataStore->findAll();
    }
}