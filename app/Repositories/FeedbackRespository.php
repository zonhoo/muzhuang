<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 5/6/15
 * Time: 10:36 AM
 */

namespace App\Repositories;

use App\Feedback;
class FeedbackRespository {
    public function create($data)
    {
        return Feedback::create([
            'contact_type'=>$data['contact_type'],
            'contact'=>$data['contact'],
            'body'=>$data['body'],
        ]);
    }
} 