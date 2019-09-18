@extends('layouts.master')

@section("content")
    
    <div class="container">
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
            <div class="text-center">
                <form action="{{ route('keywordtool') }}" method="POST" style="margin-top: 20px;">
                    <div class="form-group">
                        <input name="keyword" type="text" class="form-control" placeholder="Search">
    
                        {{ csrf_field() }}
                    </div>
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
    </div>

    @isset($imgArr)
        @if(count($imgArr) > 0)
            <div class="text-center" style="margin-top: 20px;">
                @foreach($imgArr as $element)
                    <img src="{{ $element->assets->preview->url }}">
                @endforeach
            </div>
        @endif
    @endisset

@endsection