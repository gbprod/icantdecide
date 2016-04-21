<?php

namespace GBProd\ICantDecide\Application\Command;

/**
 * Command to vote for an option
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class VoteCommand
{
    /**
     * @var string
     */
    public $questionId;
    
    /**
     * @var string
     */
    public $optionId;
    
    public static function with($questionId, $optionId)
    {
        $command = new self();
        $command->questionId = $questionId;
        $command->optionId = $optionId;
    
        return $command;
    }
}
