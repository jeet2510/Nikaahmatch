<div class="modal fade interest_reject_modal" id="updateMassageModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title h6">{{ translate('Complete your profile !') }}</h4>
            </div>
            <div class="modal-body">
            @if(session('message') == 'Update_profile_message')
              
                    <p class="mt-1">Your account is not yet approved by admin. Please wait for approval.</p>
                    <button type="button" class="btn btn-info mt-2 action-btn" data-dismiss="modal">{{ translate('Close') }}</button>
            @else(session('message') == 'Wait_approval_message')
                    <p class="mt-1">Your account is not yet approved by admin. Please wait for approval.</p>
                    <button type="button" class="btn btn-info mt-2 action-btn" data-dismiss="modal">{{ translate('Close') }}</button>
            @endif
                
            </div>
        </div>
    </div>
</div>