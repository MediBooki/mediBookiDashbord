<?php

namespace App\Console\Commands\Tenants;

use App\Facade\Tenants;
use App\Models\Tenant;
use App\services\TenantService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate';

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
        $tenants = Tenant::get();
        $tenants->each(function ($tenant){
            // TenantService::switchToTenant($tenant);
            Tenants::switchToTenant($tenant);
            $this->info('Start migrating : '.$tenant->domain);
            $this->info('---------------------------------------');
            // Artisan::call('migrate --path=database/migrations/tenants/  --database=tenant');
            Artisan::call('migrate --path=database/migrations/  --database=tenant');
            $this->info(Artisan::output());
        });
        return 0;
    }
}
