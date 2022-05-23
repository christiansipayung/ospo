@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Department</div>

                    <div class="card-body">
                        <form action="/department-add" method="POST" >
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Department Name') }}</label>
                                <div class="col-md-6">
                                    <input id="departmentName" type="text" class="form-control @error('name') is-invalid @enderror" name="departmentName" value="{{ old('departmentName') }}" required autocomplete="name" autofocus>
                                    @error('departmentName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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
