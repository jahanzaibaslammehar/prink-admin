@extends('layout/' . $layout)

@section('subhead')
<title>View User</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">View User</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="box p-5">
            <div class="flex items-center">
                <div>
                    <div class="text-slate-500 font-bold">User Details</div>
                    <div class="mt-1">Username: {{ $single->username }}</div>
                    <div class="mt-1">Email: {{ $single->email }}</div>
                    <div class="mt-1">Mobile: {{ $single->mobile }}</div>
                    <div class="mt-1">Status: {{ $single->is_active ? "Active" : "Inactive" }}</div>
                    <div class="mt-1">Verified: {{ $single->is_verified ? "Verified" : "Unverified" }}</div>
                    <div class="mt-1">Account: {{ $single->is_private ? "Private" : "Public" }}</div>
                    <div class="mt-1">Joined: {{ date('d M Y - h:iA', strtotime($single->created_at)) }}</div>
                </div>
                <i data-lucide="user" class="w-4 h-4 text-slate-500 ml-auto"></i>
            </div>
        </div>
    </div>

    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="box p-5">
            <div class="flex items-center">
                <div>
                    <div class="text-slate-500 font-bold">Profile Details</div>
                    <div class="mt-1">First Name: {{ $single->profile->first_name }}</div>
                    <div class="mt-1">Last Name: {{ $single->profile->last_name }}</div>
                    <div class="mt-1">Date of birth: {{ date('d M Y', strtotime($single->profile->dob)) }}</div>
                    <div class="mt-1">Gender: {{ $single->profile->gender ? $single->profile->gender->gender : '-' }}</div>
                    <div class="mt-1">Body Shape: {{ $single->profile->body_shape ? $single->profile->body_shape->body_shape : '-' }}</div>
                    <div class="mt-1">Location: {{ $single->profile->location ? $single->profile->location->location : '-' }}</div>
                    <div class="mt-1">Last Updated: {{ date('d M Y', strtotime($single->profile->updated_at)) }}</div>
                </div>
                <i data-lucide="star" class="w-4 h-4 text-slate-500 ml-auto"></i>
            </div>
        </div>
    </div>

    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="box p-5">
            <div class="flex items-center">
                <div>
                    <div class="text-slate-500 font-bold">Activity Details</div>
                    <div class="mt-1">Followers: {{count($single->followers)}}</div>
                    <div class="mt-1">Following: {{count($single->followings)}}</div>
                    <div class="mt-1">Videos Uploaded: {{count($single->videos)}}</div>
                    <div class="mt-1">Music Uploaded: {{count($single->musics)}}</div>
                    <div class="mt-1">Videos Liked: {{count($single->likes)}}</div>
                    <div class="mt-1">Commented: {{count($single->comments)}}</div>
                    <div class="mt-1">Reports Received: {{count($single->abuse_reports_received)}}</div>
                </div>
                <i data-lucide="activity" class="w-4 h-4 text-slate-500 ml-auto"></i>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-12 gap-6 mt-8">
    <!-- <div class="col-span-12 lg:col-span-3 2xl:col-span-2">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">User Uploads</h2>
        <div class="intro-y box p-5 mt-6">
            <div class="mt-1">
                <a href="{{ route('app-users.view', ['user' => $single->user_id, 'view' => 'videos']) }}" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <i class="w-4 h-4 mr-2" data-lucide="video"></i> Videos
                </a>
                <a href="{{ route('app-users.view', ['user' => $single->user_id, 'view' => 'music']) }}" class="flex items-center px-3 py-2 mt-2 rounded-md">
                    <i class="w-4 h-4 mr-2" data-lucide="music"></i> Music
                </a>
            </div>
        </div>
    </div> -->
    <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
        <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
            {{--
            @if ($type == "music")
            @foreach ($uploads as $upload)
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <a target="_blank" href="{{ $upload->music_url }}" class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">Music</div>
                    </a>

                    <a target="_blank" href="{{ $upload->music_url }}" class="block font-medium mt-4 text-center truncate">{{ $upload->category->music_category }}</a>
                    <div class="text-slate-500 text-xs text-center mt-0.5">{{ $upload->hashtags }}</div>

                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="delete-confirm dropdown-toggle w-5 h-5 block" href="#">
                            <i data-lucide="trash" class="w-5 h-5 text-slate-500"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            --}}

            @foreach ($uploads as $upload)
            <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <a target="_blank" href="{{ $upload->video_url }}" class="w-3/5 file__icon file__icon--file mx-auto">
                        <div class="file__icon__file-name">
                            @if ($upload->is_disabled)
                            <i data-lucide="lock"></i>
                            @else
                            <div class="file__icon__file-name">Video</div>
                            @endif
                        </div>
                    </a>

                    <a target="_blank" href="{{ $upload->video_url }}" class="block font-medium mt-4 text-center truncate">{{ $upload->category->video_category }}</a>
                    <div class="text-slate-500 text-xs text-center mt-0.5">Likes: {{ count($upload->likes) }}</div>
                    <div class="text-slate-500 text-xs text-center mt-0.5">Comments: {{ count($upload->comments) }}</div>

                    <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                            <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i>
                        </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                @if ($upload->is_disabled)
                                <li><a href="{{ route('app-users.video.toggle', [$single->user_id, $upload->video_id]) }}" class="dropdown-item"><i data-lucide="unlock" class="w-4 h-4 mr-2"></i> Publish</a></li>
                                @else
                                <li><a href="{{ route('app-users.video.toggle', [$single->user_id, $upload->video_id]) }}" class="dropdown-item"><i data-lucide="lock" class="w-4 h-4 mr-2"></i> Unpublish</a></li>
                                @endif
                                <!-- <li><a href="" class="delete-confirm dropdown-item"><i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection