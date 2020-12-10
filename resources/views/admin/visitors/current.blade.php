
   @foreach(\App\Visitor::online()->get() as $visitor)
                       <tr>
                           <td>{{$visitor->ip}}</td>
                           <td>{{$visitor->country}}</td>
                           <td>{{$visitor->device}}</td>
                       </tr>
                       @endforeach
