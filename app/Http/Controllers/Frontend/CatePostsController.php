<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CatePostCreateRequest;
use App\Http\Requests\CatePostUpdateRequest;
use App\Contracts\Repositories\CatePostRepository;


class CatePostsController extends Controller
{

    /**
     * @var CatePostRepository
     */
    protected $repository;


    public function __construct(CatePostRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->repository->paginate(5);

        return view('frontend.catePosts.index', compact('list'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.catePosts.detail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CatePostCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CatePostCreateRequest $request)
    {

        $catePost = $this->repository->create($request->all());

        return redirect()->route('cate-post.index')->with(['flash_level' => 'success', 'flash_message' => 'Category post created']);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = $this->repository->find($id);

        return view('frontend.catePosts.detail', compact('data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CatePostUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CatePostUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method');
        $this->repository->update($data, $id);

        return redirect()->route('cate-post.index')->with(['flash_level' => 'success', 'flash_message' => 'Category post updated']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return response()->json([
            'deleted' => $deleted,
        ]);
    }

    public function listData() {
        return redirect()->route('cate-post.index')->with(['flash_level' => 'success', 'flash_message' => 'Category post deleted.']);
    }
}
