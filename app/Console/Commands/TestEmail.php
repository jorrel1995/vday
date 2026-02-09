<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test sending an email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting test email...');
        try {
            Mail::raw('This is a test email sent from the artisan command.', function ($message) {
                $message->to('jorrel_95@hotmail.co.uk') // Or config('mail.from.address')
                        ->subject('Test Email from Artisan');
            });
            $this->info('Email sent successfully!');
        } catch (\Exception $e) {
            $this->error('Failed to send email: ' . $e->getMessage());
            Log::error('Email Test Failed: ' . $e->getMessage());
        }
    }
}
