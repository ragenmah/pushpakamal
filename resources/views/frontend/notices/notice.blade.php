  <!-- PopUp -->
  @push('after-styles')
      <style>
        .modal-body img {
        height: 500px;
        width: 100%;
        }
        .modal-header-style{
            display: flex;
            flex-direction:row;
            justify-content: space-around;
            width:100%
        }

        .modal-title-style{
            font-size:1.5rem;
            color:#012970;
            font-weight:600;
        }
      </style>
  @endpush
  @if ($notices->count() > 0)
      <!-- Modal -->
      <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content" >
                  <div class="modal-header modal-header-style">
                      <h5 class="modal-title modal-title-style" id="exampleModalCenterTitle" >{{ $notices[0]->title }} </h5>
                      {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>

                      </button> --}}
                  </div>
                  <div class="modal-body">
                      {!! html_entity_decode($notices[0]->body) !!}
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                  </div>
              </div>
          </div>
      </div>
  @endif
  @push('after-scripts')
    <script>
      
        $('.modal-body img').removeAttr('style');

    </script>
  @endpush