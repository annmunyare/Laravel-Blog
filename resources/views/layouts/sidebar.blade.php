<ul class="list-group">
        @foreach($archives as $item)
        <li class="list-group-item">
        <a href="/posts?month={{$item->month}}&year={{$item->year}}">
        <!-- {{$item['month'] . '' . $item['year']}}
        
        ({{$item['published']}}) -->
        {{$item->month}}
        {{$item->year}}
        ({{$item->published}})
        </a>
        </li>
        @endforeach

        </ul>