<h1>Jobster</h1>
<h2>
    {{ $heading }}
</h2>

@unless (count($listings) == 0)

    @foreach ($listings as $listing)
        <h3>
            <a href="/listings/{{ $listing['id'] }}">{{ $listing['title'] }}</a>
        </h3>
        <p>
            {{ $listing['description'] }}
        </p>
    @endforeach

@else

    <p>No listings found</p>

@endunless