<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use App\post;

class PostController extends Controller
{
   public function index(){
    //$posts=post::with('user')->get();
    $posts=post::paginate(3);
    return PostResource::collection($posts);
    }
    public function store(StorePostRequest $req){
        $post=post::create($req->all());
        return new PostResource($post);
    }
}
