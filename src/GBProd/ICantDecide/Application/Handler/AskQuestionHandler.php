<?php

namespace GBProd\ICantDecide\Application\Handler;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand;
use GBProd\ICantDecide\CoreDomain\Question\QuestionFactory;
use GBProd\ICantDecide\CoreDomain\Question\QuestionIdentifier;
use GBProd\ICantDecide\CoreDomain\Question\QuestionRepository;

/**
 * Handler for AskQuestionCommand
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class AskQuestionHandler
{
    /**
     * @var QuestionRepository
     */
    private $repository;

    /**
     * @var QuestionFactory
     */
    private $factory;

    /**
     * @param QuestionRepository
     */
    public function __construct(QuestionRepository $repository, QuestionFactory $factory)
    {
       $this->repository = $repository;
       $this->factory    = $factory;
    }

    /**
     * Handle AskQuestionCommand
     *
     * @param AskQuestionCommand $command
     */
    public function handle(AskQuestionCommand $command)
    {
        $question = $this->factory->ask(
            $command->text,
            \DateTimeImmutable::createFromMutable($command->endDate)
        );

        $this->repository->save($question);

        return $question;
    }
}
