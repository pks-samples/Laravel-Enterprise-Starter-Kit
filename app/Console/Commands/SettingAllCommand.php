<?php

namespace App\Console\Commands;

use App\Libraries\Arr;
use Illuminate\Console\Command;
use Settings;

class SettingAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves all settings';

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
     * @return mixed
     */
    public function handle()
    {
        try {
            $settings = Settings::all();
            $settings = Arr::dot($settings);

            foreach($settings as $key => $value) {
                $this->line("$key=$value");
            }

        } catch (\Exception $ex) {
            $this->error("Exception: ". $ex->getMessage());
            $this->error("Stack trace: ". $ex->getTraceAsString());
        }
    }
}