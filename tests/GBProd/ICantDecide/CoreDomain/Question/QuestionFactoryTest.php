<?php

namespace Tests\GBProd\ICantDecide\CoreDomain\Question;

use GBProd\ICantDecide\CoreDomain\Question\QuestionFactory;

/**
 * Tests for QuestionFactory
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class QuestionFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testAsk()
    {
        $factory = new QuestionFactory();
        $endDate = new \DateTimeImmutable('+1 day');
        
        $question = $factory->ask('Question ?', $endDate);
        
        $this->assertEquals('Question ?', $question->getText());
        $this->assertEquals($endDate, $question->getEndDate());
    }
}