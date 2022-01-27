<footer class="footer section pt-6 pt-md-8 pt-lg-10 pb-3 bg-puspha text-white overflow-hidden">

    <div class="pattern pattern-soft top"></div>
    <div class="container">
        <div class="row">

            <div class="col-lg-4 mb-4 mb-lg-0">
                <a class="footer-brand  d-flex" href="/">
                    <img src="{{ asset('img/logonew.png') }}" class="mr-3" alt="Pushpakamal investement pvt ltd"
                        style="height: 50px;">
                </a>
                <p class="my-4">
                    {!! setting('meta_description') !!}
                </p>
                <div class="footer-social-link">
                    <h4 class="my-3">Follow us<span class="animate-border border-black"></span></h4>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <h4 class="my-2">Quick Contact<span class="animate-border border-black"></span></h4>
                <ul class="my-4 ">

                    <li><i class="fas fa-phone-alt"></i> Phone: 9808086299, 9800888555</li>
                    <li><i class="fas fa-envelope-square"></i> Email: demo@gmail.com</li>

                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-5 mb-lg-2 ">

                <h4 class="section-heading">
                    Quick links
                    <span class="animate-border border-black"></span>
                </h4>
                <ul class="links-vertical">
                    <li><a target="_blank" href="#">Blog</a></li>
                    <li><a target="_blank" href="#">Themes</a></li>
                    <li><a target="_blank" href="#">Contact Us</a></li>
                    <li><a href="/pricing">Pricing</a></li>
                </ul>
                <h4 class="my-4">
                    Subscribe
                    <span class="animate-border border-black"></span>
                </h4>

                <p class="font-small">The latest property and its detail, sent straight to your inbox.</p>
                <form action="#">
                    <div class="form-row">
                        <div class="col-8">
                            <input type="email" class="form-control mb-2" placeholder="Email Address" required>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-block"
                                style="background-color: #e75b1e; color:white;font-size:14px"><span>Subscribe</span></button>
                        </div>
                    </div>
                </form>
                {{-- <small class="mt-2 form-text">We’ll never share your details. See our <a
                        href="{{ route('frontend.privacy') }}" class="font-weight-bold text-underline">Privacy
                        Policy</a></small> --}}
            </div>

            <div class="col-12 col-sm-6 col-lg-4">

                @include ('frontend.includes.footer-comment-area')
            </div>
        </div>

        <hr class="my-4 my-lg-5" style="color: white">


        <div class="row d-flex " style="justify-content: space-between;">
            <p class="font-small mb-0 col-14 col-sm-8 col-lg-6 ">
                Copyright &copy; {{ date('Y', time()) }} Pushpakamal Investment Pvt. Ltd.
            </p>

            <p class="font-small  col-14 col-sm-4 col-lg-3"> Powered by : Neoztech</p>
        </div>
    </div>
</footer>
