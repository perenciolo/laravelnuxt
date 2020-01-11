<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicCreateRequest;
use App\Post;
use App\Topic;
use App\Http\Resources\Topic as TopicResource;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::latestFirst()->paginate(5);
        return TopicResource::collection($topics);
    }

    public function store(TopicCreateRequest $request)
    {
        $topic = new Topic();
        $topic->title = $request->title;
        $topic->user()->associate($request->user());

        $post = new Post();
        $post->body = $request->body;
        $post->user()->associate($request->user());

        $topic->save();
        $topic->posts()->save($post);

        return new TopicResource($topic);
    }
}
