<?php namespace App\Http\Controllers\api\v1;

use App\Feedback;

use App\Repositories\FeedbackRespository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends BaseController {

    public $feedback;

    public function __construct(FeedbackRespository $feedbackRespository)
    {
        $this->feedback = $feedbackRespository;
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        //验证
        $v = Validator::make($request->all(),[
            'contact_type'=>'required',
            'contact'=>'required',
            'body'=>'required',
        ]);

        if($v->fails()){
            return response()->json($v->errors());
        }
		//
        $feedback = $this->feedback->create($request->all());
        if($feedback->id){
            $result = ['msg'=>'submit success','err_code'=>'0'];
        }else{
            $result = ['msg'=>'submit failed','err_code'=>'1'];
        }
        return response()->json($result);
	}

}
