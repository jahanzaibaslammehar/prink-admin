@extends('../layout/' . $layout)

@section('subhead')
<title>Abuse Reports</title>
@endsection

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Abuse Reports</h2>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto scrollbar-hidden">
        <table id="abuse-reports{{'-' . $type}}" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Report Type</th>
                    <th>Report By</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Timestamp</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection