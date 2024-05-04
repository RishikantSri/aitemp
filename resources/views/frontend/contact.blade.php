@extends('frontend.layouts.app')
@section('content')

<!-- Hero Start -->
<div class="container-fluid pt-5 bg-primary hero-header">
    <div class="container pt-5">

        <div class="row g-5 pt-5">
            <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                <h1 class="display-4 text-white mb-4 animated slideInRight">Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-6 align-self-end text-center text-lg-end">
                <img class="img-fluid" src="{{ asset('frontend/img/hero-img.png') }}" style="max-height: 300px;">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Contact Us</div>
            <h1 class="mb-4">If You Have Any Query, Please Contact Us</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <p class="text-center mb-4"></p>
                <div class="wow fadeIn" data-wow-delay="0.3s">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul>
                        </ul>
                    </div>
                    <form id="contact-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    {{-- <input type="text" class="form-control" id="name" placeholder="Your Name"> --}}
                                    <input placeholder="Your Full Name" type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input placeholder="Your Email" type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="_/_/_/_/_/_/_/_/_/_/ -10 digits" value="{{ old('phone') }}" required>
                                    @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
                                    @if ($errors->has('subject'))
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                    @endif
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea placeholder="Message" name="message" id="message" rows="3" class="form-control" style="height: 100px">{{ old('message') }}</textarea>
                                    @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                    <label for="message">Message</label>
                                </div>
                            </div>

                            <input type="file" name="file" id="file">
                            <div class="print-file-msg"></div>

                            <div class="my-3">

                                <div class="alert alert-success print-sending-msg" style="display:none">
                                    <ul></ul>
                                </div>

                            </div>

                            <div class="my-3">

                                <div class="alert alert-success print-success-msg" style="display:none">
                                    <ul></ul>
                                </div>

                            </div>
                            <div class="col-12">
                                <button class="btn-submit btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@include('frontend.partials.home_newsletter')


@endsection

@push('scripts_footer')

<script type="text/javascript">
    $(document).ready(function() {

        function printFileMsg(msg) {
            $(".print-file-msg").html(msg);
        }

        $(".btn-submit").click(function(e) {
            e.preventDefault();

            // var _token = $("input[name='_token']").val();
            // var name = $("input[name='name']").val();
            // var email = $("input[name='email']").val();
            // var phone = $("input[name='phone']").val();
            // var subject = $("input[name='subject']").val();
            // var message = $("textarea[name='message']").val();


            var formData = new FormData();
            formData.append('_token', $("input[name='_token']").val());
            formData.append('name', $("input[name='name']").val());
            formData.append('email', $("input[name='email']").val());
            formData.append('phone', $("input[name='phone']").val());
            formData.append('subject', $("input[name='subject']").val());
            formData.append('message', $("textarea[name='message']").val());
            formData.append('file', $('#file')[0].files[0]);


            printSendingMsg('Sending Message...')
            $.ajax({
                url: "{{ route('contact-form.store') }}",
                type: 'POST',
                // data: {
                //     _token: _token,
                //     name: name,
                //     email: email,
                //     phone: phone,
                //     subject: subject,
                //     message: message
                // },

                data: formData,
                processData: false,
                contentType: false,

                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        //    alert(data.success);

                        printSuccessMsg(data.success, 3000);
                        printFileMsg(data.file_msg); // Display file upload success message
                        $('#contact-form')[0].reset();
                    } else {

                        printErrorMsg(data.error);
                        printFileMsg(data.file_msg); // Display file upload error message
                    }
                }
            });

        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');

            $(".print-success-msg").css('display', 'none');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });

            setTimeout(function() {
                $('.print-sending-msg').css('display', 'none');
                $(".print-error-msg").css('display', 'block');
            }, 2000);
        }

        function printSendingMsg(msg) {

            $(".print-sending-msg").css('display', 'block');
            $(".print-sending-msg").find("ul").html('');
            $(".print-sending-msg").find("ul").append('<li>' + msg + '</li>');
            // setTimeout(function() {
            //         $('.print-sending-msg').fadeOut('fast');
            //     }, 2);
        }

        function printSuccessMsg(msg, time) {

            $(".print-success-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'none');
            $(".print-sending-msg").css('display', 'none');

            // $.each( msg, function( key, value ) {
            $(".print-success-msg").find("ul").append('<li>' + msg + '</li>');
            $(".print-success-msg").css('display', 'block');

            setTimeout(function() {
                $('.print-success-msg').fadeOut('fast');
            }, 4000);
            $("input[name='name']").val('');
            $("input[name='email']").val('');
            $("input[name='phone']").val('');
            $("input[name='subject']").val('');
            $("textarea[name='message']").val('');
            // });
        }
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endpush