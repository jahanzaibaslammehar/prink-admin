<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Videos;
use App\Models\AbuseReports;
use Illuminate\Http\Request;
use App\Http\Resources\Collections\AbuseReportsCollection;

class AbuseReportsController extends Controller
{
    public function index($type = null)
    {
        return view('pages/abuse-reports/list', ['type' => $type]);
    }

    public function list($type = null)
    {
        $reports = null;
        if ($type == "open") {
            $reports = AbuseReports::where('status', 'Pending')->get();
        }
        if ($type == "closed") {
            $reports = AbuseReports::where('status', '!=', 'Pending')->get();
        }
        if (!$type) {
            $reports = AbuseReports::all();
        }
        return new AbuseReportsCollection($reports);
    }

    public function edit(AbuseReports $report)
    {
        return view('pages/abuse-reports/edit', ['single' => $report]);
    }

    public function update(Request $request, AbuseReports $report)
    {
        $request->validate(['action' => 'required|string|max:255', 'status' => 'required']);

        $type = $report->report_type;
        $id = $report->report_for;
        $action = $request->take;

        if ($type == "user") {
            $user = User::find($id);
            if ($action == "remove") {
                $user->delete();
            }
            if ($action == "disable") {
                $user->is_active = 0;
                $user->update();
            }
        }

        if ($type == "video") {
            $video = Videos::find($id);
            if ($action == "remove") {
                $video->delete();
            }
            if ($action == "disable") {
                $video->is_disabled = 1;
                $video->update();
            }
        }

        $report->action = $request->action;
        $report->status = $request->status;
        $report->taken_by = auth()->user()->user_id;
        $report->update();

        return redirect(route('abuse-reports.index', 'open'));
    }
}
