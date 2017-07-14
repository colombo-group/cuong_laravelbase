<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProfileCreateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Contracts\Repositories\ProfileRepository;
use App\Validators\ProfileValidator;


class ProfileController extends Controller
{

    /**
     * @var ProfileRepository
     */
    protected $repository;

    /**
     * @var ProfileValidator
     */
    protected $validator;

    public function __construct(ProfileRepository $repository, ProfileValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
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
    public function update(Request $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $id = Auth::user()->id;
            $profile = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Profile updated.',
                'data'    => $profile->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with(['flash_level' => 'success', 'flash_message' => $response['message']]);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }
}
