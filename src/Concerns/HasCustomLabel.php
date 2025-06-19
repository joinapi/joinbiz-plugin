<?php

namespace Joinbiz\BizApp\Concerns;

use function Filament\Support\get_model_label;

trait HasCustomLabel
{
    public static function getNavigationLabel(): string
    {
        return static::$navigationLabel ?? strtoupper(static::getTitleCasePluralModelLabel());
    }

    public static function getModelLabel(): string
    {
        return static::$modelLabel ?? static::getLabel() ?? strtoupper(get_model_label(static::getModel()));
    }

}
