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
<x-app-layout>

    @foreach($game->cards() as $card)
        <div class="col-md-3 col-sm-4 col-xs-10 m-3 text-primary card">
            <div class="top-left">{{ $card }}</div>
            <div class="border-primary font-size-80 text-center ml-lg-3 mr-lg-3 center">{{ $card }}</div>
            <div class="bottom-right">{{ $card }}</div>
            @if($number > 0)
                @if($number == $card)
                <form action="#" class="text-center mb-3">
                    <button type="button" class="bg-success iq-sign-btn" role="button">Your Card</button>
                </form>
                @endif
            @else
            <form action="{{ route('game-vote') }}" method="post" class="text-center mb-3">
                @csrf
                <input type="hidden" name="game_id" value="{{ $game->id }}">
                <input type="hidden" name="number" value="{{ $card }}">
                <button type="submit" class="bg-primary iq-sign-btn" role="button">Flip Card</button>
            </form>
            @endif
        </div>
    @endforeach
</x-app-layout>
