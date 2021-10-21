@section('user-list')
    class="active"
@endsection

<x-admin-layout>
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">User List</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <div class="table-responsive">
            <table id="datatable" class="table data-table table-striped" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Verified</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)

                        <tr>
                            <th>{{ $loop->iteration	 }}</th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ ($user->email_verified_at == null) ? 'No' : ' Yes' }}</th>
                            <th>
                                <div class="flex align-items-center list-user-action">
                                <form method="POST" class="d-inline" id="delete-{{ $user->id }}" action="{{ route('users.destroy', $user) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a onclick="$('#delete-{{ $user->id }}').submit()" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </form>
                                <form method="POST" class="d-inline" id="update-{{ $user->id }}" action="{{ route('users.update', $user) }}">
                                    @csrf
                                    @method('PUT')
                                    @if($user->is_block)
                                        <input type="text" name="is_block" value="0" class="d-none" />
                                        <a onclick="$('#update-{{ $user->id }}').submit()" class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="UnBlock" href="#"><i class="ri-check-line"></i></a>
                                    @else
                                        <input type="text" name="is_block" value="1" class="d-none" />
                                        <a onclick="$('#update-{{ $user->id }}').submit()" class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Block" href="#"><i class="ri-close-line"></i></a>
                                    @endif
                                </form>
                                </div>
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5">No Record Found</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
