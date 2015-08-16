<?php

namespace GBProd\ICantDecide\CoreDomain\Model;

/**
 * Interface for option
 *
 * @author gbprod <contact@gb-prod.fr>
 */
interface OptionInterface
{
    /**
     * Get the text of the option
     *
     * @return string
     */
    public function getText();

    /**
     * Add a vote to this option
     *
     * @return self
     */
    public function addVote();

    /**
     * Get votes count
     *
     * @return int
     */
    public function getVoteCount();

    /**
     * Get the question related to this option
     *
     * @return QuestionInterface
     */
    public function getQuestion();
}
