<?php

namespace Joinbiz\BizApp\Resources\PersonResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Joinbiz\BizApp\Resources\PersonResource;

class CreatePerson extends CreateRecord
{
    protected static string $resource = PersonResource::class;
}
