@section('game')
    class="active"
@endsection

@section('game-show')
    show
@endsection

@section('game-list')
    class="active"
@endsection

<x-admin-layout>
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">Game List</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Cards</th>
                        <th>Participants</th>
                        <th>Share URL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($games as $game)

                        <tr>
                            <th>{{ $loop->iteration	 }}</th>
                            <th>{{ $game->code }}</th>
                            <th>{{ $game->number }}</th>
                            <th>{{ $game->votes()->count() }}</th>
                            <th>{{ $game->shareURL() }}</th>
                            <th>
                                <div class="flex align-items-center list-user-action">
                                    <form method="POST" class="d-inline" id="delete-{{ $game->id }}" action="{{ route('games.destroy', $game) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a onclick="$('#delete-{{ $game->id }}').submit()" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                    </form>
                                    <a href="{{ route('games.show', $game->id) }}" class="iq-bg-success" data-placement="top" title="" data-original-title="View" >
                                        <i class="ri-eye-fill"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="6" class="text-center">No Record Found</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
