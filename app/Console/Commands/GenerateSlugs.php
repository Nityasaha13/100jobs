<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Job;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate slugs for existing users and jobs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating slugs for users...');
        $this->generateUserSlugs();

        $this->info('Generating slugs for jobs...');
        $this->generateJobSlugs();

        $this->info('Slugs generated successfully!');
    }

    /**
     * Generate slugs for users
     */
    private function generateUserSlugs()
    {
        $users = User::whereNull('slug')->get();

        foreach ($users as $user) {
            $slug = Str::slug($user->name);
            $originalSlug = $slug;
            $count = 1;

            while (User::where('slug', $slug)->where('id', '!=', $user->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $user->update(['slug' => $slug]);
            $this->line("Generated slug for user: {$user->name} -> {$slug}");
        }
    }

    /**
     * Generate slugs for jobs
     */
    private function generateJobSlugs()
    {
        $jobs = Job::whereNull('slug')->get();

        foreach ($jobs as $job) {
            $slug = Str::slug($job->role . '-' . $job->company);
            $originalSlug = $slug;
            $count = 1;

            while (Job::where('slug', $slug)->where('id', '!=', $job->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $job->update(['slug' => $slug]);
            $this->line("Generated slug for job: {$job->role} -> {$slug}");
        }
    }
}
