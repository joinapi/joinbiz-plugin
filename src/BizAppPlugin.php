<?php

namespace Joinbiz\BizApp;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Joinbiz\BizApp\Resources\AcctgTransResource;
use Joinbiz\BizApp\Resources\FinAccountResource;
use Joinbiz\BizApp\Resources\GlAccountResource;
use Joinbiz\BizApp\Resources\PartyGroupResource;

class BizAppPlugin implements Plugin
{
    public function getId(): string
    {
        return 'biz-app-plugin';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            AcctgTransResource::class,
            FinAccountResource::class,
            PartyGroupResource::class,
            GlAccountResource::class,

        ]);
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
