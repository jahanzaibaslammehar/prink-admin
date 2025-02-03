@extends('../layout/' . $layout)

@section('subhead')
<title>Email Subscriptions</title>
@endsection

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Email Subscriptions</h2>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto scrollbar-hidden">
        <table id="subscription-list" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Subscribed</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection