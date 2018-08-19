@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 5em">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('History') }}

                        <div class="dropdown"style="height: 100%; width: auto; float: right; display:none; ">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                choose your device
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach($history as $h)
                                    <a class="dropdown-item" href="{{action('HistoryController@show', $h->id)}}" id="{{$h->code}}">{{$h->code}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                           <table class="table table-striped table-dark">
                               <thead>
                               <tr>
                                   <th scope="col">id</th>
                                   <th scope="col">longitude</th>
                                   <th scope="col">latitude</th>
                                   <th scope="col">Device</th>
                                   <th scope="col">Temperature</th>
                                   <th scope="col">speed</th>
                                   <th scope="col">Time</th>
                                   <th scope="col">name</th>
                                   <th scope="col">email</th>
                               </tr>
                               </thead>
                               <tbody>

                               @foreach($history as $h)
                                   <tr>
                                       <th scope="row">{{$h->id}}</th>
                                       <td>{{$h->longitude}}</td>
                                       <td>{{$h->latitude}}</td>
                                       <td>{{$h->Device}}</td>
                                       <td>{{$h->Temperature}}</td>
                                       <td>{{$h->speed}}</td>
                                       <td>{{$h->Time}}</td>
                                       <td>{{$h->name}}</td>
                                       <td>{{$h->email}}</td>
                                   </tr>
                               @endforeach

                               </tbody>
                           </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection