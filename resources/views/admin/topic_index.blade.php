@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-body shadow-sm">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>{{__('Id')}}</td>
                    <td>{{__('Text')}}</td>
                    <td>{{__('Category Name')}}</td>
                </tr>
                </thead>
                <tbody>
                @foreach($topics as $topic)
                <tr>
                    <td>{{$topic->id}}</td>
                    <td>{{$topic->text}}</td>
                    <td>{{$topic->Category->name}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
