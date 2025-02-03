<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use App\Http\Resources\Resources\VideoResource;
use App\Http\Resources\Collections\LikesCollection;
use App\Http\Resources\Collections\VideosCollection;
use App\Http\Resources\Collections\UnlikesCollection;
use App\Http\Resources\Collections\CommentsCollection;
use App\Http\Resources\Collections\AbuseReportsCollection;
use App\Http\Resources\Collections\FavoriteVideosCollection;

class VideosController extends Controller
{
    public function index()
    {
        return view('pages/videos/list');
    }

    public function list()
    {
        return new VideosCollection(Videos::all());
    }

    public function show(Videos $video)
    {
        return new VideoResource($video);
    }

    public function likes(Videos $video)
    {
        return new LikesCollection($video->likes);
    }

    public function unlikes(Videos $video)
    {
        return new UnlikesCollection($video->unlikes);
    }

    public function comments(Videos $video)
    {
        return new CommentsCollection($video->comments);
    }

    public function reports(Videos $video)
    {
        return new AbuseReportsCollection($video->abuse_reports);
    }

    public function favorites(Videos $video)
    {
        return new FavoriteVideosCollection($video->whos_favorite);
    }
}
