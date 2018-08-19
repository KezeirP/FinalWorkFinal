@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 5em">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Viewing device codes') }}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($codes as $code)

                                <tr>
                                    <td style="width: 150%">{{$code->code}}</td>
                                    <td style="display: flex; ">
                                        <div style="text-align: right;  margin-right: 10px;">
                                            <a href="{{action('AddCodeController@edit', $code->id)}}" class="btn btn-warning">Edit</a>
                                        </div>
                                        <div>
                                            <form action="{{action('AddCodeController@destroy', $code->id)}}" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>

                                    </td>
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