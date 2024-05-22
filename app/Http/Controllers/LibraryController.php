<?php

namespace App\Http\Controllers;
use App\Models\Library;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LibraryController extends Controller
{
    // 一覧表示
    public function index()
    {
        $libraries = Library::all();
        // dd($libraries);
        return view('library.index', ['libraries' => $libraries]);
    }

    // 貸出画面表示
    public function borrowingForm($id)
    {
        $library = Library::find($id);
        return view('library.borrow', [
            'library' => $library,
            'user' => Auth::user()
        ]);
    }

    // 貸出処理
    public function borrow(Request $request)
    {
        $library = Library::find($request->id);
        $library->user_id = Auth::user()->id;
        $library->save();

        $log = new Log();
        $log->library_id = $library->id;
        $log->user_id = Auth::user()->id;
        $log->rent_date = Carbon::now();
        $log->return_date = null;
        $log->return_due_date = $request->return_due_date;
        $log->save();

        return redirect('/library/index');
    }
}
