<?php

namespace GBProd\ICantDecide\UI\Command;

use GBProd\ICantDecide\Application\Query\AvailableQuestionsQuery;
use League\Tactician\CommandBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command ti list available questions
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class AvailableQuestionsCommand extends Command
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * {@inheritdoc}
     */
    public function __construct(CommandBus $commandBus)
    {
        parent::__construct();

        $this->commandBus = $commandBus;
    }

    public function configure()
    {
        $this
            ->setName("icantdecide:question:available")
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $query = new AvailableQuestionsQuery();

        $questions = $this->commandBus->handle($query);

        foreach ($questions as $question) {
            $output->writeln($question->getText()." ".$question->getEndDate()->format('Y-m-d H:i:s'));
        }
    }
}
