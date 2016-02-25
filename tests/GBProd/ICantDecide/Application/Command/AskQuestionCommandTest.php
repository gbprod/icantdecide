<?php

namespace GBProd\ICantDecide\Application\Command;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand;

/**
 * Tests for AskQuestionCommand
 *
 * @author Gilles <gilles@1001pharmacies.com>
 */
class AskQuestionCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        new AskQuestionCommand();
    }
}
