@section('game')
    class="active"
@endsection

@section('game-show')
    show
@endsection

@section('game-list')
    class="active"
@endsection
@section('css')
    <style>
        .card {
            font-size: 1.5em;
            border-radius: 3%;
            box-shadow: 0px 1px 15px grey;
        }

        .center {
            height: 350px;
            border: 1px solid;
            border-radius: 3%;
            padding: 100px;
        }

        .top-left {
            padding: 0.9em;
        }

        .bottom-right {
            padding: 0.9em;
            align-self: end;
            transform: rotate(180deg);
        }
    </style>
@endsection

@section('game-card')
    @foreach($game->cards() as $card)
        <div class="col-md-3 col-sm-4 col-xs-10 m-3 text-primary card">
            <div class="top-left">{{ $card }}</div>
            <div class="border-primary font-size-80 text-center ml-lg-3 mr-lg-3 center">{{ $card }}</div>
            <div class="bottom-right">{{ $card }}</div>
        </div>
    @endforeach
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
