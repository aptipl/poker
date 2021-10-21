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
            <h4 class="card-title">Game Code: {{ $game->code }}</h4>
            <h4 class="card-title">Game Cards: {{ $game->number }}</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Card Number</th>
                    <th>Votes</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($votes as $number => $vote)

                    <tr>
                        <th>{{ $loop->iteration	 }}</th>
                        <th>{{ $number }}</th>
                        <th>{{ count($vote) }}</th>
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
