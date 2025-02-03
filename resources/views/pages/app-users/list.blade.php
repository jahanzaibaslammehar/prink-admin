@extends('../layout/' . $layout)

@section('subhead')
<title>Application Users</title>
@endsection

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Application Users</h2>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto scrollbar-hidden">
        <table id="app-users-list" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Display Name</th>
                    <th>Email Address</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Verified</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection