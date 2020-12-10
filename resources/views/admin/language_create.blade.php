@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-md-12">
      <div class="card shadow-sm">
      <div class="card-body">
            <form action="{{route('language.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">{{__('Language Name')}}</label>
                    <input type="text" class="form-control" required name="name">
                </div>
                <div class="form-group">
                    <label for="">{{__('Language Code')}}</label>
                    <input type="text" class="form-control" required name="code">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success form-control">{{__('Create')}}</button>
                </div>
            </form>
      </div>
  </div>
 </div>
</div>
<div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>Code</td>
                            <td>Name</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Language::all() as $language)
                        <tr>
                            <td>{{$language->code}}</td>
                            <td>{{$language->names}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@php
$pth = public_path()."/locales.json";
$json = json_decode(file_get_contents($pth), true);

@endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>Code</td>
                            <td>Name</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($json as $local)
                        <tr>
                            <td>{{$local['code']}}</td>
                            <td>{{$local['name']}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
