@section('game')
    class="active"
@endsection

@section('game-show')
    show
@endsection

@section('game-add')
    class="active"
@endsection

<x-admin-layout>
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">{{ isset($game) ? 'Update' : 'Add' }} Game</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <form class="needs-validation" method="POST" novalidate action="{{ isset($game) ? route('games.update', $game) : route('games.store') }}">
            @csrf
            @if(isset($game))
                @method('PUT')
            @endif

                <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="name">number</label>
                    <input type="number" class="form-control" id="number" name="number" required value="{{ isset($game->number) ? $game->number : old('number') }}">
                    <div class="invalid-feedback">
                        Please enter number of card.
                    </div>
                </div>
            <button class="btn btn-primary" type="submit">{{ isset($game) ? 'Update' : 'Generate' }} Game</button>
        </form>
    </div>
</x-admin-layout>
