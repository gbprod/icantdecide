<?php

namespace GBProd\ICantDecide\CoreDomain\Tests\Question;

use GBProd\ICantDecide\CoreDomain\Question\Question;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;

/**
 * Tests for question
 *
 * @author GBProd <contact@gb-prod.fr>
 */
class QuestionTest extends \PHPUnit_Framework_TestCase
{
    public function testAsk()
    {
        $question = Question::ask(
            QuestionIdentifier::create('id'),
            'Question ?'
        );

        $this->assertEquals(
            'id',
            $question->getId()->getValue()
        );

        $this->assertEquals(
            'Question ?',
            $question->getText()
        );
    }
}
