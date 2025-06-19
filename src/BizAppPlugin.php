<?php

namespace Joinbiz\BizApp;

use Filament\Contracts\Plugin;
use Filament\Panel;

class BizAppPlugin implements Plugin
{
    public function getId(): string
    {
        return 'biz-app-plugin';
    }

    public function register(Panel $panel): void
    {
        $panel->discoverResources(__DIR__ . '/../Resources', 'Joinbiz\BizApp\Resources');
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
