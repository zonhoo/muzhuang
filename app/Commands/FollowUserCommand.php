<?php namespace App\Commands;

use App\Commands\Command;
use App\User;

class FollowUserCommand extends Command {

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
