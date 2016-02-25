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
        $id = QuestionIdentifier::generate();

        $question = Question::ask($id, 'Question ?');

        $this->assertEquals(
            $id,
            $question->getId()
        );

        $this->assertEquals(
            'Question ?',
            $question->getText()
        );
    }
}
