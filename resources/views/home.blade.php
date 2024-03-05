@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-6">
            <form method="POST" action="{{route('client.appeal.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group text-center p-2">
                    <label for="theme">Тема</label>
                    <input type="text" class="form-control" name="theme" placeholder="Введите тему">
                    @error('theme')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text-center p-2">
                    <label for="message">Сообщение</label>
                    <input type="text" class="form-control" name="message" placeholder="Введите сообщение">
                    @error('message')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text-center p-2">
                    <label for="name">Ваше имя</label>
                    <input type="text" class="form-control" name="name" placeholder="Введите Ваше имя">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text-center p-2">
                    <label for="email">Ваш Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Введите Ваш email">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group  p-2">
                    <input type="file" class="form-control-file" name="file">
                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
@endsection
