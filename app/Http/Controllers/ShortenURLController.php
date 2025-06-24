<?php

namespace App\Http\Controllers;

use App\Http\Helper\ValidationHelper;
use App\Models\ShortenURL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortenURLController extends Controller
{
    public function shorten(Request $request)
    {

        $validated = ValidationHelper::validate($request, [
            'url' => 'required|url'
        ]);

        if($validated) return $validated;

        $shortCode = Str::random(6);

        $url = ShortenURL::create([
            'url' => $request->url,
            'shortCode' => $shortCode
        ]);

        return response()->json([
            'message' => 'URL Shorten',
             'url' => $url->makeHidden(['accessCount'])
        ], 201);
    }



    public function retrieve($shortCode)
    {
        if(ShortenURL::where('shortCode', $shortCode)->exists())
        {
            $url = ShortenURL::where('shortCode', $shortCode)->first();
            $url->increment('accessCount');
        
            return response()->json([
                'url' => $url->makeHidden(['accessCount'])
            ]);  
        };
        return response()->json(['message' => "Shorten URL: $shortCode does not exists."], 404);
    
    }


    public function update(Request $request, $shortCode)
    {
        if(ShortenURL::where('shortCode', $shortCode)->exists())
        {
           
            $validated = ValidationHelper::validate($request, [
                'url' => 'required|url'
            ]);

            if($validated) return $validated;

            ShortenURL::where('shortCode', $shortCode)->update(['url' => $request->url]);
            $url = ShortenURL::where('shortCode', $shortCode)->first();

            return response()->json([
                'message' => "$url->shortCode has been updated",
                'url' => $url->makeHidden(['accessCount'])
            ]);  
        };
        return response()->json(['message' => "Shorten URL: $shortCode does not exists."], 404);
    }



    public function delete($shortCode)
    {
        $url = ShortenURL::where('shortCode', $shortCode)->first();        

        if(!$url)
        {
            return response()->json([
                'status' => 'error',
                'message' => "Shorten URL: $shortCode does not exists."
            ], 404);
        }
        $url->delete();

        return response()->json([
            'status' => 'success',
            'message' => "shorten url $shortCode deleted successfully"
        ], 200);
    }
}