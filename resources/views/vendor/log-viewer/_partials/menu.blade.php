<div class="panel panel-success">
    <div class="panel-heading"><h3 class="panel-title"><i class="fa fa-fw fa-flag"></i> Levels</h3></div>
    <ul class="list-group">
        @foreach($log->menu() as $level => $item)
            @if ($item['count'] === 0)
                <a href="#" class="list-group-item disabled">
                    {!! $item['icon'] !!} {{ $item['name'] }}
                    <span class="badge badge-default"> {{ $item['count'] }} </span>
                </a>
            @else
                <a href="{{ $item['url'] }}" class="list-group-item {{ $level }}">
                    <span class="badge level-{{ $level }}">
                        {{ $item['count'] }}
                    </span>
                    <span class="level level-{{ $level }}">
                        {!! $item['icon'] !!} {{ $item['name'] }}
                    </span>
                </a>
            @endif
        @endforeach
    </ul>
</div>