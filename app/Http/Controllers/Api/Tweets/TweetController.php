<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetStoreReqest;

class TweetController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }
    
    public function store(TweetStoreReqest $request)
    {
        // will add validation
        $tweet = $request->user()->tweets()->create($request->only('body'));

        broadcast(new TweetWasCreated($tweet));
    }
}
