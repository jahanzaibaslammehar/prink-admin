@extends('layout/' . $layout)

@section('subhead')
<title>Body Shape Edit</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Body Shape Edit</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Edit</h2>
            </div>
            <form method="POST" action="{{ route('body-types.update', $single->body_shape_id) }}">
                @csrf
                @method('put')
                <div class="p-5">
                    <div class="preview">
                        <div>
                            <label class="form-label">Body Shape Type</label>
                            <input type="text" class="form-control" required name="body_shape" value="{{ $single->body_shape }}">
                        </div>

                        <div class="mt-5">
                            <label class="form-label">Gender</label>
                            <select class="form-control" required name="gender_id" require>
                                @foreach ($genders as $gender)
                                @if ($gender->gender_id == $single->gender_id)
                                <option selected value="{{ $gender->gender_id }}">{{ $gender->gender }}</option>
                                @else
                                <option value="{{ $gender->gender_id }}">{{ $gender->gender }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-5">
                            <label class="form-label">Information</label>
                            <input type="text" max="512" class="form-control" required name="info" value="{{ $single->info }}">
                        </div>

                        <div class="mt-5">
                            <label class="form-label">Status</label>
                            <select class="form-control" required name="is_active">
                                <option value="">Select status</option>
                                <option value="1" {{ $single->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $single->is_active ? '' : 'selected' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="text-end mt-5">
                            <button type="submit" class="btn btn-primary w-24">Update</button>
                            <a href="{{ route('body-types.index') }}" class="btn btn-secondary ml-2 w-24">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('pages.body-shapes.list')
</div>
@endsection