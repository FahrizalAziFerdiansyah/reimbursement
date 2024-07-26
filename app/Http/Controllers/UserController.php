<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    private $position;
    private $roles;
    public function __construct()
    {
        $this->position = ['DIREKTUR', 'FINANCE', 'STAFF'];
        $this->roles = ['director', 'finance', 'employee'];
    }
    public function index()
    {
        return view('pages.user.index');
    }
    public function data()
    {
        $query = User::query();
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($q) {
                return view('pages.user.partials.button', [
                    'data' => $q
                ])->render();
            })
            ->escapeColumns([])
            ->make(true);
    }
    public function create(User $user)
    {
        $positions = $this->position;
        return view('pages.user.create', compact(
            'positions',
            'user'
        ));
    }
    public function store(Request $request)
    {
        if (!empty($request->id))
            return $this->update($request);
        $credentials = $request->validate([
            'nip' => ['required'],
            'name' => ['required'],
            'position' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        DB::beginTransaction();
        $user = User::create($credentials);
        $key = array_search($request->position, $this->position);
        $user->assignRole($this->roles[$key]);
        DB::commit();

        return redirect()->route('user.index');
    }
    public function update(Request $request)
    {
        $credentials = $request->validate([
            'nip' => ['required', 'unique:users,nip,' . $request->id],
            'name' => ['required'],
            'position' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        DB::beginTransaction();
        $user = User::find($request->id);
        $tmp = $user;
        $user->update($credentials);
        $key = array_search($request->position, $this->position);
        $tmp->assignRole($this->roles[$key]);
        DB::commit();

        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        return view('pages.user.show', compact('user'));
    }
}
