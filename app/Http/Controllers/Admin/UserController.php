<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin(User $user)
    {
        $currentUser = auth()->user();

        // Prevent an administrator from removing their own admin access
        if ($currentUser->id === $user->id && $user->is_admin) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'You cannot remove your own administrator access.');
        }

        // Prevent removing the last administrator
        if ($user->is_admin) {

            $adminCount = User::where('is_admin', true)->count();

            if ($adminCount <= 1) {
                return redirect()
                    ->route('admin.users.index')
                    ->with('error', 'The last administrator cannot be removed.');
            }
        }

        $user->update([
            'is_admin' => !$user->is_admin,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User role updated successfully.');
    }
}