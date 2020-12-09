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
                    <td>{{__('Actions')}}</td>
                </tr>
                </thead>
                <tbody>
                @foreach($topics as $topic)
                <tr>
                    <td>{{$topic->id}}</td>
                    <td>{{$topic->text}}</td>
                    <td>
                        {{$topic->Category->name}}
                    </td>
                    <td>
                        <a href="{{route('topics.edit',$topic->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{route('topics.delete',$topic->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
