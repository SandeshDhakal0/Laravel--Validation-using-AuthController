@push('metaTitle')
    <title>Add Product</title>
@endpush

@include('layout.header')

@include('layout.nav')
@include('layout.sidebar')
{{--{{$product}}--}}
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div
                id="carouselMultiItemExample"
                class="carousel slide carousel-dark text-center"
                data-mdb-ride="carousel"
            >
                <!-- Controls -->
                <div class="d-flex justify-content-center mb-4">
                    <button
                        class="carousel-control-prev position-relative"
                        type="button"
                        data-mdb-target="#carouselMultiItemExample"
                        data-mdb-slide="prev"
                    >
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button
                        class="carousel-control-next position-relative"
                        type="button"
                        data-mdb-target="#carouselMultiItemExample"
                        data-mdb-slide="next"
                    >
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="carousel-inner py-4">
                    <!-- Single item -->
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                @foreach($products as $item)
                                    @foreach($item->imagestore as $a)

                                <div class="col-lg-4">
                                    <div class="card">
                                            <img
                                                src="{{ asset('storage/uploads/'.$a->imagename) }}"

                                                class="card-img-top"
                                                alt="Waterfall"
                                            />

                                        @endforeach
                                        <div class="card-body">
                                            <h5 class="card-title">{{$item->name}}</h5>
                                            <p class="card-text">
                                                {{$item->description}}
                                            </p>
                                            <a href="#!" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="card">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp"
                                            class="card-img-top"
                                            alt="Sunset Over the Sea"
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="card">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/new/standard/nature/183.webp"
                                            class="card-img-top"
                                            alt="Sunset over the Sea"
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single item -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="card">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp"
                                            class="card-img-top"
                                            alt="Fissure in Sandstone"
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="card">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/new/standard/nature/185.webp"
                                            class="card-img-top"
                                            alt="Storm Clouds"
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="card">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/new/standard/nature/186.webp"
                                            class="card-img-top"
                                            alt="Hot Air Balloons"
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single item -->
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                    <div class="card">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/new/standard/nature/187.webp"
                                            class="card-img-top"
                                            alt="Peaks Against the Starry Sky"
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4 mb-lg-0 d-none d-lg-block">
                                    <div class="card">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/new/standard/nature/188.webp"
                                            class="card-img-top"
                                            alt="Bridge Over Water"
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-4 mb-lg-0 d-none d-lg-block">
                                    <div class="card">
                                        <img
                                            src="https://mdbcdn.b-cdn.net/img/new/standard/nature/189.webp"
                                            class="card-img-top"
                                            alt="Purbeck Heritage Coast"
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk
                                                of the card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Button</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Inner -->
            </div>
        </div>
    </section>





</div>

@include('layout.footer')
@include('layout.script')

</body>
</html>


