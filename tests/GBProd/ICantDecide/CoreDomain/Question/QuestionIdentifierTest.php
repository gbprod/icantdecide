<?php

namespace Tests\GBProd\ICantDecide\CoreDomain\Question;

use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;

/**
 * Test for QuestionIdentifier
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class QuestionIdentifierTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $id = QuestionIdentifier::generate();

        $this->assertInstanceOf(
            'Ramsey\Uuid\Uuid',
            $id->getValue()
        );
    }
}
