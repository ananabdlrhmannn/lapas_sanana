<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        $availablePermissions = User::AVAILABLE_PERMISSIONS;

        return view('admin.users.create', compact('availablePermissions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'role' => 'required|in:admin,registrasi,humas',
                'permissions' => 'nullable|array',
                'permissions.*' => 'in:manage_users,manage_news,manage_galleries,manage_visits,manage_complaints',
                'password' => 'required|string|min:8|confirmed',
            ]
        );

        $permissions = $validated['permissions'] ?? [];

        if ($validated['role'] === 'admin') {
            $permissions = array_keys(User::AVAILABLE_PERMISSIONS);
        }

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'permissions' => $permissions,
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user): View
    {
        $availablePermissions = User::AVAILABLE_PERMISSIONS;

        return view('admin.users.edit', compact('user', 'availablePermissions'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
                'role' => 'required|in:admin,registrasi,humas',
                'permissions' => 'nullable|array',
                'permissions.*' => 'in:manage_users,manage_news,manage_galleries,manage_visits,manage_complaints',
                'password' => 'nullable|string|min:8|confirmed',
            ]
        );

        $permissions = $validated['permissions'] ?? [];

        if ($validated['role'] === 'admin') {
            $permissions = array_keys(User::AVAILABLE_PERMISSIONS);
        }

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'permissions' => $permissions,
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Anda tidak bisa menghapus akun yang sedang digunakan.');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
