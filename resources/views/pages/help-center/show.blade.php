@extends('layout/' . $layout)

@section('subhead')
<title>Help Center</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Help Center</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-4">
        <div class="box p-5">
            <div class="flex items-center">
                <div>
                    <div class="text-slate-500 font-bold">User Details</div>
                    <div class="mt-1">Username: {{ $help->username }}</div>
                    <div class="mt-1">Email: {{ $help->email }}</div>
                    <div class="mt-1">Mobile: {{ $help->mobile }}</div>
                    <div class="mt-1">Status: {{ $help->is_active ? "Active" : "Inactive" }}</div>
                    <div class="mt-1">Verified: {{ $help->is_verified ? "Verified" : "Unverified" }}</div>
                    <div class="mt-1">Account: {{ $help->is_private ? "Private" : "Public" }}</div>
                    <div class="mt-1">Joined: {{ date('d M Y - h:iA', strtotime($help->user_created)) }}</div>
                </div>
                <i data-lucide="user" class="w-4 h-4 text-slate-500 ml-auto"></i>
            </div>
        </div>
    </div>

    <div class="intro-y col-span-12 lg:col-span-8">
        <div class="box p-5">
            <div class="flex items-center">
                <div>
                    <div class="text-slate-500 font-bold">Help Center Details</div>
                    <div class="mt-1">Subject: {{ $help->subject }}</div>
                    <div class="mt-1">Ask on: {{ date('d M Y - h:iA', strtotime($help->created_at)) }}</div>
                    <div class="mt-1">Message:</div>
                    <div class="mt-1">{{ $help->message }}</div>
                </div>
                <i data-lucide="star" class="w-4 h-4 text-slate-500 ml-auto"></i>
            </div>
        </div>
    </div>
</div>
@endsection