@extends('templates.mainCar')

@section('main')
    <div class="row mt-4">
        <form action="{{route('register.action')}}" method="post">
            @csrf
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" name="name" value="{{old('name')}}"
                       class="form-control @error('name') is-invalid @enderror " id="name">
                @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label for="number" class="form-label">Номер телефона</label>
                    <input type="number" name="number" value="{{old('number')}}"
                           class="form-control @error('number') is-invalid @enderror " id="number">
                    @error('number')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" value="{{old('email')}}"
                       class="form-control @error('email') is-invalid @enderror " id="email">
                @error('email')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
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
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"
                           class="form-control" id="password_confirmation">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Создать аккаунт</button>
                <a href="{{route('login.form')}}" class="btn btn-success">Есть аккаунт?</a>
        </form>
    </div>
@endsection
