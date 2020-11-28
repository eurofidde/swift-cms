<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swift:createuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a generice user';

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
        $user = new User();
        $user->password = Hash::make('changeme');
        $user->email = 'admin@admin.com';
        $user->name = 'Admin';
        $user->group = 'Admin';
        $user->save();
        echo 'User Created - ';
        echo 'Username: Admin, ';
        echo 'Email: admin@admin.com, ';
        echo 'Password: changeme  ';
        return 0;
    }
}
