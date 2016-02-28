<?php

namespace GBProd\ICantDecide\CoreDomain\Question;

use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;

/**
 * Factory for Questions
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
final class QuestionFactory
{
    /**
     * Create a Question
     * 
     * @param string    $text
     * @param \DateTimeImmutable $endDate
     */
    public function ask($text, \DateTimeImmutable $endDate)
    {
        return Question::ask(
            QuestionIdentifier::generate(),
            $text,
            $endDate
        );
    }
}