@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">ARTICLES</h4>
                                <p class="card-category">Registered Users</p>
                            </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>TITLE</th>    
                                            <th>DESCRIPTION</th>
                                            <th>IMG</th>
                                            <th>CICLE</th>
                                           
                                        </thead>
                                        <tbody>
                                            @foreach ($articles as $article)
                                                @if($article->deleted == 0)
                                                    <tr >
                                                        @if($article->deleted == 0)
                                                            <td style="width: 15%;">{{ $article->title }}</td>
                                                            <td style="width: 60%;">{{ $article->description }}</td>
                                                            <td style="width: 10%;">
                                                            @if(str_contains($article->image, ".png"))
                                                                <img src="{{ asset('images/'.$article->image) }}" style="width:40px;"></>
                                                                @else
                                                                <img src="{{ asset('images/noimage.png') }}" style="width:40px;"></>
                                                            @endif
                                                            </td>
                                                            <td style="width: 15%;">
                                                                @foreach ($cicles as $cicle)
                                                                    @if($article->cicle_id == $cicle->id) 
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
                                {{$articles->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
                        
                                                                       
                                                


