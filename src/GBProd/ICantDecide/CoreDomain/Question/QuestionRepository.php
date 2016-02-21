<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;

/**
 * Interface for question repository
 *
 * @author gbprod <contact@gb-prod.fr>
 */
interface QuestionRepository
{
    /**
     * Find a question by its id
     *
     * @param QuestionIdentifier $id
     *
     * @return QuestionInterface
     */
    public function find(QuestionIdentifier $id);

    /**
     * Find a question by its id
     *
     * @param string $id
     *
     * @return QuestionInterface
     */
    public function save(Question $question);

    /**
     * Find all questions
     *
     * @return array<QuestionInterface>
     */
    public function findAll();
}
