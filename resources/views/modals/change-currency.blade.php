<div class="modal fade" id="changeCurrency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose your currency</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="async" method="post" action="{{ route('set-base') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{ $currentUser->uuid }}">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <select name="currency" class="form-control">
                                <option disabled selected> Choose your currency</option>
                                <option {{ $currentUser->currency === 'EUR'? 'selected' : '' }} value="EUR"> &#8364; - EUR</option>
                                <option {{ $currentUser->currency === 'USD'? 'selected' : '' }} value="USD"> &#36; - USD</option>
                                <option {{ $currentUser->currency === 'ZAR'? 'selected' : '' }} value="ZAR"> &#82; - ZAR</option>
                                <option {{ $currentUser->currency === 'GIP'? 'selected' : '' }} value="GIP"> &#163; - GIP</option>
                                <option {{ $currentUser->currency === 'CAD'? 'selected' : '' }} value="CAD"> &#36; - CAD</option>
                                <option {{ $currentUser->currency === 'GBP'? 'selected' : '' }} value="GBP"> &#163; - GBP</option>
                            </select>
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