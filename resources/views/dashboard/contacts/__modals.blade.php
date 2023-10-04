{{-- delete user modal --}}
<div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Message') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteContactForm" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body text-center fs-1">
                    <p class="text-bold">{{ __('Are_You_sure!') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- delete user modal --}}
<div class="modal fade" id="replayContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Replay') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="replayContactForm" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message">{{ __('Replay') }}</label>
                        <textarea name="content" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="replay_id" id="replayId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- View user modal --}}
<div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Message') }}</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body ">

                <h4 class="mb-3">{{ __('Name') }}: <span id="senderName"></span></h4>
                <p class="mb-3">{{ __('Email') }}: <span id="senderEmail"></span></p>
                <p class="mb-3">{{ __('Phone') }}: <span id="senderPhone"></span></p>
                <p class="mb-3">{{ __('Message') }}: <span id="senderMessage"></span></p>

                <hr>
                <p>Replay: <span id="replaymessage"></span> </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                @if (auth()->user()->can('replay messages'))
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#replayContactModal"
                        data-dismiss="modal">{{ __('Replay') }}</button>
                @endif
            </div>
        </div>
    </div>
</div>
