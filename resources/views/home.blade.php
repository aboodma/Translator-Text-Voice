@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Current Visitors') }}</div>

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

                       </tbody>
                   </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-warning card-outline">
                <div class="card-header">{{ __('Last 24 Visitors') }}</div>

                <div class="card-body">
                    <h3 id="l_24_v">
                    {{ Shetabit\Visitor\Models\Visit::where("created_at",">",\Illuminate\Support\Carbon::now()->subDay())->where("created_at","<",\Illuminate\Support\Carbon::now())->count()}}
                    <span style="font-size: 1rem"> Visitor</span>

                    </h3>
                </div>
            </div>
        </div>
         <div class="col-md-3">
            <div class="card card-success card-outline">
                <div class="card-header">{{ __('Last Month Visitors') }}</div>

                <div class="card-body">
                    <h3 id="l_m_v">                    {{ Shetabit\Visitor\Models\Visit::where("created_at",">",\Illuminate\Support\Carbon::now()->subMonth())->where("created_at","<",\Illuminate\Support\Carbon::now())->count()}}
                                        <span style="font-size: 1rem"> Visitor</span>

                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card card-danger card-outline">
                <div class="card-header">{{ __('All Visitors') }}</div>

                <div class="card-body">
                    <h3 id="l_a_v">                    {{ Shetabit\Visitor\Models\Visit::all()->count()}}
                                        <span style="font-size: 1rem"> Visitor</span>

                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            function current(){
                 $.ajax({
                url:"{{route('visitors.current')}}",
                type:"GET",
                success:function (data){
                    $("#current_body").html(data);
            }
            });
            }
            function all(){
                 $.ajax({
                url:"{{route('visitors.all.count')}}",
                type:"GET",
                success:function (data){
                    $("#l_a_v").html(data+'  <span style="font-size: 1rem"> Visitor</span>');
            }
            });
            }
            function day(){
                 $.ajax({
                url:"{{route('visitors.day.count')}}",
                type:"GET",
                success:function (data){
                    $("#l_24_v").html(data+'  <span style="font-size: 1rem"> Visitor</span>');
            }
            });
            }
            function month(){
                 $.ajax({
                url:"{{route('visitors.month.count')}}",
                type:"GET",
                success:function (data){
                    $("#l_m_v").html(data+'  <span style="font-size: 1rem"> Visitor</span>');
            }
            });
            }



            current();
            all();
            day();
            month();
            window.setInterval(function(){
             current();
            all();
            day();
            month();
            }, 3000);

        })
    </script>
    @endsection
