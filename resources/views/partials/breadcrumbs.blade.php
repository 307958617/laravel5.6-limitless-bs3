@if (count($breadcrumbs))

    <ul class="breadcrumb heading-text">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                @if($breadcrumb->title == 'Home')
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}"><i class="icon-home2"></i> {{ $breadcrumb->title }}</a></li>
                @else
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @endif
            @else
                @if($breadcrumb->title == 'Home')
                    <li class="breadcrumb-item active"><i class="icon-home2"></i> {{ $breadcrumb->title }}</li>
                @else
                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                @endif
            @endif

        @endforeach
    </ul>

@endif