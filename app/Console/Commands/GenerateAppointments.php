<?php

namespace App\Console\Commands;

use App\Http\Traits\ConsultationTrait;
use App\Models\Consultation;
use Illuminate\Console\Command;

class GenerateAppointments extends Command
{
    use ConsultationTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:appointments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate appointments from consultations table';

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
        $consultations = Consultation::all();
        $consultations->each(function ($consultation) {
            $this->updateOrGenerateAppointments($consultation);
        });


        return Command::SUCCESS;
    }
}
