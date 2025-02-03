@extends('layout/' . $layout)

@section('subhead')
<title>Abuse Report</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Abuse Report</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Take Action</h2>
            </div>
            <form method="POST" action="{{ route('abuse-reports.update', $single->abuse_report_id) }}">
                @csrf
                @method('put')
                <div class="p-5">
                    <div class="preview">
                        <div>
                            <label class="form-label">Action Description</label>
                            <textarea class="form-control" maxlength="255" rows="4" required name="action">{{ $single->action }}</textarea>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Action</label>
                            <select class="form-control" required name="take">
                                <option value="">Select Action</option>
                                <option value="remove">Remove {{ $single->report_type }}</option>
                                <option value="disable">Disable {{ $single->report_type }}</option>
                                <option value="nothing">Do nothing</option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" required name="status">
                                <option {{ $single->status == "Pending" ? "selected" : "" }} value="Pending">Pending</option>
                                <option {{ $single->status == "Resolved" ? "selected" : "" }} value="Resolved">Resolved</option>
                                <option {{ $single->status == "Not Resolved" ? "selected" : "" }} value="Not Resolved">Not Resolved</option>
                            </select>
                        </div>

                        <div class="text-end mt-5">
                            <button type="submit" class="btn btn-primary w-24">Update</button>
                            <a href="{{ route('abuse-reports.index', 'open') }}" class="btn btn-secondary ml-2 w-24">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if ($single->report_type == "video")
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Video Preview</h2>
            </div>

            <video width="100%" height="100%" controls>
                <source src="{{ $single->video->video_url }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        @endif
    </div>

    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="box p-5">
            <div class="flex items-center border-b border-slate-200 dark:border-darkmode-400 pb-5">
                <div>
                    <div class="text-slate-500">Reported By</div>
                    <div class="mt-1">Username: <a class="text-primary" href="{{ route('app-users.view', $single->report_by) }}">{{ $single->reported_by ? $single->reported_by->username : '-' }}</a></div>
                    <div class="mt-1">Email: {{ $single->reported_by->email }}</div>
                    <div class="mt-1">Joined: {{ date('d M Y - h:iA', strtotime($single->reported_by->created_at)) }}</div>
                </div>
                <i data-lucide="user" class="w-4 h-4 text-slate-500 ml-auto"></i>
            </div>
            <div class="flex items-center border-b border-slate-200 dark:border-darkmode-400 py-5">
                <div>
                    <div class="text-slate-500">Reported For ({{ ucfirst($single->report_type) }})</div>
                    @if ($single->report_type == "user")
                    <div class="mt-1">Username: <a class="text-primary" href="{{ route('app-users.view', $single->report_for) }}">{{ $single->user ? $single->user->username : '-' }}</a></div>
                    <div class="mt-1">Email: {{ $single->user->email }}</div>
                    <div class="mt-1">Status: {{ $single->user->is_active ? "Active" : "Inactive" }}</div>
                    <div class="mt-1">Joined: {{ date('d M Y - h:iA', strtotime($single->user->created_at)) }}</div>
                    <div class="mt-1">Abuse Reports: {{ count($single->user->abuse_reports_received) }}</div>
                    @endif

                    @if ($single->report_type == "video")
                    <div class="mt-1">URL: <a class="text-primary" href="#">{{ $single->video->video_url }}</a></div>
                    <div class="mt-1">Status: {{ $single->video->is_disabled ? "Offline" : "Online" }}</div>
                    <div class="mt-1">Category: {{ $single->video->category->video_category }}</div>
                    <div class="mt-1">Likes: {{ count($single->video->likes) }}</div>
                    <div class="mt-1">Comments: {{ count($single->video->comments) }}</div>
                    <div class="mt-1">Views: {{ count($single->video->views) }}</div>
                    <div class="mt-1">Abuse Reports: {{ count($single->video->abuse_reports) }}</div>
                    @endif
                </div>
                <i data-lucide="users" class="w-4 h-4 text-slate-500 ml-auto"></i>
            </div>
            <div class="flex items-center border-b border-slate-200 dark:border-darkmode-400 py-5">
                <div>
                    <div class="text-slate-500">Report Details</div>
                    <div class="mt-1">Reported At: {{ date('d M Y - h:iA', strtotime($single->created_at)) }}</div>
                    <div class="mt-1">Report Reason: {{ $single->reason }}</div>
                    <div class="mt-1">Last Updated: {{ date('d M Y - h:iA', strtotime($single->updated_at)) }}</div>
                </div>
                <i data-lucide="clock" class="w-4 h-4 text-slate-500 ml-auto"></i>
            </div>
            <div class="flex items-center pt-5">
                <div>
                    <div class="text-slate-500">Action Details</div>
                    <div class="mt-1">Status: {{ $single->status }}</div>
                    <div class="mt-1">Description: {{ $single->action }}</div>
                    <div class="mt-1">Action By: <a class="text-primary" href="{{ $single->taken_by ? route('system-users.edit', $single->action_by) : '#' }}">{{ $single->taken_by ? $single->action_by->username : "" }}</a></div>
                    <div class="mt-1">Action Time: {{ date('d M Y - h:iA', strtotime($single->action_timestamp)) }}</div>
                </div>
                <i data-lucide="mic" class="w-4 h-4 text-slate-500 ml-auto"></i>
            </div>
        </div>
    </div>
</div>
@endsection