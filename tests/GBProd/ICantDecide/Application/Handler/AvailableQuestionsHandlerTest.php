<?php

namespace GBProd\ICantDecide\Application\Handler;

use GBProd\ICantDecide\Application\Handler\AvailableQuestionsHandler;
use GBProd\ICantDecide\Application\Query\AvailableQuestionsQuery;
use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;

/**
 * Tests for AvailableQuestionsHandler
 *
 * @author Gilles <gilles@1001pharmacies.com>
 */
class AvailableQuestionsHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testHandleReturnsAllQuestions()
    {
        $questions = $this->createQuestions();
        $repository = $this->createRepositoryWillFindAll($questions);

        $handler = new AvailableQuestionsHandler($repository);

        $this->assertEquals(
            $questions,
            $handler->handle(new AvailableQuestionsQuery())
        );
    }

    private function createQuestions()
    {
        return array(
            Question::ask(QuestionIdentifier::generate(), 'Question 1'),
            Question::ask(QuestionIdentifier::generate(), 'Question 2'),
            Question::ask(QuestionIdentifier::generate(), 'Question 3')
        );
    }

    private function createRepositoryWillFindAll($questions)
    {
        $repository = $this->getMock(
            'GBProd\ICantDecide\CoreDomain\Question\QuestionRepository'
        );

        $repository
            ->expects($this->any())
            ->method('findAll')
            ->willReturn($questions)
        ;

        return $repository;
    }
}
