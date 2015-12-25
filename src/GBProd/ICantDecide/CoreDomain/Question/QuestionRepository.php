<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

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
     * @param string $id
     *
     * @return QuestionInterface
     */
    public function find($id);

    /**
     * Find a question by its id
     *
     * @param string $id
     *
     * @return QuestionInterface
     */
    public function save(Question $question);
}
