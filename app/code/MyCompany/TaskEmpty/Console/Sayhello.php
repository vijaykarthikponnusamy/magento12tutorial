<?php
namespace MyCompany\TaskEmpty\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class Sayhello extends Command
{
   
   const NAME = 'name';

   protected function configure()
   {    
       //Direct set Name
       //$this->setName('example:sayhello');
       //$this->setDescription('Demo command line');
       
       //Set Variable
       
       $options = [
            new InputOption(
                self::NAME,
                null,
                InputOption::VALUE_REQUIRED,
                'Name'
            )
        ];

        $this->setName('example:sayhello')
            ->setDescription('Demo command line')
            ->setDefinition($options);

       parent::configure();
   }
   protected function execute(InputInterface $input, OutputInterface $output)
   {
       //$output->writeln("Hello World");

       if ($name = $input->getOption(self::NAME)) {
            $output->writeln("Hello " . $name);
        } else {
            $output->writeln("Hello World");
        }

        return $this;
   }
}