<?php

namespace Joinbiz\BizApp\Commands;

use Illuminate\Console\Command;

class BizAppCommand extends Command
{
    public $signature = 'joinbiz-plugin';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
