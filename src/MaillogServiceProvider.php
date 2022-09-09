<?php

namespace Wulfheart\Maillog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Wulfheart\Maillog\Commands\MaillogCommand;

class MaillogServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-maillog')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-maillog_table')
            ->hasCommand(MaillogCommand::class);
    }
}
