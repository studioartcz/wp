<?php

/**
 * @file
 * Contains \StudioArtcz\composer\ScriptHandler.
 */

namespace StudioArtcz\composer;

use Composer\Script\Event;
use Composer\Util\ProcessExecutor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\ConsoleOutput;

class ScriptHandler {

    protected static function getWordpressRoot($project_root) {
        return $project_root .  '/web';
    }

    /**
     * Todo: create folders and right attributes
     * @param Event $event
     */
    public static function createRequiredFiles(Event $event) {
    }

    /**
     * Todo: delete old folders for rewrite by composer
     */
    public static function dependencyCleanup() {
    }

    /**
     * Install development dependencies for custom theme and run build tasker job
     * @param \Composer\Script\Event $event
     */
    public static function deployThemes(Event $event) {
        $finder = new Finder();
        $folders = $finder
            ->files()
            ->in(static::getWordpressRoot(getcwd()) . "/app/themes")
            ->depth('1');

        $output = new ConsoleOutput();
        $table = new Table($output);
        $table->setHeaders(array("Themes with npm modules"));

        $themes = array();
        foreach ($folders as $key => $item) {

            if (preg_match('/package.json$/', $item->getRelativePathname()))
            {
                $table->addRow(array($item->getRelativePathname()));
                $themes[] = str_replace('/package.json', '', $item->getRelativePathname());
            }

        }

        if(count($themes) > 0) $table->render();

        $executor = new ProcessExecutor($event->getIO());
        foreach($themes as $theme) {
            $outputEvent = null;
            $event->getIO()->write('>> Fired install for: ' . $theme);
            $executor->execute('npm install', $outputEvent, 'docroot/themes/' . $theme);
            $event->getIO()->write($outputEvent);
        }
    }

}