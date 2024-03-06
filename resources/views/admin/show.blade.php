@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <div>
                    <div class="row col-6">
                        <label><b>Тема обращения</b></label>
                        <p> {{ $appeal->theme }} </p>
                    </div>
                    <div class="row col-6">
                        <label><b>Содержимое обращения</b></label>
                        <p> {{ $appeal->message }} </p>
                    </div>
                    <div class="row col-6">
                        <label><b>Имя автора обращения</b></label>
                        <p> {{ $appeal->name }} </p>
                    </div>
                    <div class="row col-6">
                        <label><b>Email автора</b></label>
                        <p> {{ $appeal->email }} </p>
                    </div>
                    <div class="row col-2">
                        <label><b>Прикрепленный файл</b></label>
                        @if ($appeal->file)
                            <a href="{{ route('download.attached.file', ['filename' => basename($appeal->file)]) }}" download>Скачать файл</a>
                        @else
                            <p> Нет прикрепленного файла </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 p-1">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Назад</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
@endsection
