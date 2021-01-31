<?php
/**
 * Created by andrii
 * Date: 31.01.21
 * Time: 20:43
 */

namespace app\bin\commands;


use app\config\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeployRun extends Command
{
    protected function configure()
    {
        $this->setName('deploy:run')
            ->setHelp('Выполнить необходимые действия для развертывания')
            ->setDescription('Выполнить необходимые действия для развертывания');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commands = Config::get()['deploy']['command'];

        foreach ($commands as $item){
            $command = $this->getApplication()->find($item);
            $command->run(new ArrayInput([]), $output);
        }

        return Command::SUCCESS;
    }


}
