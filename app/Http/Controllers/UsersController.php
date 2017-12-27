<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PaymentService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var PaymentService
     */
    private $paymentService;

    /**
     * UsersController constructor.
     * @param UserService $userService
     * @param PaymentService $paymentService
     */
    public function __construct(UserService $userService, PaymentService $paymentService)
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index', 'confirmEmail'],
        ]);

        $this->middleware('guest', [
            'only' => ['create'],
        ]);

        $this->userService = $userService;
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:50',
            'email'    => 'required|email|unique:users|max:255',
            'password' => 'required',
        ]);

        $user = User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        $this->sendEmailConfirmationTo($user);

        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');

        return redirect('/');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:50',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $this->authorize('update', $user);

        $data['name'] = $request->get('name');
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->get('password'));
        }

        $user->update($data);

        session()->flash('success', '个人资料更新成功!');

        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户!');

        return back();
    }

    /**
     * @param $user
     */
    protected function sendEmailConfirmationTo($user): void
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'wwhu@163.com';
        $name = 'wwhu668';
        $to = $user->email;
        $subject = "感谢注册 Sample 应用！请确认你的邮箱。";

        \Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        \Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');

        return redirect()->route('users.show', [$user]);
    }
}
