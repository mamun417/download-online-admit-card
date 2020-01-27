@extends('client_auth.layouts.app')

@section('custom-meta')
    <title>Register - ExonHost</title>

    <style>
        .auth-wrapper .auth-box{
            max-width: 800px!important;
        }
    </style>

@endsection

@section('content')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../../assets/images/big/auth-bg.jpg) no-repeat center center;">
        <div class="auth-box">
            <div>
            <div class="logo">
                <span class="db">
                    <img src="{{ url('assets/images/logo_dark.png') }}" alt="Logo" />
                </span>
                <h5 class="font-medium m-t-15">Register an Account</h5>

                <p>Already registered with us? <a href="{{ route('login') }}">Login</a> or <a href="{{ route('password.request') }}">Reset Password</a></p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('register') }}" method="post" class="form-horizontal">
                                @csrf

                                {{--Start Personal Information--}}
                                <h5 class="card-title">Personal Information</h5>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="firstname" value="{{ old('firstname') }}" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="First Name" required>

                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="lastname" value="{{ old('lastname') }}" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Last Name" required>

                                            @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            <input name="phone" id="phone" value="{{ old('phone') }}" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" required>

                                            @error('phone')
                                            <span class="text-danger" style="font-size: 80%">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                {{--End Personal Information--}}

                                {{--Start Billing Address--}}
                                <h5 class="card-title mt-4">Billing Address</h5>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="company_name" value="{{ old('company_name') }}" type="text" class="form-control" placeholder="Company Name (Optional)">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="street_address" value="{{ old('street_address') }}" type="text" class="form-control @error('street_address') is-invalid @enderror" placeholder="Street Address" required>

                                            @error('street_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="street_address2" value="{{ old('street_address2') }}" type="text" class="form-control" placeholder="Street Address 2">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="city" value="{{ old('city') }}" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" required>

                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="state" id="state-name" value="{{ old('state') }}" type="text" class="form-control @error('state') is-invalid @enderror" placeholder="State" required>

                                            <select id="state-list" class="form-control @error('state') is-invalid @enderror hidden">

                                            </select>

                                            @error('state')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="postcode" value="{{ old('postcode') }}" type="text" class="form-control @error('postcode') is-invalid @enderror" placeholder="Postcode" required>

                                            @error('postcode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="country" id="country" class="form-control @error('country') is-invalid @enderror" required>
                                               @foreach($countries as $item)
                                                    <option value="{{ $item['code'] }}" {{ $item['code'] == 'BD'?'selected':'' }}>{{ $item['name'] }}</option>
                                               @endforeach
                                            </select>

                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="vat_number" value="{{ old('vat_number') }}" type="text" class="form-control" placeholder="Vat Number (Optional)" aria-invalid="false">
                                        </div>
                                    </div>

                                </div>
                                {{--End Billing Address--}}

                                {{--Start Additional Required Information--}}
                                <h5 class="card-title mt-4">Additional Required Information</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="currency" class="form-control @error('currency') is-invalid @enderror" required>
                                                @foreach($currencies as $currency)
                                                    <option value="{{ $currency->id }}" {{ old('currency') == $currency->id?'selected':''}}>{{ $currency->code }}</option>
                                                @endforeach
                                            </select>

                                            @error('currency')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{--End Additional Required Information--}}

                                {{--Start Account Security--}}
                                <h5 class="card-title mt-4">Account Security</h5>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <input name="password" type="password" class="form-control invalid-field @error('password') is-invalid @enderror" placeholder="Password" required data-validation-required-message="This field is required" minlength="8">
                                            </div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                       </div>


                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input name="password_confirmation" type="password" class="form-control invalid-field" placeholder="Confirm Password" data-validation-match-match="password">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{--End Account Security--}}

                                <div class="p-15 pl-0">
                                    <h4>Join our mailing list</h4>
                                    <p>We would like to send you occasional news, information and special offers by email. To join our mailing list, simply tick the box below. You can unsubscribe at any time.</p>
                                </div>

                                <div class="mb-4">
                                    <div class="col-sm-5 register_switch_section">
                                        <!--suppress CssInvalidPropertyValue -->
                                        <span style="vertical-align: -webkit-baseline-middle">Receive Emails:</span>
                                        <div class="bt-switch float-right">
                                            <input name="marketingoptin" value=true type="checkbox" checked data-on-color="success" data-size="small" data-on-text="YES" data-off-text="NO"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row m-b-0">
                                    <div class="col-sm-12">
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-checkbox">
                                                <input name="agree" value="1" {{ old('agree')?'checked':'' }} type="checkbox" class="custom-control-input" id="customCheck2" required>
                                                <label class="custom-control-label" for="customCheck2">I have read and agree to the <a href="http://www.exonhost.com/tos.html" target="_blank">Terms of Service</a></label>

                                                <br>
                                                @error('agree')
                                                    <span class="text-danger" style="font-size: 80%">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light float-right">Register</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('custom-js')

    {{--Form validation (password)--}}
    <script>
        ! function(window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);
    </script>

    <script>

        function telInit(country_code) {
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                initialCountry: country_code,
                separateDialCode: true,
                utilsScript: "{{ asset('extra-plugin/tel-plugin/js/utils.js') }}",
            });
        }

        //Initialize Telephone Plugin
        telInit('BD');

        //Set Country State and Telephone Code
        $("#country").change(function() {
            var code = $(this).children(":selected").attr("value");

            $.get('{{ route('getCountryData') }}', {code:code}, function (data) {
                if (data.states != null){

                    $('#state-name').addClass('hidden');
                    $('#state-list').removeClass('hidden');

                    var states = '<option value="">----</option>';
                    $.each(data.states, function(key, state) {
                        states += '<option value='+state.code+'>'+state.name+'</option>';
                    });

                    $('#state-list').attr('name', 'state');
                    $('#state-list').html(states);

                } else {
                    $('#state-name').removeClass('hidden');
                    $('#state-list').addClass('hidden');
                    $('#state-list').attr('name', '');
                }
            });

            //Set Calling code and Flag
            $('.iti__flag').addClass('hidden');
            $('.iti__selected-dial-code').addClass('hidden');
            $('.iti__flag-container').addClass('hidden');
            telInit(code);
        });

        /*Switch button*/
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        var radioswitch = function() {
            var bt = function() {
                $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioState")
                }), $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                }), $(".radio-switch").on("switch-change", function() {
                    $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                })
            };
            return {
                init: function() {
                    bt()
                }
            }
        }();
        $(document).ready(function() {
            radioswitch.init()
        });
    </script>
@endsection
