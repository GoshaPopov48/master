<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-4" href="{{route('home')}}">Автопрокат</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cars')}}">Авто</a>
                </li>
                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('createCarForm')}}">Добавить Авто</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('support')}}">Служба Поддержки</a>
                    </li>
                @endif
            </ul>
            <div class="d-fle">
                @if(auth()->guest())
                    <a href="{{route('register.form')}}" class="m-lg-1 btn btn-info">Регистрация</a>
                    <a href="{{route('login.form')}}" class="m-lg-1 btn btn-primary">Вход</a>
                @else
                <form action="{{route('logout')}}" method="post">
                    <a href="" class="m-lg-1"> {{auth()->user()->name}}({{auth()->user()->number}})</a>
                    @csrf
                    <button type="submit" class="btn btn-danger">Выход</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</nav>
