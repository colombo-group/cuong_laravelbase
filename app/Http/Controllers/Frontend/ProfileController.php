<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use App\Contracts\Repositories\ProfileRepository;


class ProfileController extends Controller
{

    /**
     * @var ProfileRepository
     */
    protected $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = Auth::user();

        return view('frontend.profiles.edit', compact('data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProfileUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProfileUpdateRequest $request)
    {
        $id = Auth::user()->id;
        $this->repository->update($request->all(), $id);

        return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => 'Profile updated.']);
    }
}
