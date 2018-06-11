@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 5em">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('edit') }}</div>
                    <div class="card-body">



                        <form method="post" action="{{action('AddCodeController@update', $id)}}">

                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group row">
                                <label for="code" class="col-sm-4 col-form-label text-md-right">{{ __('change your device code here') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="code" value="{{$code->code}}">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('addCode') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection