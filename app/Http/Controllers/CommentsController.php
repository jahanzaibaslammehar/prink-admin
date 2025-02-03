<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\CommentsCollection;
use App\Http\Resources\Resources\CommentResource;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        return new CommentsCollection(Comments::all());
    }

    public function show(Comments $comment)
    {
        return new CommentResource($comment);
    }
}
