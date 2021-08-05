<?php
namespace App\Console\Commands;


use Illuminate\Console\Command;
use Log;

class StorageLinkCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'storage:link';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link from "public/storage" to "storage/app/public"';
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        if (file_exists(public_path('storage'))) {
            return $this->error('The "public/storage" directory already exists.');
        }
        $this->laravel->make('files')->link(storage_path('app/public'), public_path('storage'));

        $this->info('The [public/storage] directory has been linked.');
    }

    /**
     * Create a hard link to the target file or directory.
     *
     * @param  string  $target
     * @param  string  $link
     * @return void
     */
    public function link($target, $link)
    {
        if (! windows_os()) {
            return symlink($target, $link);
        }
        $mode = $this->isDirectory($target) ? 'J' : 'H';
        exec("mklink /{$mode} \"{$link}\" \"{$target}\"");
    }
}