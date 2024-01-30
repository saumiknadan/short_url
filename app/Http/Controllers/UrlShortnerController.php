<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrlShortner;

class UrlShortnerController extends Controller
{
    public function short(Request $request)
    {
        $originalUrl = $request->original_url;

        $newUrl = UrlShortner::create([
            'original_url' => $originalUrl,
        ]);

        if($newUrl){
            $shortUrl = base_convert($newUrl->id+100000000,10,36);

            $newUrl->update(['short_url'=>$shortUrl]);

            return response()->json([
                'success'=>true,
                'message'=>'Short Url Created Successfully',
                'date' =>[
                    'original_url'=>$originalUrl,
                    'short_url'=>url($shortUrl),
                ],
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to create short URL',
            'data' => null,
        ]);
    }
}
