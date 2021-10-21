@section('user')
    class="active"
@endsection
<x-app-layout>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Vote History</h4>
                </div>
            </div>
            <div class="iq-card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Game Code</th>
                        <th>Card Selected</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($votes as $vote)

                        <tr>
                            <th>{{ $loop->iteration	}}</th>
                            <th>{{ $vote->game->code }}</th>
                            <th>{{ $vote->number }}</th>
                            <th>{{ \Carbon\Carbon::parse($vote->created_at)->format('jS M Y')}}</th>
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
        </div>
    </div>
</x-app-layout>
