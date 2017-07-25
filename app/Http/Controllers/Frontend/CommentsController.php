<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contracts\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{

    /**
     * @var CommentRepository
     */
    protected $repository;

    /**
     * @var CommentValidator
     */

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $comment = $this->repository->create($data);
        $comment['user_name'] = Auth::user()->name;
        $comment['created'] = date('H:i:s/d-m-Y', strtotime($comment['created_at']));
        return response()->json($comment);
    }
}
