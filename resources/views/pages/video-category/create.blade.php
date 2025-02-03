@extends('layout/' . $layout)

@section('subhead')
<title>Video Categories</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Video Categories</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">

    @include('pages.video-category.list')

    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Add New</h2>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('video-category.create') }}">
                @csrf
                <div class="p-5">
                    <div class="preview">
                        <div>
                            <label class="form-label">Video Category</label>
                            <input type="text" class="form-control" required name="video_category">
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Icon (.png)</label>
                            <input type="file" class="form-control" required name="icon" accept="image/png">
                        </div>
                        <div class="text-end mt-5">
                            <button type="submit" class="btn btn-primary w-24">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection