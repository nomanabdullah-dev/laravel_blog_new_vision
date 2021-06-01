@extends('master')
@section('content')
@if ($company)
    @foreach ($company as $value)
        @if ($value->section_title=='banner_image')
            <style>
                .tm-about-bg{
                    background-image: url({{ asset('public/uploads') }}/{{ $value->data }});
                }
            </style>
        @endif
    @endforeach
@endif


        <div class="row">
            <div class="col-12">
                <div class="tm-main-bg tm-about-bg"></div>
            </div>
        </div>

        <!-- Main -->
        <main>
            <!-- Welcome section -->
            <section class="tm-welcome">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-header-floating">
                            @if ($company)
                                @foreach ($company as $value)
                                    @if ($value->section_title=='second_title')
                                        {{ $value->data }}
                                    @endif
                                @endforeach
                            @endif
                        </h2>
                    </div>
                </div>

                <div class="row tm-welcome-row">
                    <div class="tm-about">
                        @if ($post)
                            @foreach ($post as $value)
                                @if ($value->section_title=='second_section')
                                    <div class="col-12 tm-media tm-media-v-center">
                                        <img src="{{ asset('public/uploads') }}/{{ $value->image }}" alt="company image" class="img-fluid tm-about-icon" style="width:40px"/>
                                        <div>
                                            <p><a rel="nofollow">{!! $value->description !!}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="row tm-welcome-row-2">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-section-header-small mb-4">
                            @if ($company)
                                @foreach ($company as $value)
                                    @if ($value->section_title=='third_title')
                                        {{ $value->data }}
                                    @endif
                                @endforeach
                            @endif
                        </h2>
                    </div>

                    @if ($post)
                        @foreach ($post as $value)
                            @if ($value->section_title=='third_section')
                                <div class="col-md-6">
                                    <div class="tm-about-1">
                                        <img src="{{ asset('public/uploads') }}/{{ $value->image }}" alt="Image" class="img-fluid mb-5">
                                        <p class="tm-article-text">{!! $value->description !!}</p>
                                    </div>
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
                        <h2 class="tm-section-header tm-section-header-small mb-3">
                            @if ($company)
                                @foreach ($company as $value)
                                    @if ($value->section_title=='forth_title')
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
                                <figure class="effect-zoe">
                                    <img src="{{ asset('public/uploads') }}/{{ $value->image }}" alt="Featured Item" class="img-fluid">
                                    <figcaption>
                                        <h2>{!! $value->title !!}</h2>
                                        <p class="icon-links">
                                            <a href="https://fb.com"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                                            <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
                                        </p>
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

