<?php namespace App\Handlers\Commands;

use App\Commands\UnFollowUserCommand;
use App\Follow;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class UnFollowUserCommandHandler {

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
	 * @param  UnFollowUserCommand  $command
	 * @return void
	 */
	public function handle(UnFollowUserCommand $command)
	{
		//
        //dd($command);
        $follow = Follow::whereRaw('user_id=? AND followed_id=?',[Auth::id(),$command->userId])->firstOrFail();
        $follow->delete();
	}

}
