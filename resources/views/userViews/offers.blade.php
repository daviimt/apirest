@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-20">
                <div class="row">
                    <div class="col-md-20">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">OFFERS</h4>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>TITLE</th>    
                                            <th>DESCRIPTION</th>
                                            <th>MAX DATE</th>
                                            <th>Nº</th>
                                            <th>CICLE</th>
                                           
                                        </thead>
                                        <tbody>
                                            @foreach ($offers as $offer)
                                                @if($offer->deleted == 0)
                                                    <tr>
                                                        @if($offer->deleted == 0)
                                                            <td style="width: 15%;">{{ $offer->title }}</td>
                                                            <td style="width: 60%;">{{ $offer->description }}</td>
                                                            <td style="width: 10%;">{{ $offer->date_max }}</td>
                                                            <td style="width: 3%;">{{ $offer->num_candidates }}</td>
                                                            <td style="width: 22%;">
                                                                @foreach ($cicles as $cicle)
                                                                    @if($offer->cicle_id == $cicle->id) 
                                                                        {{ $cicle->name }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        @endif
                                                    </tr> 
                                                @endif
                                            @endforeach
                                    </table>    
                                </div>
                            <div class="float-left">
                                {{$offers->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                        
                                                                       
                                                


