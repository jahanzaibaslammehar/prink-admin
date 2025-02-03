@extends('layout/' . $layout)

@section('subhead')
<title>System Users</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">System Users</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">

    @include('pages.system-users.list')

    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Add New</h2>
            </div>
            <form method="POST" action="{{ route('system-users.create') }}">
                @csrf
                <div class="p-5">
                    <div class="preview">
                        <div>
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" required name="first_name">
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" required name="last_name">
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Email Address</label>
                            <input type="text" class="form-control" required name="email">
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Date of birth</label>
                            <input type="date" class="form-control" required name="dob">
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Location</label>
                            <select class="form-control" required name="location_id">
                                @foreach ($locations as $location)
                                    <option value="{{ $location->location_id }}">{{ $location->location }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Gender</label>
                            <select class="form-control" required name="gender_id">
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->gender_id }}">{{ $gender->gender }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Body Shape</label>
                            <select class="form-control" required name="body_shape_id">
                                @foreach ($body_shapes as $shape)
                                    <option value="{{ $shape->body_shape_id }}">{{ $shape->body_shape }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" required name="password">
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