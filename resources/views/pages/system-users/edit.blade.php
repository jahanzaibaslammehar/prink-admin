@extends('layout/' . $layout)

@section('subhead')
<title>System User Edit</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">System User Edit</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Edit</h2>
            </div>
            <form method="POST" action="{{ route('system-users.update', $single->user_id) }}">
                @csrf
                @method('put')
                <div class="p-5">
                    <div class="preview">
                        <div>
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" required name="first_name" value="{{ $single->profile->first_name }}">
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" required name="last_name" value="{{ $single->profile->last_name }}">
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Date of birth</label>
                            <input type="date" class="form-control" required name="dob" value="{{ $single->profile->dob }}">
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Location</label>
                            <select class="form-control" required name="location_id">
                                @foreach ($locations as $location)
                                    @if ($location->location_id == $single->profile->location_id)
                                        <option selected value="{{ $location->location_id }}">{{ $location->location }}</option>
                                    @else
                                        <option value="{{ $location->location_id }}">{{ $location->location }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Gender</label>
                            <select class="form-control" required name="gender_id">
                                @foreach ($genders as $gender)
                                    @if ($gender->gender_id == $single->profile->gender_id)
                                        <option selected value="{{ $gender->gender_id }}">{{ $gender->gender }}</option>
                                    @else
                                        <option value="{{ $gender->gender_id }}">{{ $gender->gender }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Body Shape</label>
                            <select class="form-control" required name="body_shape_id">
                                @foreach ($body_shapes as $shape)
                                    @if ($shape->body_shape_id == $single->profile->body_shape_id)
                                        <option selected value="{{ $shape->body_shape_id }}">{{ $shape->body_shape }}</option>
                                    @else
                                        <option value="{{ $shape->body_shape_id }}">{{ $shape->body_shape }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Leave blank if don't want to change the password">
                        </div>

                        @if (auth()->user()->user_id != $single->user_id)
                        <div class="mt-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" required name="is_active">
                                <option value="">Select status</option>
                                <option value="1" {{ $single->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $single->is_active ? '' : 'selected' }}>Inactive</option>
                            </select>
                        </div>
                        @endif
                        <div class="text-end mt-5">
                            <button type="submit" class="btn btn-primary w-24">Update</button>
                            <a href="{{ route('system-users.index') }}" class="btn btn-secondary ml-2 w-24">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('pages.system-users.list')
</div>
@endsection