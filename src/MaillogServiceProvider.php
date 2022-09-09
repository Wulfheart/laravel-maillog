<?php

namespace Wulfheart\Maillog;

use Illuminate\Support\Facades\Event;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Wulfheart\Maillog\Commands\MaillogCommand;
use Wulfheart\Maillog\Listeners\SaveMail;

class MaillogServiceProvider extends PackageServiceProvider
{

    public function boot()
    {
        parent::boot();

        Event::listen('Illuminate\Mail\Events\MessageSent', SaveMail::class);
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('maillog')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('web')
            ->hasMigration('create_maillog_table')
            ->hasCommand(MaillogCommand::class)
            ->hasInstallCommand(fn(InstallCommand $command) => $command
                ->publishConfigFile()
                ->publishMigrations()
                ->askToRunMigrations()
                ->askToStarRepoOnGitHub("Wulfheart/laravel-maillog")
            );
    }
}
