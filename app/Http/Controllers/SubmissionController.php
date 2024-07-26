<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SubmissionController extends Controller
{
    private $fileHelper;
    public function __construct()
    {

        $this->fileHelper = new FileHelper();
    }
    public function index()
    {
        return view('pages.submission.index');
    }

    public function data()
    {
        $query = Submission::with('user')->access()->get();
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($q) {
                return view('pages.submission.partials.button', [
                    'data' => $q
                ])->render();
            })
            ->editColumn('status', function ($q) {
                return $q->labelStatus;
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        return view('pages.submission.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'file' => ['required', 'mimes:jpeg,png,jpg,pdf', 'max:1024'],
        ], [
            'file.max' => 'The image field must not be greater than 1 MB.',
        ]);

        DB::beginTransaction();
        $file = $this->fileHelper->store($request->file('file'), 'submission');
        $submission = Submission::create([
            'uuid' => Str::uuid(),
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'file' => $file,
            'date' => $request->date,
        ]);
        DB::commit();
        Session::flash('message', ' Pengajuan detail berhasil di buat');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('submission.index');
    }

    public function show(Submission $submission)
    {
        return view('pages.submission.show', compact('submission'));
    }
    public function updateStatus(Request $request)
    {
        $submission = Submission::where('uuid', $request->uuid)->update(['status' => $request->status, 'approval_by' => auth()->user()->id]);
        return response(['message' => 'Pengjuan telah diupdate'], 200);
    }
}
