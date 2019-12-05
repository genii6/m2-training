<?php


namespace Training\CustomCommand\Console\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class NewCommand extends Command
{
    const NAME = 'name';

    protected function configure()
    {
        $options = [
            new InputOption(
                self::NAME,
                null,
                InputOption::VALUE_OPTIONAL,
                'Name'
            )
        ];
        $this->setName("training:new:command");
        $this->setDescription("New Training Command");
        $this->setDefinition($options);

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($name = $input->getOption(self::NAME)) {
            $output->writeln('<info>Provided name is ' . $name . ' </info>');
        }
        $output->writeln("Executed new training command.");
    }

}