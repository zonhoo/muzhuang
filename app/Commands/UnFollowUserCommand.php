<?php namespace App\Commands;

use App\Commands\Command;

class UnFollowUserCommand extends Command {

    public $userId;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        //
        $this->userId = $userId;
    }

}
