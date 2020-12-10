@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Last Month Visitors') }}</div>

                <div class="card-body">
                   <table class="table table-striped">
                       <thead>
                       <tr>
                           <td>IP</td>
                           <td>Country</td>
                           <td>Device</td>
                       </tr>
                       </thead>
                          <tbody id="current_body">

                            @foreach(Shetabit\Visitor\Models\Visit::where("created_at",">",\Illuminate\Support\Carbon::now()->subMonth())->where("created_at","<",\Illuminate\Support\Carbon::now())->get() as $visitor)
                          <tr>
                            <td>{{$visitor->ip}}</td>
                            <td>{{$visitor->Visitor->country}}</td>
                            <td>{{$visitor->device}}</td>
                        </tr>
                            @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection

