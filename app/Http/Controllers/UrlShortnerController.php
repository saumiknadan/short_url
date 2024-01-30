<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UrlShortner;

class UrlShortnerController extends Controller
{
    public function short(Request $request)
    {
        $originalUrl = $request->original_url;

        if (auth()->user()) {
            $newUrl = auth()->user()->links()->create([
                'original_url'=>$request->original_url,
            ]);
        } else {
            $newUrl = UrlShortner::create([
                'original_url'=>$request->original_url, 
            ]);
        }
        
    
        
        // $newUrl = UrlShortner::create([
        //     'original_url' => $originalUrl,
        // ]);

        if($newUrl){
            $shortUrl = base_convert($newUrl->id+100000000,10,36);

            $newUrl->update(['short_url'=>$shortUrl]);

            return response()->json([
                'success'=>true,
                'message'=>'Short Url Created Successfully',
                'data' =>[
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

    public function show($id)
    {
        $short_url = UrlShortner::where('short_url', $id)->first();
        if ($short_url) {
        return redirect()->to(url($short_url->original_url));
        }
    }
}
