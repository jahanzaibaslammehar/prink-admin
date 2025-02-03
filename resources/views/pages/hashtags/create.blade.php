@extends('layout/' . $layout)

@section('subhead')
<title>Hashtags</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Hashtags</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">

    @include('pages.hashtags.list')

    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Add New</h2>
            </div>
            <form method="POST" action="{{ route('hashtags.create') }}">
                @csrf
                <div class="p-5">
                    <div class="preview">
                        <div>
                            <label class="form-label">Hashtag</label>
                            <input type="text" class="form-control" required name="hashtag">
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