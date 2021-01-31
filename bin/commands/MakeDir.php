<?php
/**
 * Created by andrii
 * Date: 31.01.21
 * Time: 19:03
 */

namespace app\bin\commands;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeDir extends Command
{
    protected function configure()
    {
        $this->setName('make:dir')
            ->setHelp('Создать директорию')
            ->setDescription('Создать директорию и выставить для нее права')
            ->addArgument('path', InputArgument::REQUIRED, 'Директория, которую нужно создать')
            ->addArgument('permission', InputArgument::REQUIRED, 'Права для директории');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $path = $input->getArgument('path');
        $permission = $input->getArgument('permission');

        if (!file_exists(__DIR__ . '/../../' . $path)){
            mkdir(__DIR__ . '/../../' . $path, octdec( '0' . $permission));
        } else {
            chmod(__DIR__ . '/../../' . $path, octdec( '0' . $permission));
        }

        $output->writeln("Directory <info>/$path</info> was created with permission <info>$permission</info>.");
        return Command::SUCCESS;
    }
}
