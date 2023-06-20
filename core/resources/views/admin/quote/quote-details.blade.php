<!-- Details Modal -->
<div class="modal fade" id="detailsModal{{$quote->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">Name:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->name)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">Email:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->email)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">Gender:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->gender)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">House Address:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->haddress)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">Year of Birth:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->yearob)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">LGA:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->lga)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">Ward:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->ward)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">Polling Unit:</strong>
                </div>
                <?php $pu = \DB::table('mydatas') ->where('pucode',$quote->pu)->value('puname'); ?>
                <div class="col-lg-8">{{convertUtf8($pu)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">Occupation:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->occup)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong style="text-transform: capitalize;">Education Level:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($quote->edulevel)}}</div>
            </div>
            <hr>

        

          <div class="row">
            <div class="col-lg-4">
              <strong>Verification:</strong>
            </div>
            <div class="col-lg-8">
              @if ($quote->verified != "Yes")
                <span class="badge badge-warning">Pending</span>
             
              @else
                <span class="badge badge-success">Verified</span>
              @endif
            </div>
          </div>
          <hr>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
