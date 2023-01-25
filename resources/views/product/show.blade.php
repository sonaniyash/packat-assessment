@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10" id="product-card">
                <div id="loader" class="loader">
                    <div class="text-center">
                        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        let loader = $('#loader');
        let productCard = $('#product-card');

        loadProductData();

        async function loadProductData() {
            loader.show();

            await $.ajax({
                url : "{{ route('get.product.detail', ['id' => $id]) }}",
                type : "GET",
            }).done(function (data) {
                productCard.append(data.html);
                loader.hide();
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.error('server not responding...');
            });
        }
    </script>
@endpush
