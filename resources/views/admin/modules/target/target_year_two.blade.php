 @php
                                $month=array('January','February','March','April','May','June','July','August','September','October','November','December');
                                @endphp

@for($i=0;$i<=count($month)-1;$i++)
<option value="{{$i}}-{{@$month[$i]}}">{{@$month[$i]}}</option>
@endfor