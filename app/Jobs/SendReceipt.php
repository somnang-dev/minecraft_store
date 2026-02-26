<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SendReceipt implements ShouldQueue
{

    use Queueable;
    private $path;
    private $name;

    /**
     * Create a new job instance.
     */
    public function __construct($path, $name)
    {
        $this->path = $path;
        $this->name = $name;
    }
        
        /**
         * Execute the job.
        */
        public function handle(): void
        {
            //
            Log::info('WOrking broo', );
           $fileContent = Storage::disk('public')->get($this->path);
            Http::attach(
                'file',
                $fileContent,
                basename($this->path),
            )->post(env('DISCORD_WEBHOOK'), [
                'content' => "Receipt was sent \nName: " . $this->name
            ]);
    }
}
