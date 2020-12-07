<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style>
        .custom-select{
            appearance: none;
            --select-border: #777;
            --select-focus: blue;
            --select-arrow: var(--select-border);
            display: grid;
            grid-template-areas: "select";
            grid-area: select;
            align-items: center;
            border-radius: 0;
        }
        .custom-select::after {
          content: "";
          width: 0.8em;
          height: 0.5em;
          background-color: var(--select-arrow);
          clip-path: polygon(100% 0%, 0 0%, 50% 100%);
          grid-area: select;
              justify-self: end;
        }
        .custom-a-area{
            border-top-left-radius: 0;
            border-top-right-radius: 0;

        }
        .disabled{
            background-color: white !important;
        }
        .disabled::placeholder{
            color:#BE1622;
        }
        .hidden{
            display: none;
        }
        .to-select{
                  color: #BE1622;
        }
        .to-select  option:first-child{
            color: #BE1622;
        }

.separator {
    display: flex;
    align-items: center;
    text-align: center;
    background-color: white;
}
.separator::before, .separator::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #000;
}
.separator::before {
    margin-right: .25em;
}
.separator::after {
    margin-left: .25em;
}
        .border-radius-custom{
            border-radius: 25px;
            padding: .25rem 1.5rem;
        }
        .btn-ci{
           border-radius: 25px;
            width: 50px;
            height: 50px;
            background-color: #BE1622;
            border: 1px solid #BE1622;
            font-size: 1.5rem;
            line-height: 0;
        }
        .separator > .btn:hover{
            background-color: transparent;
            color: black;
        }
        .underlined {
            border: 0;
            border-bottom: 1px solid #be1622;
            border-radius: 0px;
        }
        .bg-black{
                background-color: #000000 !important;
        }
        .pharse {
	position: absolute;
	bottom: 0;
	right: 2rem;
	background: transparent;
	border: 0;
	font-size: 1.5rem;
            color: black;
            margin-bottom: 1rem;
}
        .brand-centered {
            margin-left: 30%;

            }

    </style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous"/>
<body class="bg-light">
<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other
                        background context. Make it a few sentences long so folks can pick up some informative tidbits.
                        Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-black box-shadow" style="border-bottom: 1px solid #f0eeee">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center brand-centered">


                    <img src="{{asset('frontend/2tanslator.png')}}" alt="">


            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
        </div>
    </div>
