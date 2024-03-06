@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <div>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="p-2 text-center">Тема</th>
                                <th class="p-2 text-center">Сообщение</th>
                                <th class="p-2 text-center">Клиент</th>
                                <th class="p-2 text-center">Email клиента</th>
                                <th class="p-2 text-center">Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appeals as $appeal)
                                <tr data-id="{{ $appeal->id }}">
                                    <td class="p-2 text-center pt-3">{{ $appeal->theme }}</td>
                                    <td class="p-2 text-center col-2" style="height: 2em; overflow: auto; max-width: 200px; word-wrap: break-word;">
                                        {{ $appeal->message }}
                                    </td>
                                    <td class="p-2 text-center">{{ $appeal->name }}</td>
                                    <td class="p-2 text-center">{{ $appeal->email }}</td>
                                    <td class="p-2 text-center"><a href="{{ route('admin.show', $appeal->id) }}">Просмотр</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    </div>
@endsection
