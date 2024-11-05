@extends('templates.mainCar')

@section('main')
    <form action="">
        @csrf
        @error('error')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </form>
@endsection
