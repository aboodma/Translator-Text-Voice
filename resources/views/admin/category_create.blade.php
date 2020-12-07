@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-md-12">
      <div class="card shadow-sm">
      <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">{{__('Category Name')}}</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">{{__('Category Icon')}}</label>
                    <input type="file" class="form-control" name="icon" accept="image/png">
                    <small>Note : Please Insert PNG Photos </small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success form-control">{{__('Create')}}</button>
                </div>
            </form>
      </div>
  </div>
 </div>
</div>

@endsection
