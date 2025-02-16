
<div class="content-wrapper p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if( isset($type) && $type == 1)
                    <h4 class="text-primary"> The Company <strong><i>{{ $manager->comp_name }}</i></strong>
                        sent a payment request</h4>
                    <span class="text-muted"> at {{ $not_created_at}}</span>
                    <fieldset class="border p-2 border-success">
                        <legend class="w-auto lead text-primary">Payment Details</legend>
                        <div>
                            <label for="mangerName">Manager Name :</label>
                            <h3 class="lead d-inline" id="mangerName">{{ $manager->man_comp_name }}</h3>
                        </div>
                        <div>
                            <label for="companyName">Company Name :</label>
                            <h3 class="lead d-inline" id="companyName">{{ $manager->comp_name }}</h3>
                        </div>
                        <div>
                            <label for="companyType">Company Type :</label>
                            <h3 class="lead d-inline" id="companyType">Special</h3>
                        </div>
                        <div>
                            <label for="requestDate">Request Date :</label>
                            <h3 class="lead d-inline" id="requestDate">{{ $not_created_at }}</h3>
                        </div>
                        <div>
                            <label for="requestStatus">Request Status:</label>
                            <h3 class="lead d-inline" id="requestDate"><span
                                    class="badge-pill {{ $state == 1 ? 'badge-warning' : ($state == 2 ? 'badge-success' : 'badge-danger') }} text-white font-weight-bolder">{{ $state == 1 ? 'Pending' : ($state == 2 ? 'Accepted' : 'Rejected') }}</span>
                            </h3>
                        </div>
                        <div>
                            <label for="requestStatus">Request Notes:</label>
                            <p class="lead d-inline" id="requestStatus">{{ $notes }}</p>
                        </div>
                        <div>
                            <label for="amount">Payment Amount :</label>
                            <h3 class="d-inline font-weight-bolder " id="amount">{{ $amount }}</h3>
                            @if( $state == 2)
                                <label for="amount">Last Payment Update :</label>
                                <h3 class="d-inline font-weight-bolder " id="amount">{{ $payment_amount }}</h3>
                            @endif
                            @if( $state == 1)
                                <span><button id="showhide" class="btn btn-link">Edit</button></span>
                                <div>

                                    <form action="" id="paymentProcessForm">
                                        <input type="text" id="content" class="form-control" name="payment_edit"
                                               value="{{ $amount }}" style="display: none">
                                        <p class="text-danger" id="errorAmount"></p>
                                        <input type="hidden" value="{{ $payment_id }}" name="payment_id">
                                        <input type="hidden" name="notification" id="notification" value="{{ $notification }}">
                                        <button class="btn btn-primary mt-2" type="submit">Accept Request
                                        </button>
                                    </form>
                                    <form action="" id="paymentRejectProcessForm">
                                        <input type="hidden" id="payment" value="{{ $payment_id }}" name="payment">
                                        <input type="hidden" id="notification" value="{{ $notification }}">
                                        <button class="btn btn-danger mt-2 d-inline" type="submit">Reject
                                            Request
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>

                    </fieldset>
                @else
                    <h4 class="text-primary"> The Company <strong><i>{{ $company->comp_name }}</i></strong>
                        sent a payment request</h4>
                    <span class="text-muted"> at {{ $not_created_at}}</span>
                    <div class="row">
                        <div class="col-sm-12 col-lg-10">
                            <fieldset class="border p-2 border-success">
                                <legend class="w-auto lead text-primary">Payment Details</legend>
                                <div>
                                    <label for="mangerName">Manager Name :</label>
                                    <h3 class="lead d-inline" id="mangerName">{{ $manager->name }}</h3>
                                </div>
                                <div>
                                    <label for="companyName">Company Name :</label>
                                    <h3 class="lead d-inline" id="companyName">{{ $company->comp_name }}</h3>
                                </div>
                                <div>
                                    <label for="companyType">Company Type :</label>
                                    <h3 class="lead d-inline" id="companyType">Limited</h3>
                                </div>
                                <div>
                                    <label for="requestDate">Request Date :</label>
                                    <h3 class="lead d-inline" id="requestDate">{{ $not_created_at }}</h3>
                                </div>
                                <div>
                                    <label for="requestStatus">Request Status:</label>
                                    <h3 class="lead d-inline" id="requestDate"><span
                                            class="badge-pill {{ $state == 1 ? 'badge-warning' : ($state == 2 ? 'badge-success' : 'badge-danger') }} text-white font-weight-bolder">{{ $state == 1 ? 'Pending' : ($state == 2 ? 'Accepted' : 'Rejected') }}</span>
                                    </h3>
                                </div>
                                <div>
                                    <label for="requestStatus">Request Notes:</label>
                                    <p class="lead d-inline" id="requestStatus">{{ $notes }}</p>
                                </div>
                                <div>
                                    <label for="amount">Payment Amount :</label>
                                    <h3 class="d-inline font-weight-bolder text-info" id="amount">{{ $amount }}</h3>
                                    @if( $state == 2)
                                        <div>
                                            <label for="amount">Last Payment Update :</label>
                                            <h3 class="d-inline font-weight-bolder text-success "
                                                id="amount">{{ $payment_amount }}</h3>
                                        </div>

                                    @endif
                                    @if( $state == 1)
                                        <span><button id="showhide" class="btn btn-link">Edit</button></span>
                                        <div>

                                            <form action="" id="paymentProcessForm">
                                                <input type="text" id="content" class="form-control" name="payment_edit"
                                                       value="{{ $amount }}" style="display: none">
                                                <p class="text-danger" id="errorAmount"></p>
                                                <input type="hidden" value="{{ $payment_id }}" name="payment_id">
                                                <input type="hidden" id="notification" value="{{ $notification }}">
                                                <button class="btn btn-primary mt-2" type="submit">Accept Request
                                                </button>
                                            </form>
                                            <form action="" id="paymentRejectProcessForm">
                                                <input type="hidden" id="payment" value="{{ $payment_id }}" name="payment">
                                                <input type="hidden" id="notification" value="{{ $notification }}">
                                                <button class="btn btn-danger mt-2 d-inline" type="submit">Reject
                                                    Request
                                                </button>
                                            </form>
                                        </div>
                                </div>
                            @endif
                            </fieldset>
                        </div>
                    </div>
            </div>
            @endif
        </div>
    </div>
</div>
<script src="{{ asset('js/accountant/paymentPartialViewRequests.js') }}"></script>
