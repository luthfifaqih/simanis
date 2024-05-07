<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title['title'] = 'Data User';

        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email', 'role');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown' . $data->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Aksi
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $data->id . '">
                                        <li><a class="dropdown-item" href="' . route('users.edit', $data->id) . '"><i class="ki-duotone ki-pencil fs-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i> Edit</a></li>
                                        <li><button type="button" class="delete-btn dropdown-item" data-id="' . $data->id . '"><i class="ki-duotone ki-tag-cross fs-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i> Delete</button></li>
                                    </ul>
                                </div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.index', $title);
    }

    public function create()
    {
        $title['title'] = 'Form Tambah User';
        return view('users.create', $title);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('users')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        $title['title'] = 'Form Edit User';
        return view('users.edit', compact('user'), $title);
    }

    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        return response()->json($user);
    }
}
