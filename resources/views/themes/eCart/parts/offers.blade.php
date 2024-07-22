{{-- big Offer banner --}}
@if (Cache::has('offers') && is_array(Cache::get('offers')) && count(Cache::get('offers')))
    @foreach (Cache::get('offers') as $o)
        @if ($o->type == 'products')
            <a href="{{ route('product-single', $o->slug ?? '-') }}">
            @elseif($o->type == 'category')
                <a href="{{ route('category', $o->slug ?? '-') }}">
                @elseif($o->type == 'offer_image_url')
                    <a href="{{ $o->offer_image_url }}" target="_blank">
                    @else
        @endif

        <div class="main-content">
            <div class="container-fluid">
                <div class="py-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="col-md-12">
                        <div class="banner_box_content category">
                            @if (isset($o->offer_type) && $o->offer_type == 'image')
                                <img class="lazy " data-original="{{ $o->image }}" alt="offer">
                            @elseif(isset($o->offer_type) && $o->offer_type == 'video')
                                <video controls class="w-100">
                                    <source src="{{ $o->video }}" type="video/mp4">
                                </video>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </a>
    @endforeach
@endif
