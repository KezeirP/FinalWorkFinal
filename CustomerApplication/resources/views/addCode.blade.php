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
                    <div class="card-body">
                        <ul class="list-group" style="color: #000; text-align: center;">
                            <p style="color: white;">Kies 1 of meer van volgende codes en voeg deze toe in het tekstveld</p>
                            <li class="list-group-item">FX13FJK4</li>
                            <li class="list-group-item">GID45IDK</li>
                            <li class="list-group-item">KI56JI37</li>
                            <li class="list-group-item">GD78HIU8</li>
                            <li class="list-group-item">AZE4G456</li>
                            <li class="list-group-item">UIJ678KI</li>
                            <li class="list-group-item">NJ78KI89</li>
                            <li class="list-group-item">BWI456JI</li>
                            <li class="list-group-item">SDI90KI8</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection