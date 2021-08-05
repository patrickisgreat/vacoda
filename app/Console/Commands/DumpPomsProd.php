<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use phpseclib\Net\SSH2;
use phpseclib\Crypt\RSA;

class DumpPomsProd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:pomsdump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get A Fresh Dump from Poms production DB';

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
        //login to poms prod
        define('NET_SSH2_LOGGING', NET_SSH2_LOG_COMPLEX);

        $ssh = new SSH2('162.242.235.139');

        $key = new RSA();

        $key->setPassword('n1njAst@r');

        $key->loadKey(file_get_contents('/home/vagrant/.ssh/id_rsa.pub'));
        if (!$ssh->login('forge', $key)) {
            echo $ssh->getLog();
            exit('Login Failed');
        }

        //make the sql dump
        echo $ssh->exec('mysqldump -P 3306 -h 162.242.235.139 -u forge --password=Yz0I6xxtIMqkS8aJ1DVr forge > /home/forge/poms_prod.sql');

        //copy the sql dump
        $local_command = 'scp forge@162.242.235.139:/home/forge/poms_prod.sql '.app_path('database/migrations/');
        exec($local_command, $output, $return);
        echo $output;
        echo $return;
    }
}
