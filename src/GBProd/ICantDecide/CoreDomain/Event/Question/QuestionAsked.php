<?php

namespace GBProd\ICantDecide\CoreDomain\Event\Question;

use GBProd\DomainEvent\DomainEvent;
use GBProd\ICantDecide\CoreDomain\Question\Question;

class QuestionAsked implements DomainEvent
{
    private $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function getAggregateId()
    {
        return $this->question->getId();
    }

    public function getQuestion()
    {
        return $this->question;
    }
}