<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Contracts\Repositories\PostRepository;
use App\Models\CatePost;
use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    protected $published = ['Dành cho người dùng đăng nhập', 'Dành cho người dùng không cần đăng nhập'];


    public function __construct(PostRepository $repository)
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

        return view('frontend.post.index', compact('list'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = CatePost::select('id', 'name')->get();
        return view('frontend.post.detail', ['cates' => $cates, 'published' => $this->published]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $nameOldImg = substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4);
            $newNameImg = time().'-'.str_slug($nameOldImg).'.'.$image->getClientOriginalExtension();
            $data['image'] = $image->move('uploads/', $newNameImg);
        }
        $data['user_id'] = Auth::id();
        $this->repository->create($data);

        return redirect()->route('post.index')->with(['flash_level' => 'success', 'flash_message' => 'Post created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Post::find($id);

        return view('frontend.pages.detail', ['detail' => $detail]);
    }

    /**
     * Display a listing of the resource out frontend.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFrontend()
    {
        if(Auth::id()) {
            $list = $this->repository->paginate(5);
        } else {
            $list = $this->repository->WherePagination(['published', '=', 1], 5);
        }
        return view('frontend.pages.cate', compact('list'));
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

        $cates = CatePost::select('id', 'name')->get();
        return view('frontend.post.detail', ['data' => $data, 'cates' => $cates, 'published' => $this->published]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PostUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $data = $request->except('_token', '_method', 'image_path_old');
        if($request->hasFile('image')) {
            /*delete image old*/
            $pathImageOld = $request->image_path_old;
            if(file_exists($pathImageOld)){
                @unlink($pathImageOld);
            }
            $image = $request->file('image');
            $nameOldImg = substr($image->getClientOriginalName(), 0, strlen($image->getClientOriginalName()) - 4);
            $newNameImg = time().'-'.str_slug($nameOldImg).'.'.$image->getClientOriginalExtension();
            $data['image'] = $image->move('uploads/', $newNameImg);
        }
        $data['user_id'] = Auth::id();
        $this->repository->update($data, $id);

        return redirect()->route('post.index')->with(['flash_level' => 'success', 'flash_message' => 'Post updated']);
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
        /*delete image*/
        $pathImage = Post::select('image')->first();
        if(file_exists($pathImage->image)){
            @unlink($pathImage->image);
        }
        $deleted = $this->repository->delete($id);

        return response()->json([
            'deleted' => $deleted,
        ]);
    }

    public function listData() {
        return redirect()->route('post.index')->with(['flash_level' => 'success', 'flash_message' => 'Post deleted.']);
    }
}
