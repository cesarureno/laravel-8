<?php

namespace App\Console\Commands;

use App\Models\Corporation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a backup for the actual database';

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
        if(config('database.backup.mode') == 'both' || config('database.backup.mode') == 'manual') {
            Corporation::factory()->create();

            $this->info('Corporation created successfully');

            $this->info('Creating backup...');

            File::ensureDirectoryExists(storage_path() . "/app/backups/");

            $command = "mysqldump -u " . config('database.connections.mysql.username')
                . " -p" . config('database.connections.mysql.password') . " "
                . config('database.connections.mysql.database') . ' '
                . str_replace(',', ' ', config('database.backup.tables'))
                . " > " . storage_path() . "/app/backups/" . Carbon::now()->format('Y-m-d-h-i') . "-"
                . config('database.connections.mysql.database') . ".sql";

            exec($command);

            $this->info('Backup created successfully!');
        }
        else {
            $this->info('Backup manual mode is disabled');
        }

        return 0;
    }
}
