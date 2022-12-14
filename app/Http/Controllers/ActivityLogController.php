<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ActivityLogController
 * @package App\Http\Controllers
 */
class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activityLogs = DB::table('users')
            ->join('activity_log', 'users.id', '=', 'activity_log.causer_id')
            ->select(
                'users.name',
                'users.email',
                'activity_log.*'
            )
            ->get();

        return view('activity-log.index', compact('activityLogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $activityLog = ActivityLog::find($id);

        // return view('activity-log.show', compact('activityLog'));

        $activityLog = DB::table('users')
            ->join('activity_log', 'users.id', '=', 'activity_log.causer_id')
            ->where('activity_log.id', '=', $id)
            ->select(
                'users.name',
                'users.email',
                'activity_log.*'
            )
            ->get();

        return view('activity-log.show', compact('activityLog'));
    }
}
