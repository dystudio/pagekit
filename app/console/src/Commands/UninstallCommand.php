<?php

namespace Pagekit\Console\Commands;

use Pagekit\Application\Console\Command;
use Pagekit\Installer\Installer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UninstallCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'uninstall';

    /**
     * {@inheritdoc}
     */
    protected $description = 'Uninstalls a Pagekit package.';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->addArgument('packages', InputArgument::IS_ARRAY, '[Package name]');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $updater = new Installer($this->container->path(), $output);
        $updater->uninstall((array) $this->argument('packages'));
    }

}
