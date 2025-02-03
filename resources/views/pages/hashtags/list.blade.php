<div class="intro-y col-span-12 lg:col-span-8">
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
            <h2 class="font-medium text-base mr-auto">List</h2>
        </div>
        <div class="p-5" id="hoverable-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap" width="10%">#</th>
                                <th class="whitespace-nowrap" width="30%">Hashtag</th>
                                <th class="whitespace-nowrap" width="20%">Count</th>
                                <th class="whitespace-nowrap" width="20%">Status</th>
                                <th class="whitespace-nowrap" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->hashtag_id }}</td>
                                <td>{{ $d->hashtag }}</td>
                                <td>{{ $d->count }}</td>
                                <td>
                                    @if ($d->is_active)
                                    <div class="flex items-center text-success"><i data-lucide="check" class="w-4 h-4 mr-2"></i>Active</div>
                                    @else
                                    <div class="flex items-center text-danger"><i data-lucide="x" class="w-4 h-4 mr-2"></i>Inactive</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <a class="flex items-center mr-3" href="{{ route('hashtags.edit', $d->hashtag_id) }}">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                        </a>
                                        <a class="delete-confirm flex items-center text-danger" href="{{ route('hashtags.delete', $d->hashtag_id) }}">
                                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>