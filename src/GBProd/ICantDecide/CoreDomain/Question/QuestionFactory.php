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
    public function ask($text, array $optionsText, \DateTimeImmutable $endDate)
    {
        $questionIdentifier = QuestionIdentifier::generate();
        return Question::ask(
            $questionIdentifier,
            $text,
            $this->createOptions($questionIdentifier, $optionsText),
            $endDate
        );
    }
    
    private function createOptions($questionIdentifier, array $optionsText)
    {
        $position = 0;
        
        return array_map(
            function ($optionText) use ($position, $questionIdentifier) {
                return Option::give(
                    OptionIdentifier::build(
                        $questionIdentifier->getValue(), 
                        ++$position
                    ),
                    $optionText
                );
            },
            $optionsText
        );
    }
}