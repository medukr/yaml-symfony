<?php
/**
 * Created by andrii
 * Date: 31.01.21
 * Time: 21:09
 */

namespace app\bin\commands;


use app\config\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

class TestYaml extends Command
{
    protected function configure()
    {
        $this->setName('test:yaml');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $config = Config::get()['app'];

        print_r($config);

        return Command::SUCCESS;
    }
}
