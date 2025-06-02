<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc');
        $name = '';
        if (request()->has('name')) {
            $users = $users->where(function ($query) {
                $name = request('name');
                $query->where('name', 'like', '%'.$name.'%')
                    ->orWhere('email', 'like', '%'.$name.'%');
            });
        }
        $users = $users->where('active', '=', '1')
            ->paginate(10)->appends(request()->except('page'));

        return Inertia::render('User/Index', compact('users', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return Inertia::render('User/Create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    public function store(StoreUserPost $request)
    {
        $validated = $request->validated();
        // $validated['created_by'] = auth()->id();
        // $validated['updated_by'] = auth()->id();
        $validated['created_by'] = Auth::user()->id;
        $validated['updated_by'] = Auth::user()->id;
        $validated['password'] = Hash::make($validated['password']);
        $user = User::Create($validated);
        $role = Role::find($request['role']);
        User::find($user->id)->assignRole($role);

        return Redirect::route('user.create')->with('message', 'Registro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->getRoleNames();

        return Inertia::render('User/Show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user->getRoleNames();
        $roles = Role::all();

        return Inertia::render('User/Edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, User $user)
    public function update(UpdateUserPut $request, User $user)
    {
        $validated = $request->validated();
        $validated['updated_by'] = Auth::user()->id;

        if (isset($validated['password']) && $validated['password'] != null) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        $user->update($validated);

        $userData = User::select('users.*', 'model_has_roles.role_id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('users.id', $user->id)
            ->get();

        $ancientRole = Role::find($userData[0]['role_id']);
        User::find($user->id)->removeRole($ancientRole);

        $newRole = Role::find($request['role']);
        User::find($user->id)->assignRole($newRole);

        return Redirect::route('user.edit', $user)->with('message', 'Registro editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function deactivate(User $user)
    {
        // $user->deleteProfilePhoto();
        // $user->update(['active' => 2, 'updated_by' => auth()->id()]);
        $user->update(['active' => 2, 'updated_by' => Auth::user()->id]);

        return redirect()->back()->with('message', 'Registro eliminado');
    }
}
