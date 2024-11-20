<?php

namespace App\Console\Commands;

use App\Models\Sign;
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
        Sign::whereNull('status_id')->get()->each(function($item){
            (new GeneratePdfFileService())->generatePdfFile($item->toArray());
        }); 
    }
}
