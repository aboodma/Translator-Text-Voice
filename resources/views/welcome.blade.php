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
</head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<body>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <form action="" method="post" class="row" id="translate_form" role="form">
                <legend>Translate Form</legend>
                <div class="form-group col-md-6">
                     <label>From :</label>
                       <select class="form-control" id="from" name="from">
                    <option value="ar-ae">Arabic</option>
                    <option value="tr-tr">Turkish</option>
                    <option value="en-us">English</option>


                </select>
                </div>
                <div class="form-group col-md-6">
                    <label>To :</label>
                       <select class="form-control" id="to" name="to">
                    <option value="ar-ae">Arabic</option>
                    <option value="tr-tr">Turkish</option>
                    <option value="en-us">English</option>

                </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">From</label>
                    <textarea class="form-control english"  required  name="english" id="english" rows="3"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="">TO</label>
                    <textarea class="form-control arabic" disabled name="arabic" id="arabic" rows="3"></textarea>
                </div>

                 <div class="form-group col-md-6">
                 <select class="form-control voices"></select>
                 </div>
                <div class="form-group col-md-3">
                   <button type="submit" class="btn btn-primary form-control ">Translate</button>

                </div>
                 <div class="form-group col-md-3">
              <button type="button" class=" btn btn-success form-control talk">Talk <i class="fa fa-microphone"></i> </button>


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
    function trans() {
        var arabic = $("#arabic").val();
        var english = $("#english").val();
        var from = $("#from").val();
        var to = $("#to").val();
        var lang =  langc(from,to);

        $.ajax({
            url:"/translate/"+english+"/"+lang,
            type:"get",
            success:function (data) {
               $("#arabic").val(data);
                 speak(to);
            },
            error:function (err) {
                console.log(err)
            }
        })
    }
    function langc(from,to) {
     if(from === "ar-ae" && to ==="tr-tr"){
         return "ar-tr";
     }else if(from === "ar-ae" && to ==="en-us"){
                  return "ar-en";

        }else if(from === "en-us" && to ==="ar-ae"){
                  return "en-ar";

        }else if(from === "en-us" && to ==="tr-tr"){
                  return "en-tr";

        }else if(from === "tr-tr" && to ==="ar-ae"){
                  return "tr-ar";

        }else if(from === "tr-tr" && to ==="en-us"){
                  return "tr-en";

        }else{
         return "en-ar";
     }
    }
</script>
    <script src="{{asset('test.js')}}"></script>
    <script src="{{asset('speach.js')}}"></script>

<script>
    $("#translate_form").submit(function (e) {
        e.preventDefault();
        var arabic = $("#arabic").val();
        var english = $("#english").val();
        var from = $("#from").val();
        var to = $("#to").val();
        var lang =  langc(from,to);
        $.ajax({
            url:"/translate/"+english+"/"+lang,
            type:"get",
            success:function (data) {
               $("#arabic").val(data);
               speak();
            },
            error:function (err) {
                console.log(err)
            }
        })
    })

</script>
</body>
</html>
