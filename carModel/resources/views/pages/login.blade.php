@extends('templates.mainCar')

@section('main')
    <div class="row mt-4">
        <form action="{{route('login.action')}}" method="post">
            @csrf
            @error('auth_error')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
            <div class="mb-3">
                    <label for="number" class="form-label">Логин</label>
                <input type="text" name="number"
                       class="form-control @error('number') is-invalid @enderror " id="number">
                @error('number')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" value="{{old('password')}}"
                           class="form-control @error('password') is-invalid @enderror " id="password">
                    @error('password')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
                <a href="{{route('register.form')}}" class="btn btn-danger">Нет аккаунта?</a>
        </form>
    </div>
@endsection
