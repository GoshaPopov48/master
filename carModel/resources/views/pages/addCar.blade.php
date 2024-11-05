@extends('templates.mainCar')

@section('main')
    <div class="row mt-4">
        <form action="{{route('createCar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1">
                @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea  name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{old('description')}}</textarea>
                @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="preview" class="form-label">Фото Машины</label>
                <input class="form-controlr @error('preview') is-invalid @enderror" name="preview" type="file" id="preview">
                @error('preview')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
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
                <input class="form-check-input" name="is_public" type="checkbox" id="is_public">
                <label class="form-check-label" for="flexCheckDefault">
                    Is Public
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
