<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use GuzzleHttp\Client;


class AuthController extends Controller
{
    public function root(Request $request)
    {
        $dark_status = $request->cookie('dark_status');
        $auth_id = $request->cookie('auth_id');
        if ($auth_id == null)
            return view('root');
        else
            return view('dashboard', [
                'auth_id' => $auth_id,
                'dark_status' => $dark_status
            ]);
    }
    // -
    public function login(Request $request)
    {
        $auth_id = $request->cookie('auth_id');
        if($auth_id != null)
            return redirect()->back()->withErrors("already_login");
        $random_string = Str::random(16);
        \Cookie::queue('auth_id', $random_string, 7200);
        \Cookie::queue('dark_status', 'light', 7200);
        return redirect()->back();
    }
    // -
    public function booking(Request $request, $id)
    {
        return view('booking', [
            'id' => $id
        ]);
    }
    // -
    public function askApi(Request $request)
    {
        $promot = $request->all()['promot'];
        if ($promot == null)
            return redirect()->back();
        $auth_id = $request->cookie('auth_id');
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'prompt' => $promot,
                'model' => 'text-davinci-003',
                'temperature' => 0.7,
                'max_tokens' => 1000,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ],
        ]);
        $result = json_decode($response->getBody()->getContents());
        $text = $result->choices[0]->text;
        if ($text[0] == "\n" || $text[1] == "\n")
            $text = substr($text, 2, Str::length($text));
        return redirect()->route('root', [
            'ai_text' => $text,
            'promot' => $promot
        ]);
    }
    // -
    public function dark_mode(Request $request)
    {
        $dark_status = $request->cookie('dark_status');
        if ($dark_status == 'light')
            \Cookie::queue('dark_status', 'dark', 7200);
        else
            \Cookie::queue('dark_status', 'light', 7200);
        return redirect()->back();
    }
}
