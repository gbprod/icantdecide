<?php

namespace GBProd\ICantDecide\Application\Handler;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand;
use GBProd\ICantDecide\Application\Handler\AskQuestionHandler;
use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionFactory;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;

/**
 * Tests for AskQuestionHandler
 *
 * @author Gilles <gilles@1001pharmacies.com>
 */
class AskQuestionHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testHandle()
    {
        $questionText = 'Question ?';

        $command = new AskQuestionCommand();
        $command->text = $questionText;
        $command->endDate = new \DateTime('+1 day');

        $handler = new AskQuestionHandler(
            $this->createRepositoryExpectsSave($questionText),
            new QuestionFactory()
        );

        $question = $handler->handle($command);

        $this->assertInstanceOf(
            'GBProd\ICantDecide\CoreDomain\Question\Question',
            $question
        );

        $this->assertEquals(
            $questionText,
            $question->getText()
        );
    }

    public function createRepositoryExpectsSave($questionText)
    {
        $repository = $this->getMock(
            'GBProd\ICantDecide\CoreDomain\Question\QuestionRepository'
        );

        $repository
            ->expects($this->once())
            ->method('save')
            ->with(
                $this->isInstanceOf('GBProd\ICantDecide\CoreDomain\Question\Question')
            )
        ;

        return $repository;
    }
    
    
    public function testHandleChangeDateTimeToImmutable()
    {
        $questionText = 'Question ?';

        $command = new AskQuestionCommand();
        $command->text = $questionText;
        $command->endDate = new \DateTime('+1 day');

        $handler = new AskQuestionHandler(
            $this->createRepositoryExpectsSave($questionText),
            new QuestionFactory()
        );

        $question = $handler->handle($command);

        $this->assertInstanceOf('\DateTimeImmutable', $question->getEndDate());
        $this->assertEquals($command->endDate, $question->getEndDate());
    }
}
