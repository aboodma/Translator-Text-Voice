@extends('layouts.app')


@section('content')

<div class="row">
 <div class="col-md-12">
      <div class="card shadow-sm">
      <div class="card-body">
            <form action="{{route('topics.update',$topic->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">{{__('Category')}}</label>
                    <select name="category_id" class="form-control" required id="">
                        <option value="">{{__('Select Category')}}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == $topic->category_id) selected @endif>{{$category->name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">{{__('Topic')}}</label>
                    <textarea name="text" id="" class="form-control" required cols="30" rows="5">{{$topic->text}}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success form-control">{{__('Update')}}</button>
                </div>
            </form>
      </div>
  </div>
 </div>
</div>

@endsection
