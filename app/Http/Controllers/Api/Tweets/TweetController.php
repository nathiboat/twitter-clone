<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetStoreReqest;
use App\Tweets\TweetType;

class TweetController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }
    
    public function store(TweetStoreReqest $request)
    {
        // will add validation
        $tweet = $request->user()->tweets()->create(array_merge($request->only('body'), [
            'type' => TweetType::TWEET
        ]));

        broadcast(new TweetWasCreated($tweet));
    }
}
