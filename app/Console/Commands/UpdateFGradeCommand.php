<?php

namespace App\Console\Commands;

use App\Models\PostponeApplication;
use Illuminate\Console\Command;

class UpdateFGradeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-f-grade-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'After grade has been update to i perform update after the first year';
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Get list obj of outdate application
        // update it to F
        // no it not a good way to solve this
        // if i use this command i may have to update it every single day
        $App = PostponeApplication::select('updated_at')->where('result','i')->get();
        $App = PostponeApplication::whereRaw("DATEDIFF(CURDATE(), updated_at)")
            ->where('result','i')->get();

    }
}
