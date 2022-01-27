  <!-- Modal -->

  <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="">
              <div class="modal-header"
                  style="display: flex; flex-direction:row;justify-content: space-around;width:100%">
                  <h5 class="modal-title" id="contactModalCenterTitle"
                      style="font-size:2rem;color:#012970;font-weight:600;">Our Contacts Details </h5>
                  {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button> --}}
              </div>
              <div class="modal-body">
                  <div class="footer-social-link">

                      <h4 class="social-heading">Follow us<span class="animate-border border-black"></span></h4>

                      <ul>
                          @foreach ($companyDetails as $details)
                              @if ($details->name == 'facebook_url' && $details->val != '#')
                                  <li> <a target="_blank" href="{{ $details->val }}"> <i class="fab fa-facebook"></i>
                                          PushpaKamal investement Pvt. Ltd.
                                      </a>
                                  </li>
                              @elseif($details->name=="youtube_url"&& $details->val != '#')
                                  <li><a target="_blank" href="{{ $details->val }}"> <i class="fab fa-youtube"></i>
                                          PushpaKamal investement Pvt. Ltd.
                                      </a>
                                  </li>
                              @elseif($details->name=="twitter_url"&& $details->val != '#')
                                  <li><a target="_blank" href="{{ $details->val }}"> <i class="fab fa-twitter"></i>
                                          PushpaKamal investement Pvt. Ltd.
                                      </a>
                                  </li>
                              @elseif($details->name=="instagram_url"&& $details->val != '#')
                                  <li> <a target="_blank" href="{{ $details->val }}"> <i class="fab fa-instagram"></i>
                                          PushpaKamal investement Pvt. Ltd.
                                      </a>
                                  </li>
                              @elseif($details->name=="linkedin_url"&& $details->val != '#')
                                  <li><a target="_blank" href="{{ $details->val }}"> <i class="fab fa-linkedin"></i>
                                          PushpaKamal investement Pvt. Ltd.
                                      </a>
                                  </li>
                              @endif
                          @endforeach

                      </ul>
                  </div>

                  <h4 class="social-heading">Quick Contact<span class="animate-border border-black"></span></h4>
                  <ul class="my-4 ">
                      @foreach ($companyDetails as $details)
                          @if ($details->name == 'phone' && $details->val != '0')
                              <li><i class="fas fa-phone-alt"></i> Phone: <a href="tel:{{$details->val}}">{{$details->val}}</a>
                              @elseif($details->name == 'mobile'&& $details->val != '0')
                              <li><i class="fas fa-mobile"></i> Mobile: <a href="tel:{{$details->val}}">{{$details->val}}</a> </li>
                          @elseif($details->name=="email")
                              <li><i class="fas fa-envelope-square"></i> <a href="mailto:{{$details->val}}">Email:
                                {{$details->val}}</a> </li>
                          @endif
                      @endforeach
                  </ul>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
          </div>
      </div>
  </div>
