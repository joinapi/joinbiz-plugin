<?php

namespace Joinbiz\BizApp\Resources\PersonResource\Pages;

use Joinbiz\BizApp\Resources\PersonResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePerson extends CreateRecord
{
    protected static string $resource = PersonResource::class;
}
