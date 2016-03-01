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
            $this->createQuestion('Question 1'),
            $this->createQuestion('Question 2'),
            $this->createQuestion('Question 3'),
        );
    }
    
    private function createQuestion($text)
    {
        return Question::ask(
            QuestionIdentifier::generate(), 
            $text,
            new \DateTimeImmutable('+1 day')
        );
    }
    
    private function createRepositoryWillFindAll($questions)
    {
        $repository = $this->getMock(
            'GBProd\ICantDecide\CoreDomain\Question\QuestionRepository'
        );

        $repository
            ->expects($this->any())
            ->method('findSatisfying')
            ->with($this->isInstanceOf('GBProd\ICantDecide\CoreDomain\Specification\Question\IsAvailable'))
            ->willReturn($questions)
        ;

        return $repository;
    }
}
