@extends('layouts.master')

@section('content')
<div class="container">
        <div class="text-center">
            @if(count($errors->all()))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <form action="{{ route('contributor') }}" method="POST" style="margin-top: 20px;">
                <div class="form-group">
                    <input name="profile_url" type="text" class="form-control" placeholder="Contributor profile url">

                    {{ csrf_field() }}
                </div>
                <button class="btn btn-primary" type="submit">Get ID</button>
            </form>
        </div>

        @if(isset($id))
            <p>Contributor id: {{ $id }}</p>
        @endif
</div>
@endsection