@extends('../layout/' . $layout)

@section('subhead')
<title>All Videos</title>
@endsection

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">All Videos</h2>
</div>

<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto scrollbar-hidden">
        <table id="video-list" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Gender</th>
                    <th>Body Shape</th>
                    <th>Color</th>
                    <th>Outfit</th>
                    <th>category</th>
                    <th>Type</th>
                    <th>Upload By</th>
                    <th>Uploaded</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection