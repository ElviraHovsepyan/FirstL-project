<?php

namespace App\Http\Controllers;

use App\YouTubeToken;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function start(){
        $client = $this->initClient();
        $token = YouTubeToken::where('id',1)->first();
        if($token){
            $client->setAccessToken($token->token);
        } else {
            $url = $client->createAuthUrl();
            return redirect($url);
        }
        return back();
    }

    public function initClient(){
        $client = new \Google_Client();
        $client->setAuthConfigFile(base_path('client_secret.json'));
        $client->setApprovalPrompt('force');
        $client->setAccessType('offline');
        $client->addScope('https://www.googleapis.com/auth/youtube');
        return $client;
    }

    public function getRedirectData(Request $request){
        if($request->has('code')){
            $code = $request->input('code');
            $client = $this->initClient();
            $client->authenticate($code);
            $token = $client->getAccessToken()['access_token'];
            $refreshToken = $client->getRefreshToken();
            $tokenRow = YouTubeToken::find(1);
            if(!$tokenRow){
                $token_obj = new YouTubeToken();
                $token_obj->user_id = 1;
                $token_obj->token = $token;
                $token_obj->refresh_token = $refreshToken;
                $token_obj->expires_in = Carbon::now()->addSecond(3600);
                $token_obj->save();
            }
        }
        return redirect()->route('start');
    }

    public function setClientToken(){
        $client = $this->initClient();
        $tokenRow = YouTubeToken::find(1);
        $expiry = $tokenRow->expires_in;
        $expiry = Carbon::parse($expiry);
        $now = Carbon::now();
        if($now->gt($expiry)){
            $client->refreshToken($tokenRow->refresh_token);
            $token = $client->getAccessToken();
            $tokenRow->token = $token['access_token'];
            $tokenRow->expires_in = Carbon::now()->addSecond(3600);
            $tokenRow->save();
            $client->setAccessToken($token);
        }
        else{
            $client->setAccessToken($tokenRow->token);
        }
        return $client;
    }

    public function searchView(){
        return view('default.search');
    }

    public function youTubeSearch(Request $request){
        $key = $request->key;
        $maxResults = $request->maxResults;
        $client = $this->setClientToken();
        $youtube = new \Google_Service_YouTube($client);
        $searchResponse = $youtube->search->listSearch('id,snippet', array(
            'q' => $key,
            'maxResults' => $maxResults,
        ));
        return json_encode($searchResponse);
    }

    public function upload(Request $request){
        $client = $this->setClientToken();
        $youtube = new \Google_Service_YouTube($client);
        $myVideo = $request->file('video');
        $videoPath = $myVideo->getPathname();

        $snippet = new \Google_Service_YouTube_VideoSnippet();
        $snippet->setTitle("First Upload");
        $snippet->setDescription("First description");
        $snippet->setTags(array("#first", "#favorito"));
        $snippet->setCategoryId("22");

        $status = new \Google_Service_YouTube_VideoStatus();
        $status->privacyStatus = "public";

        $video = new \Google_Service_YouTube_Video();
        $video->setSnippet($snippet);
        $video->setStatus($status);

        $chunkSizeBytes = 1 * 1024 * 1024;
        $client->setDefer(true);
        $insertRequest = $youtube->videos->insert("status,snippet", $video);
        $media = new \Google_Http_MediaFileUpload(
            $client,
            $insertRequest,
            'video/*',
            null,
            true,
            $chunkSizeBytes
        );
        $media->setFileSize(filesize($videoPath));
        $status = false;
        $handle = fopen($videoPath, "rb");
        while (!$status && !feof($handle)) {
            $chunk = fread($handle, $chunkSizeBytes);
            $status = $media->nextChunk($chunk);
        }
        fclose($handle);
        $client->setDefer(false);

        return redirect()->route('searchView');
    }

}








