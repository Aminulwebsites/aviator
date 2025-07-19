@extends('Layout.usergame')
@section('content')
    <div class="deposite-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="pay-tabs animated fadeInDown">
                        <a href="#" class="custom-tabs-link active">DEPOSIT</a>
                        <a href="/withdraw" class="custom-tabs-link">WITHDRAW</a>
                    </div>

                    <input type="hidden" name="username" id="username" value="">
                    <input type="hidden" name="password" id="password" value="">

                    <div class="pay-options animated fadeIn">
                        <div class="payment-cols">
                            <div class="grid-view">
                                <div class="grid-list animated zoomIn" onclick="paymentGatewayDetails('6')">
                                    <button class="btn payment-btn" data-tab="netbanking">
                                        <img src="images/app-logo/interkassa_net_banking.svg" />
                                        <div class="PaymentCard_limit">Min {{setting('min_recharge')}}</div>
                                    </button>
                                </div>
                                <div class="grid-list animated zoomIn" onclick="paymentGatewayDetails('3')">
                                    <button class="btn payment-btn" data-tab="upi">
                                        <img src="images/app-logo/upiMt.svg" />
                                        <div class="PaymentCard_limit">Min {{setting('min_recharge')}}</div>
                                    </button>
                                </div>
                            </div>
                            <div class="deposite-box" id="netbanking">
                                <div class="d-box">
                                    <div class="limit-txt">LIMITS:<span>{{setting('min_recharge')}}</span></div>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="login-controls mt-3 rounded-pill h42">
                                                <label for="Username" class="rounded-pill">
                                                    <input type="text" class="form-control text-i10 amount"
                                                        id="net_bank_amount"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                                                    <input type="hidden" id="net_bank_min_amount" value="{{setting('min_recharge')}}">
                                                    <input type="hidden" id="net_bank_max_amount" value="">
                                                    <i class="Input_currency">
                                                        INR
                                                    </i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button
                                                class="register-btn rounded-pill d-flex align-items-center w-100 mt-3 orange-shadow"
                                                onclick="deposit('6')">
                                                DEPOSIT
                                            </button>
                                        </div>
                                    </div>
                                    <div class="amount-tooltips">
                                        <button class="btn amount-tooltips-btn">200</button>
                                        <button class="btn amount-tooltips-btn">500</button>
                                        <button class="btn amount-tooltips-btn active">1000</button>
                                        <button class="btn amount-tooltips-btn">2500</button>
                                        <button class="btn amount-tooltips-btn">5000</button>
                                    </div>
                                    <label for="net_bank_amount" class="error" id="net_bank_amount-error"></label>
                                </div>
                            </div>
                            <div class="deposite-box" id="upi">
                                <div class="d-box">
                                    <div class="limit-txt">LIMITS:<span>{{setting('min_recharge')}}</span></div>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="login-controls mt-3 rounded-pill h42">
                                                <label for="Username" class="rounded-pill">
                                                    <input type="text" class="form-control text-i10 amount"
                                                        id="upi_amount"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                                                    <input type="hidden" id="upi_min_amount" value="{{setting('min_recharge')}}">
                                                    <input type="hidden" id="upi_max_amount" value="">
                                                    <i class="Input_currency">
                                                        INR
                                                    </i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button
                                                class="register-btn rounded-pill d-flex align-items-center w-100 mt-3 orange-shadow"
                                                onclick="deposit('3')">
                                                DEPOSIT
                                            </button>
                                        </div>
                                    </div>
                                    <div class="amount-tooltips">
                                        <button class="btn amount-tooltips-btn">200</button>
                                        <button class="btn amount-tooltips-btn">500</button>
                                        <button class="btn amount-tooltips-btn active">1000</button>
                                        <button class="btn amount-tooltips-btn">2500</button>
                                        <button class="btn amount-tooltips-btn">5000</button>
                                    </div>
                                    <label for="upi_amount" class="error" id="upi_amount-error"></label>
                                    <div class="deposite-blc">
                                        <div>BALANCE AFTER DEPOSITING</div>
                                        <div class="dopsite-vlue">₹ <span id="upi_amount_txt"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pay-static-form text-white fw-bold">
                        <div class="form-back d-flex align-items-center">
                            <span class="material-symbols-outlined bold-icon me-1">
                                arrow_back
                            </span>
                            BACK
                        </div>
                        
                        <div class="white-box mt-3 text-center">
                            <div class="img-box">
                                <div class="unique-qr-box">
                                    <img src="{{env('QR_CODE_LINK')}}" alt="QR Code 1">
                                </div>
                            </div>
                            
                            <a href="#" class="d-block link-text">Scan Qr Code And With Any App</a>
                            <p class="text-dark">If You Any Problem To Pay Amount Contact On WhatsApp</p>
                            <div id="account_number_tag">
                                <div class="d-flex justify-content-between flex-wrap text-dark align-items-center">
                                    <span class="text-muted" id="account_number_title">ACCOUNT NUMBER : </span>
                                    <span class="d-flex align-items-center copy_owner_details" id="copy_acc_no">
                                        <span class="material-symbols-outlined bold-icon text-muted">
                                            content_copy
                                        </span>
                                        <span id="owner_account_number"></span>
                                        <input type="hidden" id="acc_no_hide">
                                    </span>
                                </div>
                            </div>
                            <div id="mobile_number_tag">
                                <div class="d-flex justify-content-between flex-wrap text-dark align-items-center my-2 ">
                                    <span class="text-muted" id="mobile_number_title"></span>
                                    <span class="d-flex align-items-center copy_owner_details" id="copy_mobile_no">
                                        <span class="material-symbols-outlined bold-icon text-muted">
                                            content_copy
                                        </span>
                                        <span id="owner_mobile_no"></span>
                                        <input type="hidden" id="mobile_no_hide">
                                    </span>
                                </div>
                            </div>
                            <div id="name_tag">
                                <div class="d-flex justify-content-between flex-wrap text-dark align-items-center">
                                    <span class="text-muted" id="account_name_title"></span>
                                    <span class="d-flex align-items-center copy_owner_details" id="copy_name">
                                        <span class="material-symbols-outlined bold-icon text-muted">
                                            content_copy
                                        </span>
                                        <span id="owner_name"></span>
                                        <input type="hidden" id="name_hide">
                                    </span>
                                </div>
                            </div>
                            <div id="bank_name_tag">
                                <div class="d-flex justify-content-between flex-wrap text-dark align-items-center my-2">
                                    <span class="text-muted" id="bank_title">BANK NAME:</span>
                                    <span class="d-flex align-items-center copy_owner_details" id="copy_bank_name">
                                        <span class="material-symbols-outlined bold-icon text-muted">
                                            content_copy
                                        </span>
                                        <span id="owner_bank_name"></span>
                                        <input type="hidden" id="bank_name_hide">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="white-box mt-3">
                            <h5 class="text-muted f-14 fw-bold">TO BE CREDITED</h5>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="dopsite-vlue fw-bold f-20">
                                    <div>₹ <span id="select_amount"></span></div>
                                </div>
                                <button class="btn btn-transparent p-0">
                                    <span class="material-symbols-outlined bold-icon">
                                        edit
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="white-box mt-3">
                            <form action="/depositNow" method="post" id="deposit_form">
                                @csrf
                                <input type="hidden" name="amount" id="deposit_amount" value="300">
                                <input type="hidden" name="payment_gateway_type" id="payment_gateway_type">
                                <input type="hidden" name="min_deposit_amount" id="min_deposit_amount">
                                <input type="hidden" name="max_deposit_amount" id="max_deposit_amount">

                                <div class="mb-3 row" id="mobile_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="mobile_title"></label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="mobile_no">
                                                <input type="text" class="form-control text-indent-0" id="mobile_no"
                                                    name="mobile_no">
                                            </label>
                                        </div>
                                    </div>
                                    <label id="mobile_no-error" class="error" for="mobile_no"></label>
                                </div>
                                <div class="mb-3 row" id="name_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="name_title"></label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="name">
                                                <input type="text" class="form-control text-indent-0" id="name"
                                                    name="name">
                                            </label>
                                        </div>
                                    </div>
                                    <label id="name-error" class="error" for="name"></label>
                                </div>
                                <div class="mb-3 row" id="email_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="email_title"></label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="email">
                                                <input type="email" class="form-control text-indent-0" id="email"
                                                    name="email">
                                            </label>
                                        </div>
                                    </div>
                                    <label id="email-error" class="error" for="email"></label>
                                </div>
                                <div class="mb-3 row" id="trn_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="">Transaction No.</label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="trn">
                                                <input type="text" class="form-control text-indent-0" id="trn"
                                                    name="trn" required>
                                            </label>
                                        </div>
                                    </div>
                                    <label id="email-error" class="error" for="email"></label>
                                </div>
                                <div class="mb-3 row" id="cwallet_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="cwallet_title"></label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="crypto_wallet_address">
                                                <input type="text" class="form-control text-indent-0"
                                                    id="crypto_wallet_address" name="crypto_wallet_address">
                                            </label>
                                        </div>
                                    </div>
                                    <label id="crypto_wallet_address-error" class="error"
                                        for="crypto_wallet_address"></label>
                                </div>
                                <div class="mb-3 row" id="ctxt_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="ctxt_title"></label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="crypto_transaction_id">
                                                <input type="text" class="form-control text-indent-0"
                                                    id="crypto_transaction_id" name="crypto_transaction_id">
                                        </div>
                                    </div>
                                    <label id="crypto_transaction_id-error" class="error"
                                        for="crypto_transaction_id"></label>
                                </div>
                                <div class="mb-3 row" id="account_no_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="account_no_title">Account Number</label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="account_no_id">
                                                <input type="text" class="form-control text-indent-0" id="account_no"
                                                    name="account_no">
                                            </label>
                                        </div>
                                    </div>
                                    <label id="account_no-error" class="error" for="account_no"></label>
                                </div>
                                <div class="mb-3 row" id="account_holder_name_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="account_holder_name_title">Account Holder Name</label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="account_holder_name_id">
                                                <input type="text" class="form-control text-indent-0"
                                                    id="account_holder_name" name="account_holder_name">
                                            </label>
                                        </div>
                                    </div>
                                    <label id="account_holder_name-error" class="error"
                                        for="account_holder_name"></label>
                                </div>
                                <div class="mb-3 row" id="ifsc_code_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="ifsc_code_title">IFSC Code</label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="ifsc_code_id">
                                                <input type="text" class="form-control text-indent-0" id="ifsc_code"
                                                    name="ifsc_code">
                                            </label>
                                        </div>
                                    </div>
                                    <label id="ifsc_code-error" class="error" for="ifsc_code"></label>
                                </div>
                                <div class="mb-3 row" id="bank_name_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="bank_name_title">Bank Name</label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="bank_name_id">
                                                <input type="text" class="form-control text-indent-0" id="bank_name "
                                                    name="bank_name">
                                            </label>
                                        </div>
                                    </div>
                                    <label id="bank_name -error" class="error" for="bank_name"></label>
                                </div>
                                <div class="mb-3 row" id="upi_div">
                                    <label for="staticEmail" class="col-sm-4 col-5 col-form-label text-muted fw-bold"
                                        id="upi_title"></label>
                                    <div class="col-sm-8 col-7">
                                        <div class="login-controls">
                                            <label for="upi_id">
                                                <input type="text" class="form-control text-indent-0" id="upi_id"
                                                    name="upi_id">
                                            </label>
                                        </div>
                                    </div>
                                    <label id="upi_id-error" class="error" for="upi_id"></label>
                                </div>
                                <button
                                    class="register-btn rounded-pill d-flex align-items-center w-100 mt-3 orange-shadow">
                                    DEPOSIT
                                </button>
                            </form>

                        </div>
                        <!-- <div class="blues-box mt-3 text-center mb-4">
                        <iframe src='https://player.vimeo.com/video/740300187?h=7da6a3e555' height="300" width="440" frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
     <style>
     
     .img-box {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 50vh; /* Full viewport height to center vertically */
    padding: 10px; /* Space around the elements */
    box-sizing: border-box; /* Ensure padding is included in element's total width and height */
}

