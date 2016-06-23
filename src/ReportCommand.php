<?php
/*
 * This file is part of phpcov.
 *
 * (c) Scato Eggen <scato.eggen@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\PHPCOV;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @since Class available since Release <unreleased>
 */
class ReportCommand extends BaseCommand
{
    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this->setName('report')
             ->addArgument(
                 'coverage',
                 InputArgument::REQUIRED,
                 'Exported code coverage object'
             )
             ->addOption(
                 'clover',
                 null,
                 InputOption::VALUE_REQUIRED,
                 'Generate code coverage report in Clover XML format'
             )
             ->addOption(
                 'crap4j',
                 null,
                 InputOption::VALUE_REQUIRED,
                 'Generate code coverage report in Crap4J XML format'
             )
             ->addOption(
                 'html',
                 null,
                 InputOption::VALUE_REQUIRED,
                 'Generate code coverage report in HTML format'
             )
             ->addOption(
                 'text',
                 null,
                 InputOption::VALUE_NONE,
                 'Write code coverage report in text format to STDOUT'
             )
             ->addOption(
                 'xml',
                 null,
                 InputOption::VALUE_REQUIRED,
                 'Generate code coverage report in PHPUnit XML format'
             );
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface  $input  An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return null|int null or 0 if everything went fine, or an error code
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $coverage = include($input->getArgument('coverage'));
        
        $this->handleReports($coverage, $input, $output);
    }
}
