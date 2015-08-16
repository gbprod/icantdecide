<?php

namespace GBProd\ICantDecide\CoreDomain\Model;

use GBProd\ICantDecide\CoreDomain\Model\AuthorInterface;

/**
 * Interface for question repository
 *
 * @author gbprod <contact@gb-prod.fr>
 */
interface QuestionRepositoryInterface
{
    /**
     * Create a question
     *
     * @return QuestionInterface
     */
    public function create($text, AuthorInterface $author);

    /**
     * Find a question by its id
     *
     * @param string $id
     *
     * @return QuestionInterface
     */
    public function find($id);

    /**
     * Persist a question
     *
     * @param QuestionInterface $question
     */
    public function persist(QuestionInterface $question);

    /**
     * Remove a question
     *
     * @param QuestionInterface $question
     */
    public function remove(QuestionInterface $question);

}
