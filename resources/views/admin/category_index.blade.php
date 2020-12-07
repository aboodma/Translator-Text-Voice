@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-body shadow-sm">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>{{__('Id')}}</td>
                    <td>{{__('Name')}}</td>
                    <td>{{__('Icon')}}</td>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->icon}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