</header>
<div class="container-fluid p-1">
    <div class="row pr-1 pl-1 pt-1">

        <div class="col-md-12">
            <form action="" method="post" class="row" id="translate_form" role="form">
                <div class="row">
                <div class="form-group col-md-12 mb-0">
                    <select class="form-control border-0 custom-select" id="from" name="from">
                        <option value="ar-ae">Arabic</option>
                        <option value="tr-tr">Turkish</option>
                        <option value="en-us">English</option>
                    </select>
                </div>
                <div class="form-group col-md-6 mt-0">
                        <a href="{{route('pharse.categories')}}" class="pharse"><img src="{{asset('frontend/ph.png')}}" width="70%" alt=""> </a>

                    <textarea class="form-control english border-0 custom-a-area"  required name="english" id="english"
                         placeholder="Enter Text ..."     rows="10"></textarea>
                </div>

                <div class="form-group col-md-4 mb-0">

                    <select class="form-control border-0 custom-select to-select" id="to" name="to">
                        <option value="ar-ae">Arabic</option>
                        <option value="tr-tr">Turkish</option>
                        <option value="en-us" selected>English</option>

                    </select>
                </div>
                <div class="form-group col-md-6 mb-0">

                    <textarea class="form-control arabic border-0 custom-a-area disabled" placeholder="Translation Here ..." disabled name="arabic" id="arabic" rows="10"></textarea>
                </div>
                <div class="">
                    <select class="form-control voices hidden"></select>
                </div>
                <div class="col-md-3">
                      <div class="separator">
                          <span class="btn btn-outline-dark btn-sm border-radius-custom">Speak Now</span>
                      </div>

                    </div>
                </div>
                <div class="container pt-2 pb-5 bg-white">
                <div class="row">

                    <div class="col-4">
                    <button type="submit" class=" form-control underlined">English</button>
                </div>
                     <div class="col-4 text-center">
                    <button type="button" class=" btn btn-danger  talk btn-ci"> <i
                            class="fa fa-microphone"></i></button>
                </div>
                <div class="col-4">
                    <button type="button" class=" form-control border-0 ">Turkish </button>
                </div>

                </div>
                </div>

            </form>

        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function throttle(f, delay){
    var timer = null;
    return function(){
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = window.setTimeout(function(){
            f.apply(context, args);
        },
        delay || 500);
    };
}
$("#english").keyup(throttle(function(){
    // do the search if criteria is met
    trans();
}));
    function trans() {
        var arabic = $("#arabic").val();
        var english = $("#english").val();
        var from = $("#from").val();
        var to = $("#to").val();
        var lang = langc(from, to);

        $.ajax({
            url: "translate/" + lang,
            type: "post",
            data: {"_token": "{{csrf_token()}}", "text": english},
            success: function (data) {
                $("#arabic").val(data);
                speak(to);
            },
            error: function (err) {
                console.log(err)
            }
        })
    }

    function langc(from, to) {
        if (from === "ar-ae" && to === "tr-tr") {
            return "ar-tr";
        } else if (from === "ar-ae" && to === "en-us") {
            return "ar-en";

        } else if (from === "en-us" && to === "ar-ae") {
            return "en-ar";

        } else if (from === "en-us" && to === "tr-tr") {
            return "en-tr";

        } else if (from === "tr-tr" && to === "ar-ae") {
            return "tr-ar";

        } else if (from === "tr-tr" && to === "en-us") {
            return "tr-en";

        } else {
            return "en-ar";
        }
    }
</script>

@if(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)

    <script src="{{asset('/public/mozila_voice.js')}}"></script>


@else
    <script src="{{asset('/public/test.js')}}"></script>

@endif
<script src="{{asset('/public/speach.js')}}"></script>

<script>
    $("#translate_form").submit(function (e) {
        e.preventDefault();
        var arabic = $("#arabic").val();
        var english = $("#english").val();
        var from = $("#from").val();
        var to = $("#to").val();
        var lang = langc(from, to);
        $.ajax({
            url: "translate/" + lang,
            type: "post",
            data: {"_token": "{{csrf_token()}}", "text": english},
            success: function (data) {
                $("#arabic").val(data);
                speak();
            },
            error: function (err) {
                console.log(err)
            }
        })
    })
    $(document).ready(function () {
        var canvas = document.querySelector("canvas");

// Optional frames per second argument.
        var stream = canvas.captureStream(25);
        var recordedChunks = [];

        console.log(stream);
        var options = {mimeType: "video/webm; codecs=vp9"};
        mediaRecorder = new MediaRecorder(stream, options);

        mediaRecorder.ondataavailable = handleDataAvailable;
        mediaRecorder.start();

        function handleDataAvailable(event) {
            console.log("data-available");
            if (event.data.size > 0) {
                recordedChunks.push(event.data);
                console.log(recordedChunks);
                download();
            } else {
                // ...
            }
        }

        function download() {
            var blob = new Blob(recordedChunks, {
                type: "video/webm"
            });
            var url = URL.createObjectURL(blob);
            var a = document.createElement("a");
            document.body.appendChild(a);
            a.style = "display: none";
            a.href = url;
            a.download = "test.webm";
            a.click();
            window.URL.revokeObjectURL(url);
        }

// demo: to download after 9sec
        setTimeout(event => {
            console.log("stopping");
            mediaRecorder.stop();
        }, 9000);

    });

</script>
</body>
</html>
