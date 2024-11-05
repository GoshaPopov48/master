@extends('templates.mainCar')

@section('main')
    <div class="row mt-4">
        <h3 class="mb-3">Изменить {{$car->name}} авто</h3>
        <form action="{{route('updateCar', ['car'=>$car->id])}}"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name"  value="{{old('name'), $car->name}}" class="form-control @error('name') is-invalid @enderror " id="name">
                @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea  name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{old('description'), $car->description}}</textarea>
                @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="mb-3">
                <img class="d-block mb-3" style="height:200px; width: 200px" src="{{asset($car->preview_image)}}" alt="">
                <label for="preview" class="form-label">Фото авто</label>
                <input class="form-control @error('preview') is-invalid @enderror" name="preview" type="file" id="preview">
                @error('preview')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input type="number" name="price"  value="" class="form-control @error('price') is-invalid @enderror " id="price">
                @error('price')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            </div>
            @enderror
            <div class="form-check mb-3">
                <input class="form-check-input" name="is_public" type="checkbox" id="is_public" {{(bool)$car->is_public == true ? 'checked' : ''}}>
                <label class="form-check-label" for="flexCheckDefault">
                    Разместить
                </label>
            </div>
            <button type="submit" class="btn btn-success">Изменить</button>
            <a href="{{route('car', [$car->id])}}" class="btn btn-info">Назад к обьявлению</a>
        </form>
    </div>
@endsection
