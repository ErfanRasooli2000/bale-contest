<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlShorterRequest;
use App\Models\LinkShorter;
use Illuminate\Support\Facades\Redis;

class LinkShorterController extends Controller
{
    public function short(UrlShorterRequest $request)
    {
        $url = $request->validated()['url'];

        $url = LinkShorter::query()
            ->firstOrCreate([
                'link' => $url
            ],[
                'uniqueId' => $this->uniqueCreate()
            ]);


        Redis::set($url->uniqueId , $url->link , "EX" , 10);

        return response()->json([
            'short-url' => route('redirector' , ['url' => $url->uniqueId])
        ],200);
    }

    private function uniqueCreate()
    {
        $unique = uniqid();

        if (LinkShorter::where('uniqueId' , $unique)->exists())
            return $this->uniqueCreate();

        return $unique;
    }

    public function redirector($id)
    {
        $url = Redis::get($id);
        $link = $url;

        if (is_null($url))
        {
            $url = LinkShorter::query()
                ->where('uniqueId',$id)
                ->firstOrFail();

            $link = $url->link;
        }

        return redirect()->away($link);
    }
}
