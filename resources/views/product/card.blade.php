<div class="card">
    <div class="row">
        <div class="col-md-6">
            <div class="images p-3">
                <div class="text-center p-4">
                    <a href="{{ $product['url'] }}" target="_blank">
                        <img src="https://static.packt-cdn.com/products/{{ $product['id'] }}/cover/smaller" alt="Image Description" id="main-image" width="250">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('get.search.index') }}" class="text-decoration-none">
                        <div class="d-flex align-items-center"><i class="fa fa-long-arrow-left"></i> <span class="ms-1">Back</span></div>
                    </a>
                </div>
                <div class="mt-4 mb-3">
                    <a href="{{ $product['url'] }}" target="_blank" class="text-decoration-none">
                        <h5 class="text-uppercase text-black">{{ $product['title'] }}</h5>
                    </a>
                    <span class="text-black brand text-decoration-none">
                                        By
                                        @foreach($product['authors'] as $author)
                            <a href="{{ $author['profile_url'] }}" target="_blank" class="text-black ms-1">
                                                {{ $author['name'] }}
                                            </a>
                        @endforeach
                                    </span>
                </div>
                <p class="about">{{ $product['tagline'] }}</p>
                <dl class="row">
                    <dt class="col-sm-3">Published on</dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($product['publication_date'])->toFormattedDateString() }}</dd>

                    <dt class="col-sm-3">Pages</dt>
                    <dd class="col-sm-9">{{ $product['pages'] }}</dd>

                    <dt class="col-sm-3">ISBN</dt>
                    <dd class="col-sm-9">{{ $product['isbn13'] }}</dd>
                </dl>

                <div class="row">
                    @foreach($prices as $type => $price)
                        <div class="col-6 col-md-3 mb-3 mb-md-0">
                            <label class="d-blockpy-3 px-1 mb-0">
                                <span class="d-block">{{ ucwords($type) }}</span>
                                <span class="">${{ $price['USD'] }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="row d-flex mt-2 p-3">
        <h4>Description</h4>
        <div class="col-12 border-bottom">
            {!! $product['description'] !!}
        </div>
    </div>
    <div class="row d-flex mt-2 p-3">
        <div class="col-6">
            <h4>Learn</h4>
            {!! $product['learn'] !!}
        </div>
        <div class="col-6">
            <h4>Features</h4>
            {!! $product['features'] !!}
        </div>
    </div>
</div>
