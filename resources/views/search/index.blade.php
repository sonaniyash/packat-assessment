@extends('layouts.app')
@section('title', 'Search | Packt')
@section('description', 'Search | Packt')

@section('content')
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-4" id="product-section">
            </div>
            <div id="loader" class="loader">
                <div class="text-center">
                    <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        let page = 1;
        let moreData = true;

        let loader = $('#loader');
        let productsSection = $("#product-section");

        loadMoreData(page);

        $(document.body).on('touchmove', onScroll);
        $(window).on('scroll', onScroll);

        function onScroll() {
            if (loader.is(":visible")) {
                return;
            }

            if (moreData && $(window).scrollTop() + window.innerHeight >= document.body.scrollHeight - ($(window).width() < 575 ? 250 : 150)) {
                page++;
                loadMoreData(page);
            }
        }

        async function loadMoreData(page) {
            loader.show();

            if (page === 1) {
                productsSection.html('');
                moreData = true;
            }

            await $.ajax({
                url: "{{ route('get.search.list') }}",
                type: "GET",
                data: { page },
            }).done(function (data) {
                productsSection.append(data.html);

                if (data.html === "") {
                    moreData = false;
                }

                loader.hide();
            }).fail(function (jqXHR, ajaxOptions, thrownError) {
                console.error('server not responding...');
            });
        }
    </script>
@endpush
