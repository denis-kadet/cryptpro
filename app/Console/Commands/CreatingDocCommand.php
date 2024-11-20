<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GeneratePdfFileService;

class CreatingDocCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docs:creating';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание справок';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new GeneratePdfFileService())->generatePdfFile();
    }
}