.unique-qr-box {
    position: relative;
    border: 2px solid transparent; /* Initial border */
    border-radius: 10px; /* Rounded corners */
    padding: 10px;
    animation: borderAnimation 2s infinite;
}

@keyframes borderAnimation {
    0% {
        border-color: transparent;
    }
    50% {
        border-color: #3498db; /* Your desired border color */
    }
    100% {
        border-color: transparent;
    }
}

.unique-qr-box img {
    display: block;
    max-width: 100%;
    height: auto;
    border-radius: 10px; /* To match the parent border radius */
}


        .deposite-container {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 40px 0;
        }
        
        .pay-tabs {
            background: #fff;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .custom-tabs-link {
            padding: 15px 30px;
            font-weight: bold;
            transition: all 0.3s ease;
            background: #007bff;
            color: #fff;
        }
        
        .custom-tabs-link.active {
            background: #007bff;
            color: #fff;
        }
        
        .pay-options {
            margin-top: 30px;
        }
        
        .grid-view {
            display: flex;
            justify-content: space-around;
        }
        
        .grid-list {
            flex: 0 0 45%;
        }
        
        .payment-btn {
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .payment-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .deposite-box {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .register-btn {
            background: #ff6b6b;
            color: #fff;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .register-btn:hover {
            background: #ff4757;
            transform: scale(1.05);
        }
        
        .amount-tooltips-btn {
            margin: 5px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        .amount-tooltips-btn:hover {
            background: #FF0000;
            color: #fff;
        }
        
        .animated {
            animation-duration: 1s;
            animation-fill-mode: both;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translate3d(0, -20px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }
        
        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale3d(0.3, 0.3, 0.3);
            }
            50% {
                opacity: 1;
            }
        }
        
        .fadeIn { animation-name: fadeIn; }
        .fadeInDown { animation-name: fadeInDown; }
        .zoomIn { animation-name: zoomIn; }
    </style>
   
      <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
        <script>
          var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"Sent Payment Proof","cornerRadius":40,"marginBottom":20,"marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"{{env('SUPPORT_WHATSAPP_NUMBER')}}","welcomeMessage":"Hello","zIndex":999999,"btnColorScheme":"light"};
          window.onload = () => {
            _waEmbed(wa_btnSetting);
          };
        </script>
      
@endsection
@section('js')
    <script src="{{ url('user/deposit.js') }}"></script>
    @isset($_GET['msg'])
    @if ($_GET['msg'] == 'Success')
        <script>
            toastr.success("Request send successfully!")
        </script>
    @endif
    @endisset
@endsection
