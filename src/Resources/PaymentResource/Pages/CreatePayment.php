<?php

namespace Joinbiz\BizApp\Resources\PaymentResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Joinbiz\BizApp\Resources\PaymentResource;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}
