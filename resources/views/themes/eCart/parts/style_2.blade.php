@if (isset($s->products) && is_array($s->products) && count($s->products))
    <div class="main-content my-2 my-md-3">
        <section class="new-arrival">
            <div class="container-fluid">
                <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_right_bar">
                                <div class="product_container">
                                    @if (isset($s->title) && $s->title != '')
                                        <div class="section_title d-flex mb-3 align-items-baseline border-bottom">
                                            <h2>
                                                <span
                                                    class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ $s->title }}</span>
                                            </h2>
                                            <div class="pop_desc_title">
                                                @if (isset($s->slug) && $s->slug != '')
                                                    <a href="{{ route('shop', ['section' => $s->slug]) }}"
                                                        class="btn-1 view title-section view-all ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto">{{ __('msg.view_all') }}&nbsp;&nbsp;<i
                                                            class="fas fa-long-arrow-alt-right"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <div class="product_carousel_content new-arrival-carousel owl-carousel">
                                        @php   $maxProductShow = get('style_2.max_product_on_homne_page'); @endphp
                                        @foreach ($s->products as $p)
                                            @if (--$maxProductShow > -1)
                                                <div class="product_items">
                                                    <article class="single_product">
                                                        <figure>
                                                            @if (!count(getInStockVarients($p)))
                                                                <div class="content_label">
                                                                    <span
                                                                        class="sold-out">{{ __('msg.sold_out') }}</span>
                                                                </div>
                                                            @endif
                                                            <div class="product_thumb">
                                                                <a class="primary_img"
                                                                    href="{{ route('product-single', $p->slug) }}"><img
                                                                        class="lazy"
                                                                        data-original="{{ $p->image }}"
                                                                        alt="{{ $p->name ?? 'Product Image' }}"></a>

                                                                <div class="action_links">
                                                                    <span class="inner product_data">
                                                                        <ul>
                                                                            @if (count(getInStockVarients($p)))
                                                                                <input type="hidden" class="id"
                                                                                    name="id"
                                                                                    value="{{ $p->id }}"
                                                                                    data-id="{{ $p->id }}">

                                                                                @foreach (getInStockVarients($p) as $v)
                                                                                    <input type="hidden"
                                                                                        class="varient"
                                                                                        data-varient="{{ $v->id }}"
                                                                                        name="varient"
                                                                                        value="{{ $v->id }}"
                                                                                        data-price='{{ get_price(get_price_varients($v)) }}'
                                                                                        data-mrp='{{ get_price(get_mrp_varients($v)) }}'
                                                                                        data-savings='{{ get_savings_varients($v) }}'
                                                                                        checked>
                                                                                    <input type="hidden"
                                                                                        class="qtyPicker qtyPicker-single-page qty"
                                                                                        name="qty" type="number"
                                                                                        id="qty-{{ $v->id }}"
                                                                                        name="qty" data-min="1"
                                                                                        min="1"
                                                                                        max="{{ (int) $v->stock + 1 }}"
                                                                                        data-max="{{ (int) $v->stock + 1 }}"
                                                                                        data-max-allowed="{{ Cache::get('max_cart_items_count') + 1 }}"
                                                                                        value="{{ $v->cart_count + 1 }}"
                                                                                        readonly
                                                                                        data-qty="{{ $v->cart_count + 1 }}">
                                                                                @endforeach
                                                                                <input type="hidden" class="slug"
                                                                                    value="{{ $p->slug }}"
                                                                                    data-slug="{{ $p->slug }}">
                                                                                <input type="hidden" class="name"
                                                                                    name="name"
                                                                                    value="{{ $p->name }}"
                                                                                    data-name="{{ $p->name }}">
                                                                                <input type="hidden" class="image"
                                                                                    name="image"
                                                                                    value="{{ $p->image }}"
                                                                                    data-image="{{ $p->image }}">
                                                                                <input type="hidden" class="price"
                                                                                    name="price"
                                                                                    value="{{ print_price($p) }}"
                                                                                    data-price="{{ print_price($p) }}">
                                                                                @if (count(getInStockVarients($p)) > 1)
                                                                                    <li class="add_to_cart productmodal"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modal_box"
                                                                                        data-tab="quick_view"><a
                                                                                            title="Add to cart"><span
                                                                                                class="fas fa-shopping-cart"></span></a>
                                                                                    </li>
                                                                                @else
                                                                                    <li class="add_to_cart addtocart_single"
                                                                                        data-id="{{ $p->id }}"
                                                                                        data-varient="{{ $v->id }}"
                                                                                        data-qty="1"><a
                                                                                            title="Add to cart"><span
                                                                                                class="fas fa-shopping-cart"></span></a>
                                                                                    </li>
                                                                                @endif
                                                                                <li class="quick_button productmodal"><a
                                                                                        title="quick view"><span
                                                                                            class="fas fa-eye"></span></a>
                                                                                </li>
                                                                            @endif
                                                                            @if (session()->has('favourite'))
                                                                                @if (in_array($p->id, session()->get('favourite')))
                                                                                    <li class="wishlist"><a
                                                                                            title="Add to Wishlist"
                                                                                            class="saved"
                                                                                            data-id='{{ $p->id }}'></a>
                                                                                    </li>
                                                                                @else
                                                                                    <li class="wishlist"><a
                                                                                            title="Add to Wishlist"
                                                                                            class="save"
                                                                                            data-id='{{ $p->id }}'></a>
                                                                                    </li>
                                                                                @endif
                                                                            @else
                                                                                <li class="wishlist"><a
                                                                                        title="Add to Wishlist"
                                                                                        class="{{ isset($p->is_favorite) && intval($p->is_favorite) ? 'saved' : 'save' }}"
                                                                                        data-id='{{ $p->id }}'></a>
                                                                                </li>
                                                                            @endif
                                                                        </ul>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <figcaption class="product_content">
                                                                <h4 class="product_name"><a
                                                                        href="{{ route('product-single', $p->slug) }}">
                                                                        @if (strlen(strip_tags($p->name)) > 30)
                                                                            {!! substr(strip_tags($p->name), 0, 28) . '...' !!}
                                                                        @else
                                                                            {!! substr(strip_tags($p->name), 0, 30) !!}
                                                                        @endif
                                                                    </a></h4>
                                                                <div class="price_box">
                                                                    <span class="current_price"
                                                                        id="price_{{ $p->id }}">{!! print_price($p) !!}</span>
                                                                    <span class="old_price"
                                                                        id="mrp_{{ $p->id }}">{!! print_mrp($p) !!}</span>
                                                                    @if (get_savings_varients($p->variants[0]))
                                                                        <span
                                                                            class="discount-percentage discount-product"
                                                                            id="savings_{{ $p->id }}">{{ get_savings_varients($p->variants[0]) }}</span>
                                                                    @endif
                                                                </div>
                                                            </figcaption>
                                                        </figure>
                                                    </article>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    @if (isset($s->offer_images) && is_array($s->offer_images) && count($s->offer_images))
                                        <div class="popular_content">
                                            @foreach ($s->offer_images as $i => $o)
                                                @if ($o->type == 'products')
                                                    <a href="{{ route('product-single', $o->slug ?? '-') }}">
                                                    @elseif($o->type == 'category')
                                                        <a href="{{ route('category', $o->slug ?? '-') }}">
                                                        @elseif($o->type == 'offer_image_url')
                                                            <a href="{{ $o->offer_image_url }}" target="_blank">
                                                            @else
                                                @endif
                                                <div class="row my-md-5 my-sm-2 my-3">
                                                    <div class="col-md-12">
                                                        <div class="banner_box_content">
                                                            @if (isset($o->offer_type) && $o->offer_type == 'image')
                                                                <img class="lazy "
                                                                    data-original="{{ $o->image }}"
                                                                    alt="offer">
                                                            @elseif(isset($o->offer_type) && $o->offer_type == 'video')
                                                                <video controls class="w-100">
                                                                    <source src="{{ $o->video }}"
                                                                        type="video/mp4">
                                                                </video>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
