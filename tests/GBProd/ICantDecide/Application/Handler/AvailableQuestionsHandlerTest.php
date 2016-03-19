<?php

namespace GBProd\ICantDecide\Application\Handler;

use GBProd\ICantDecide\Application\Handler\AvailableQuestionsHandler;
use GBProd\ICantDecide\Application\Query\AvailableQuestionsQuery;
use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;
use GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView\QuestionView;

/**
 * Tests for AvailableQuestionsHandler
 *
 * @author Gilles <gilles@1001pharmacies.com>
 */
class AvailableQuestionsHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testHandleReturnsAllQuestions()
    {
        $questions = $this->createQuestionsView();
        $repository = $this->createDataStoreWillFindAll($questions);

        $handler = new AvailableQuestionsHandler($repository);

        $this->assertEquals(
            $questions,
            $handler->handle(new AvailableQuestionsQuery())
        );
    }

    private function createQuestionsView()
    {
        return array(
            $this->createQuestionView('Question 1'),
            $this->createQuestionView('Question 2'),
            $this->createQuestionView('Question 3'),
        );
    }

    private function createQuestionView($text)
    {
        return QuestionView::fromQuestion(
            Question::ask(
                QuestionIdentifier::generate(),
                $text,
                new \DateTimeImmutable('+1 day')
            )
        );
    }

    private function createDataStoreWillFindAll($questions)
    {
        $datastore = $this->getMock(
            'GBProd\ICantDecide\Infrastructure\ReadModel\QuestionView\DataStore'
        );

        $datastore
            ->expects($this->any())
            ->method('findAll')
            ->willReturn($questions)
        ;

        return $datastore;
    }
}
