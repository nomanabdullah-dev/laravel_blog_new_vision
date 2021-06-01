@extends('master')
@section('content')
@if ($contact)
    @foreach ($contact as $value)
        @if ($value->section_title=='banner_image')
            <style>
                .tm-contact-bg{
                    background-image: url({{ asset('public/uploads') }}/{{ $value->data }});
                }
            </style>
        @endif
    @endforeach
@endif

        <div class="row">
            <div class="col-12">
                <div class="tm-main-bg tm-contact-bg"></div>
            </div>
        </div>

        <!-- Main -->
        <main>
            <!-- Welcome section -->
            <section class="tm-welcome">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-section-header tm-header-floating">
                            @if ($contact)
                                @foreach ($contact as $value)
                                    @if ($value->section_title=='second_title')
                                        {{ $value->data }}
                                    @endif
                                @endforeach
                            @endif
                        </h2>
                    </div>
                </div>

                <div class="row tm-welcome-row">
                    <div class="col-lg-6 mb-5 tm-contact-box">
                      <div class="tm-contact-form-wrap">
                        <form id="contact-form" action="{{ route('contact.store') }}" method="post" class="tm-contact-form">
                            @csrf
                            <div class="form-group">
                              <input type="text" id="contact_name" name="contact_name" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Your Name" required="" />
                            </div>
                            <div class="form-group">
                              <input type="email" id="contact_email" name="contact_email" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Your Email" required="" />
                            </div>

                            <div class="form-group">
                              <textarea rows="4" id="contact_message" name="contact_message" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Message..." required=""></textarea>
                            </div>

                            <div class="form-group mb-0">
                              <button type="submit" class="btn rounded-0 d-block ml-auto tm-btn-primary">
                                Send It Now
                              </button>
                            </div>
                          </form>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-5 tm-contact-box">
                      <div class="tm-double-border-1 tm-border-gray">
                        <div class="tm-double-border-2 tm-border-gray tm-box-pad">
                            <p class="mb-4">
                              <a rel="nofollow" target="_parent" href="https://templatemo.com/tm-542-new-vision">New Vision</a> HTML Template is free to download instantly from TemplateMo website. In dapibus dui vitae urna fringilla volupat.
                            </p>
                            <p class="mb-3">
                              120-240 Rio de Janeiro - State of Rio de Janeiro, Brazil
                            </p>
                            <p class="mb-1">Tel: <a href="tel:0900100910" class="tm-link">090-010-0910</a></p>
                            <p>Email: <a href="mailto:info@company.com" class="tm-link">info@company.com</a></p>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="row pb-5">
                  <div class="mapouter">
                      <div class="gmap_canvas">
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
                          <iframe width="100%" height="440" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.038046140735!2d90.41879271484639!3d23.781659484573986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a4242da45d%3A0xb55c5dc6f3d887ca!2sAkbar%20Manjil!5e0!3m2!1sen!2sbd!4v1622454742284!5m2!1sen!2sbd" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>


                      </div>
                  </div>
                </div>
                <div class="row pt-5 pb-5 mb-5">
                    @if ($post)
                        @foreach ($post as $value)
                            @if ($value->section_title=='forth_section')
                                <div class="col-md-6 tm-contact-l">
                                    <h3 class="tm-article-title tm-color-primary">{!! $value->title !!}</h3>
                                    <p class="mb-4">{!! $value->description !!}</p>
                                </div>
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
