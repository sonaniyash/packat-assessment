@foreach($products as $product)
    <div class="col">
        <div class="card shadow-sm">
            <a href="{{ route('get.product.show', ['id' => $product['id']]) }}">
                <img src="https://static.packt-cdn.com/products/{{ $product['id'] }}/cover/smaller" alt="{{ $product['title'] }}" class="bd-placeholder-img card-img-top" height="225" loading="lazy"/>
            </a>

            <div class="card-body d-flex flex-column">
                <h5 class="card-title">
                    <a href="{{ route('get.product.show', ['id' => $product['id']]) }}" class="text-black text-decoration-none">
                        {{ $product['title'] }}
                    </a>
                </h5>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        By {{ implode(', ', $product['authors']) }}
                    </small>
                </div>
                <div class="mt-1 d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                    </small>
                    <small class="text-muted">
                        {{ \Carbon\Carbon::parse($product['publication_date'])->toFormattedDateString() }}
                    </small>
                </div>
            </div>
        </div>
    </div>
@endforeach
