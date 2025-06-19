<?php

namespace Joinbiz\BizApp\Resources\PaymentResource\Pages;

use Joinbiz\BizApp\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}
