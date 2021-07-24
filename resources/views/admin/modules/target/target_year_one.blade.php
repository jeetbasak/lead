  @php
                                $month=array('January','February','March','April','May','June','July','August','September','October','November','December');
                                @endphp
 @for($i=(date('m'))-1;$i<=count($month)-1;$i++)
   <option value="{{@$month[$i]}}">{{@$month[$i]}}</option>
@endfor