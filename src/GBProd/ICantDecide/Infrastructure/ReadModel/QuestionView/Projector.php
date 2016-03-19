<?php

namespace GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView;

use GBProd\DomainEventBundle\Event\Event;
use Elastica\Type;
use Elastica\Document;

class Projector
{
    private $dataStore;

    public function __construct(DataStore $dataStore)
    {
        $this->dataStore = $dataStore;
    }

    public function onQuestionAsked(Event $event)
    {
        $question = $event->getDomainEvent()->getQuestion();
        $view = QuestionView::fromQuestion($question);

        $this->dataStore->save($view);
    }
}