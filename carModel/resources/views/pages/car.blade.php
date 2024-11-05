@extends('templates.mainCar')
@section('main')
    <img src="{{asset($car->preview_image)}}"
         class="card-img-top" alt="" style="width:400px; height:400px">
    <h1 class="mt-3">{{$car->name}}</h1>
    <span class="badge text-bg-secondary mb-4">{{$car->created_at}}</span>
    <span class="badge text-bg-success mb-4">{{$car->price . '$'}}</span>
    <p>{{$car->description}}</p>
    @if(auth()->check())
        <h1>Оставьте свой отзыв об Авто</h1>
        @include('pages.comment')
    @endif
    <h3>Комментарии</h3>
    @foreach($car->comments as $comment)
    <div class="card" style="width:100%; margin-bottom: 10px;">
        <div class="card-body">
            <h5 class="card-title">{{$comment->username}}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">{{$comment->comment}}</h6>
        </div>
    </div>
    @endforeach
    <a href="{{route('cars')}}" class="btn btn-info">Все авто</a>
    <a href="{{route('updateCarForm', ['car'=>$car->id]) }}" class="btn btn-success">Изменить данные</a>
    <form action="{{route('deleteCar', ['car'=>$car->id])}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
@endsection
