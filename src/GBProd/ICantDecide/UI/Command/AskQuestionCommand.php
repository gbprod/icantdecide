<?php

namespace GBProd\ICantDecide\UI\Command;

use GBProd\ICantDecide\Application\Command\AskQuestionCommand as ApplicationAskQuestionCommand;
use League\Tactician\CommandBus;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command line to ask question
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class AskQuestionCommand extends Command
{
    private $commandBus;

    /**
     * {@inheritdoc}
     */
    public function __construct(CommandBus $commandBus)
    {
        parent::__construct();

        $this->commandBus = $commandBus;
    }
    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this
            ->setName('icantdecide:question:ask')
            ->addArgument('question', InputArgument::REQUIRED, 'Question')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new ApplicationAskQuestionCommand();
        $command->text = $input->getArgument('question');

        $this->commandBus->handle($command);

        $output->writeln(
            sprintf(
                'Asking "%s"',
                $input->getArgument('question')
            )
        );
    }
}
