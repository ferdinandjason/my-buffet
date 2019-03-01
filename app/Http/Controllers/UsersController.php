<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Entities\User;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->middleware('guest:user')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $users = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $users,
            ]);
        }

        return view('users.index', compact('users'));
    }

    public function formLogin()
    {
        return view('auth.login');
    }

    public function formRegister()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request['remember'];

        if(Auth::attempt($credentials, $remember)){
            if(Auth::user()->role == User::ROLE_NON_ADMIN){
                return redirect()->route('user.home');
            } elseif (Auth::user()->role == User::ROLE_ADMIN){
                return redirect()->route('admin.home');
            }
        } else {
            echo "SALAH";
            return redirect()->back()->withInput($request->only('username', 'remember'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreateRequest $request)
    {
        try {
            //dd($this->validator->with($request->all())->passesOrFail());
            $this->validator->with($request->all())->passesOrFail();

            $user = $this->repository->create([
                'nama' => $request['nama'],
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'alamat' => $request['alamat'],
                'nomor_telepon' => $request['nomor_telepon'],
            ]);

            $response = [
                'message' => 'User created.',
                'data'    => $user->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            dd($e);
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
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
        $user = $this->repository->find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $user = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'User updated.',
                'data'    => $user->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
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

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'User deleted.');
    }
}
