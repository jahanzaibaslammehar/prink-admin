@extends('layout/' . $layout)

@section('subhead')
<title>Outfit Type Edit</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Outfit Type Edit</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Edit</h2>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('outfit-types.update', $single->outfit_type_id) }}">
                @csrf
                @method('put')
                <div class="p-5">
                    <div class="preview">
                        <div>
                            <label class="form-label">Outfit Type Name</label>
                            <input type="text" class="form-control" required name="outfit_type" value="{{ $single->outfit_type }}">
                        </div>
                        <div class="mt-3">
                            <label class="form-label mt-2">Icon (.png)</label>
                            <input type="file" class="form-control" required name="icon" accept="image/png">
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" required name="is_active">
                                <option value="">Select status</option>
                                <option value="1" {{ $single->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $single->is_active ? '' : 'selected' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="text-end mt-5">
                            <button type="submit" class="btn btn-primary w-24">Update</button>
                            <a href="{{ route('outfit-types.index') }}" class="btn btn-secondary ml-2 w-24">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('pages.outfit-types.list')
</div>
@endsection