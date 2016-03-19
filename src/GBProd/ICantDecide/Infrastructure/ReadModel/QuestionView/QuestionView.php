<?php

namespace GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView;

use GBProd\ICantDecide\CoreDomain\Question\Question;
use Elastica\Type;
use Elastica\Document;

class QuestionView
{
    public $id;
    public $text;
    public $endDate;

    public static function fromQuestion(Question $question)
    {
        $view = new self();
        $view->id      = $question->getId()->getValue();
        $view->text    = $question->getText();
        $view->endDate = $question->getEndDate()->format('Y-m-d H:i:s');

        return $view;
    }
}