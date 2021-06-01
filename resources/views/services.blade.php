@extends('master')
@section('content')
@if ($service)
    @foreach ($service as $value)
        @if ($value->section_title=='banner_image')
            <style>
                .tm-services-bg{
                    background-image: url({{ asset('public/uploads') }}/{{ $value->data }});
                }
            </style>
        @endif
    @endforeach
@endif

        <div class="row">
            <div class="col-12">
                <div class="tm-main-bg tm-services-bg"></div>
            </div>
        </div>

        <!-- Main -->
        <main>
            <!-- Welcome section -->
            <section class="tm-welcome">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-header-floating">
                            @if ($service)
                                @foreach ($service as $value)
                                    @if ($value->section_title=='second_title')
                                        {{ $value->data }}
                                    @endif
                                @endforeach
                            @endif
                        </h2>
                    </div>
                </div>

                <div class="row tm-welcome-row tm-services">
                    @if ($post)
                            @foreach ($post as $value)
                                @if ($value->section_title=='second_section')
                                    <div class="col-md-3 col-sm-6">
                                        <figure class="tm-services-img">
                                            <img src="{{ asset('public/uploads') }}/{{ $value->image }}" alt="Image" class="img-fluid" />
                                            {{-- <img src="{{ asset('public/theme/img/services-1.jpg') }}" alt="Image" class="img-fluid"> --}}
                                            <figcaption class="tm-service-description">{!! $value->title !!}</figcaption>
                                        </figure>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                </div>

                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-section-header-small mb-5">
                            @if ($service)
                                @foreach ($service as $value)
                                    @if ($value->section_title=='third_title')
                                        {{ $value->data }}
                                    @endif
                                @endforeach
                            @endif
                        </h2>
                    </div>
                </div>
                <div class="row tm-approach-row">
                    @if ($post)
                        @foreach ($post as $value)
                            @if ($value->section_title=='third_section')
                                <div class="col-md-6">
                                    <div class="tm-approach-box">
                                        <div class="tm-media tm-media-2 tm-media-v-center tm-solid-border">
                                            <img src="{{ asset('public/uploads') }}/{{ $value->image }}" alt="company image" class="img-fluid tm-service-icon" style="width:40px"/>
                                            <div>
                                                <p><a rel="nofollow" target="_parent" href=""></a>{!! $value->description !!}</p>
                                            </div>
                                        </div>
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
                            @if ($service)
                                @foreach ($service as $value)
                                    @if ($value->section_title=='forth_title')
                                        {{ $value->data }}
                                    @endif
                                @endforeach
                            @endif
                        </h2>
                    </div>
                </div>

                <div class="tm-partners mx-auto">
                    <div>
                        @if ($post)
                            @foreach ($post as $value)
                                @if ($value->section_title=='forth_section')
                                    <img src="{{ asset('public/uploads') }}/{{ $value->image }}" alt="Partner Image" class="img-fluid">
                                @endif
                            @endforeach
                        @endif
                    </div>

                    <p class="tm-partner-text">Etiam et odio ut nibh suscipit eleifend. Sed facilisis, enim nec auctor vehicula, dolor odio venenatis turpis,
                    eu vehicula ipsum ligula a nisi. Nam vel nulla sed enim imperdiet fermentum. Mauris venenatis imperdiet
                    ex, quis rutrum orci vestibulum tristique. Ut gravida est ac risus dignissim sollicitudin. #999</p>

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
