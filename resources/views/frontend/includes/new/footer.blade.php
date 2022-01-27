@include('frontend.includes.contacts')

<!-- Footer -->
<footer id="aa-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-footer-area">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="aa-footer-left">
                                <p> &copy; {{ app_name() }} {{ date('Y', time()) }}
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="aa-footer-middle">
                                <a href="#" data-toggle="modal" class="contact-id"><i class="fab fa-facebook"></i></a>
                                <a href="#" data-toggle="modal" class="contact-id"> <i class="fas fa-phone-alt"></i></a>
                                <a href="#" data-toggle="modal" class="contact-id"> <i
                                        class="fas fa-envelope-square"></i> </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="aa-footer-right">
                                <a href="/">Home</a>
                                <a href="/sale">Buy</a>
                                <a href="/rent">Rent</a>
                                <a href="/properties">Properties</a>
                                <a href="/about-us">About-us</a>
                                <a href="/pricing">Pricing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->
@push('after-scripts')
    <script>
        $(".contact-id").click(function() {
            $('#contactModal').modal('show');
        });
    </script>
@endpush
