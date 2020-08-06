<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    public function getIndex(User $friends)
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();
        return view('friend', [
            'friends' => $friends,
            'requests' => $requests,
        ]);
    }
    public function getIndex1(User $friends)
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();
        return view('profile.user-profile', [
            'friends' => $friends,
            'requests' => $requests,
        ]);
    }
    public function getAdd($nickname)
    {
        $user = User::where('nickname', $nickname)->first();

        if (!$user){
            return redirect()
                ->route('home')
                ->with('info', 'Пользователь не найден!');
        }
        if (Auth::user()->hasFriendRequestPending($user)
        || $user->hasFriendRequestPending(Auth::user())){
            return redirect()
                ->route('profile.user-profile', ['nickname' => $user->nickname])
                ->with('info', 'Пользователю отправлен запрос!');
        }
        if (Auth::user()->isFriendWith($user)){
            return redirect()
                ->route('profile.user-profile', ['nickname' => $user->nickname])
                ->with('info', 'Пользователю уже в друзьях!');
        }
        Auth::user()->addFriend($user);
        return redirect()
            ->route('profile.user-profile', ['nickname' => $user->nickname])
            ->with('info', 'Пользователю отправлен запрос в друзья!');

    }
    public function getAccept($nickname){
        $user = User::where('nickname', $nickname)->first();

        if (!$user){
            return redirect()
                ->route('home')
                ->with('info', 'Пользователь не найден!');
        }
        if (!Auth::user()->hasFriendRequestReceived($user)){
            return redirect()
                ->route('home');
        }
        Auth::user()->acceptFriendRequest($user);
        return redirect()
            ->route('profile.user-profile', ['nickname' => $user->nickname])
            ->with('info', 'Запрос принят!');

    }
    public function getFriendList($user){
        return redirect()
            ->route('friends.list', ['nickname' => $user->nickname]);
    }
    public function postDelete($nickname)
    {
        $user = User::where('nickname', $nickname)->first();

        if (! Auth::user()->isFriendWith($user)){
            return redirect()->back();
        }
        Auth::user()->deleteFriend($user);

        return redirect()->back()->with('info', 'Удален из друзей');
    }
}
