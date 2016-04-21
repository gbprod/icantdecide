<?php

namespace GBProd\ICantDecide\Application\Handler;

use GBProd\ICantDecide\Application\Command\VoteCommand;
use GBProd\ICantDecide\CoreDomain\Question\OptionIdentifier;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;
use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;

/**
 * Handler for VoteCommand
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class VoteHandler
{
    /**
     * @var QuestionRepository
     */
    private $repository;

    /**
     * @param QuestionRepository
     */
    public function __construct(QuestionRepository $repository)
    {
       $this->repository = $repository;
    }

    /**
     * Handle VoteCommand
     *
     * @param VoteCommand $command
     */
    public function handle(VoteCommand $command)
    {
        $question =$this->repository->find(
            QuestionIdentifier::create($command->questionId)
        );
        
        // WIP
    }
}
