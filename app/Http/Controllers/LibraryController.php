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

    // 返却処理
    public function returnBook(Request $request)
    {
        $library = Library::find($request->id);
        $library->user_id = 0;
        $library->save();

        // library_id と user_id で対象を検索し、rent_dateが最新のレコードを取得する。
        $log = Log::where('library_id', $library->id)
            ->where('user_id', Auth::user()->id)
            ->orderBy('rent_date', 'desc')
            ->first();

        // return_date に現在の日付を登録する。
        $log->return_date = Carbon::now();

        // save メソッドを利用して更新する。
        $log->save();

        return redirect('/library/index');
    }

    // 貸出履歴の表示
    public function history()
    {
        $logs = Log::where('user_id', Auth::user()->id)->get();
        return view('library.borrowHistory', [
            'logs' => $logs,
            'user' => Auth::user()
        ]);
    }
}
