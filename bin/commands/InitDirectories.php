<?php
/**
 * Created by andrii
 * Date: 31.01.21
 * Time: 20:20
 */

namespace app\bin\commands;


use app\config\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InitDirectories extends Command
{
    protected function configure()
    {
        $this->setName('init:directories')
            ->setHelp('Создать все необходимые директории')
            ->setDescription('Создать все необходимые директории');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $directories = Config::get()['deploy']['directories'];

        $command = $this->getApplication()->find('make:dir');

        foreach ($directories as $arguments) {
            $greetInput = new ArrayInput($arguments);
            $command->run($greetInput, $output);
        }

        return Command::SUCCESS;
    }
}
