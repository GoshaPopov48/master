@extends('templates.mainCar')

@section('main')
    <div class="row row-cols-3 row-cols-md-3 g-4 mt-1">
        @foreach($cars as $car)
        <div class="col">
            <div class="card">
                <img width="400px" height="400px" src="{{$car->preview_image}}"
                     class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$car->name}}</h5>
                    <span class="badge text-bg-secondary mb-3">{{$car->created_at}}</span>
                    <span class="badge text-bg-success mb-3">{{$car->price . '$'}}</span>
                    <p class="card-text">{{$car->description}}</p>
                    <a href="{{route('car', ['car' =>$car->id])}}" class="btn btn-primary">Подробнее об авто </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
