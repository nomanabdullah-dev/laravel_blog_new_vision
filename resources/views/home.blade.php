@extends('master')
@section('content')
@if ($home)
    @foreach ($home as $value)
        @if ($value->section_title=='banner_image')
            <style>
                .tm-main-bg{
                    background-image: url({{ asset('public/uploads') }}/{{ $value->data }});
                }
            </style>
        @endif
    @endforeach
@endif
        <div class="row">
            <div class="col-12">
                <div class="tm-main-bg"></div>
            </div>
        </div>

        <!-- Main -->
        <main>
            <!-- Welcome section -->
            <section class="tm-welcome">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-header-floating">
                            @if ($home)
                                @foreach ($home as $value)
                                    @if ($value->section_title=='second_title')
                                        {{ $value->data }}
                                    @endif
                                @endforeach
                            @endif
                        </h2>
                    </div>
                </div>

                <div class="row tm-welcome-row">
                    @if ($post)
                        @foreach ($post as $value)
                            @if ($value->section_title=='second_section')
                            <article class="col-lg-6 tm-media">
                                <img src="{{ asset('public/uploads') }}/{{ $value->image }}" alt="Welcome image" class="img-fluid tm-media-img" />
                                <div class="tm-media-body">
                                    <a href="#" class="tm-article-link"><h3 class="tm-article-title text-uppercase">{{ $value->title }}</h3></a>
                                    <p>{!! $value->description !!}</p>
                                </div>
                            </article>
                            @endif
                        @endforeach
                    @endif
                </div>

                <div class="row tm-welcome-row-2">
                    @if ($post)
                        @foreach ($post as $value)
                            @if ($value->section_title=='third_section')
                                <div class="col-lg-4 tm-dotted-box-container">
                                    <article class="tm-dotted-box">
                                        <img src="{{ asset('public/uploads') }}/{{ $value->image }}" alt="Welcome image" class="img-fluid tm-article-icon" width="80px"/>
                                        <h3 class="tm-article-title mb-0">{{ $value->title }}</h3>
                                        <p class="tm-article-text">{!! $value->description !!}</p>
                                        <a class="tm-btn tm-btn-rounded tm-article-link" href="#">More Details</a>
                                    </article>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </section>

            <!-- Featured -->
            <section class="tm-featured">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-section-header-small">
                            @if ($home)
                                @foreach ($home as $value)
                                    @if ($value->section_title=='forth_icon')
                                        {{ $value->data }}
                                    @endif
                                @endforeach
                            @endif
                        </h2>
                    </div>
                </div>

                <!-- Carousel -->
                <div class="grid tm-carousel">
                    @if ($post)
                        @foreach ($post as $value)
                            @if ($value->section_title=='forth_section')
                                <figure class="effect-honey">
                                    <img src="{{ asset('public/uploads') }}/{{ $value->image }}" alt="Featured Item"/>
                                    <figcaption>
                                        <h4><i><span>Best</span> HTML Template</i></h4>
                                    </figcaption>
                                </figure>
                            @endif
                        @endforeach
                    @endif
                </div>
            </section>

            <footer>
                Copyright &copy; 2020 New Vision

                - Design: <a href="https://templatemo.com" rel="sponsored" target="_parent" title="css templates">TemplateMo</a>
            </footer>

        </main>

@endsection

@push('footer-script')

@endpush
