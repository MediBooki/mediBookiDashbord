<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LandlordMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Start migrating LandLord System : ');
        $this->info('---------------------------------------');
        // Artisan::call('migrate --path=database/migrations/tenants/  --database=tenant');
        Artisan::call('migrate --path=database/migrations/landlord/  --database=landlord');
        $this->info(Artisan::output());
        return 0;
    }
}
