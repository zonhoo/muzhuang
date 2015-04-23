<?php namespace App\Handlers\Commands;

use App\Commands\FollowUserCommand;
use App\Follow;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class FollowUserCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  FollowUserCommand  $command
	 * @return void
	 */
	public function handle(FollowUserCommand $command)
	{
		//
        $follow = new Follow();
        $follow->user_id = Auth::id();
        $follow->followed_id = $command->userId;
        $follow->save();
	}

}
