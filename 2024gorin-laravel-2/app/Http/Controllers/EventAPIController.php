<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Dispatch;
use Illuminate\Http\Request;

class EventAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->has('worker_id')) {
            return response([], 404);
        }

        $query = Event::query();

        $query->whereHas('workers', function ($query) use ($request) {
            $query->where('worker_id', $request->worker_id);
        });

        if ($request->has('place')) {
            $query->where('address', '=', $request->place);
        }

        if ($request->has('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        if ($request->has('date')) {
            $query->whereDate('event_date', '=', $request->date);
        }

        $events = $query->get();

        if ($events->isEmpty()) {
            return response([], 404);
        }

        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 必須パラメータのチェック
        if (!$request->has(['event_id', 'worker_id'])) {
            return response([], 404);
        }

        // クエリビルダーを初期化
        $query = Dispatch::query();

        // 条件を追加
        $query->where('event_id', $request->event_id)
            ->where('worker_id', $request->worker_id);

        // 結果を取得
        $dispatch = $query->first();

        // データが存在しない場合はエラー
        if (!$dispatch) {
            return response([], 404);
        }

        // 承諾フラグを更新して保存
        $dispatch->approval = true;
        $dispatch->save();

        return response([], 204);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
