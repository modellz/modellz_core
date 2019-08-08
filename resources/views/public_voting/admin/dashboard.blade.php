@extends('base_layouts.app1')
<!--main content-->
@section('NavSide')
    @include('base_includes.navbar')
    @include('base_includes.sidebar')
@endsection
@section('content')
<div class="card m-2 shadow-lg">
    <div class="card-body">
            <select id="IdTableView" class="form-control col-md-2 mb-2" title="select category" style="font-weight: bold;">
                @foreach($awards as $award)
                <option value="{{$award->award_name}}" style="font-weight: bold;">{{$award->award_name}}</option>
                    @endforeach
            </select>
        <table id="datax" class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Film_name</th>
                <th>Director</th>
                <th>Total_votes</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
<!--./main content-->
@section('page_scripts')
    <script>
        $(function () {
            let table = $('#datax').DataTable({
                processing:true,
                serverSide: true,
                ajax: {
                    "url": "{!! route('datatables.data') !!}",
                    "type": "POST",
                    data: function ( d ) {
                        d.viewvalue = document.getElementById("IdTableView").value ;
                            d._token= document.getElementById("IdCsfrFetch").value;
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'film', name: 'film' },
                    { data: 'director', name: 'director' },
                    { data: 'votes', name: 'votes' },
                ],
                stateSave: true,
                "scrollX": true,
                select: true
            });

        });
    </script>
@endsection