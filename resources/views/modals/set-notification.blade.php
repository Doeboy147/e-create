<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set threshold</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="async" method="post" action="{{ route('set-notification') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{ $currentUser->uuid }}">
                    <div class="form-group row">
                        <div class="col-md-4 mb-3">
                            <label>Currency</label>
                            <select name="currency" class="form-control">
                            <option disabled selected> Choose currency</option>
                            <option {{ $currentUser->currency === 'EUR'? 'disabled' : '' }} value="EUR"> &#8364; - EUR</option>
                            <option {{ $currentUser->currency === 'USD'? 'disabled' : '' }} value="USD"> &#36; - USD</option>
                            <option {{ $currentUser->currency === 'ZAR'? 'disabled' : '' }} value="ZAR"> &#82; - ZAR</option>
                            <option {{ $currentUser->currency === 'GIP'? 'disabled' : '' }} value="GIP"> &#163; - GIP</option>
                            <option {{ $currentUser->currency === 'CAD'? 'disabled' : '' }} value="CAD"> &#36; - CAD</option>
                            <option {{ $currentUser->currency === 'GBP'? 'disabled' : '' }} value="GBP"> &#163; - GBP</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label> Greater or less</label>
                            <select name="symbol" class="form-control">
                                <option disabled selected> Select symbol</option>
                                <option value="<"> Less than - {{ $currentUser->currency }} </option>
                                <option value=">"> Greater than - {{ $currentUser->currency }} </option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label> Value</label>
                            <input type="text" placeholder="amount" name="amount" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>