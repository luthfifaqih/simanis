<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title['title'] = 'Data User';

        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown' . $data->id . '" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Aksi
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $data->id . '">
                                        <li><a class="dropdown-item" href="' . route('users.edit', $data->id) . '"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                        <li><button type="button" class="delete-btn dropdown-item" data-id="' . $data->id . '"><i class="bi bi-backspace-reverse-fill"></i> Delete</button></li>
                                    </ul>
                                </div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.index', $title);

        // if ($request->ajax()) {
        //     $data = User::select('id', 'name', 'email');

        //     // Filter berdasarkan pencarian
        //     if (!empty($request->search['value'])) {
        //         $search = $request->search['value'];
        //         $data = $data->where('name', 'like', "%$search%")
        //             ->orWhere('email', 'like', "%$search%");
        //     }

        //     // Load data
        //     $users = $data->get();

        //     return DataTables::of($users)
        //         ->addColumn('action', function ($user) {
        //             $button = '<div class="dropdown">
        //                             <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropdown' . $user->id . '" data-bs-toggle="dropdown" aria-expanded="false">
        //                                 Pilih Aksi
        //                             </button>
        //                             <ul class="dropdown-menu" aria-labelledby="actionDropdown' . $user->id . '">
        //                                 <li><a class="dropdown-item" href="' . route('users.edit', $user->id) . '"><i class="bi bi-pencil-square"></i> Edit</a></li>
        //                                 <li><button type="button" class="delete-btn dropdown-item" data-id="' . $user->id . '"><i class="bi bi-backspace-reverse-fill"></i> Delete</button></li>
        //                             </ul>
        //                         </div>';
        //             return $button;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        // return view('users.index', $title);
    }
}
