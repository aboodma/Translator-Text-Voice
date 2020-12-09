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
	right: 1.5rem;
	background: transparent;
	border: 0;
	font-size: 1.5rem;
}
        .shadow-lg {
	box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
}
        .rounded {
	border-radius: 1rem !important;
}
        .shadow {
	box-shadow: 0 .5rem 1rem rgba(0,0,0,.15) !important;
}
        .sp{
            padding: 0px;
margin: 0px;
        }
        .category_icon{
            width: 35px;
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
            <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center brand-centered">


                    <img src="{{asset('frontend/2tanslator.png')}}" alt="">


            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <p class="m-2">All Topics</p>
    </div>
    <div class="row">
            @foreach(\App\Category::all() as $category)
        <div class="col-6 mb-2" >
            <div class="shadow p-2 bg-white rounded ">
               <div class="row">
                   <div class="col-3">
                        <a href="{{route('single.category',$category->id)}}">
                <p class="sp"><img src="{{asset($category->icon)}}"  class="category_icon" alt="">
                   </p>
                    </a>
                   </div>
                   <div class="col-9">
                      <p style="line-break: anywhere;
font-size: 0.8rem;margin: 0;  "><a style="color:black;" href="{{route('single.category',$category->id)}}">{{$category->name}}</a></p>
                   </div>
               </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
