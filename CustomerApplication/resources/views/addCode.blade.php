@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 5em">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Adding device codes') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{url('codes')}}" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group row">
                                <label for="code" class="col-sm-4 col-form-label text-md-right">{{ __('Add your device code here') }}</label>

                                <div class="col-md-6">
                                    <input id="code"  class="form-control{{ $errors->has('codeNumber') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required autofocus>
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