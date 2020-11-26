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
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" id="translate_form" role="form">
                <legend>Translate Form</legend>

                <div class="form-group">
                    <label for="">English</label>
                    <textarea class="form-control english"  required  name="english" id="english" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Arabic</label>
                    <textarea class="form-control" disabled name="arabic" id="arabic" rows="3"></textarea>
                </div>


                <button type="submit" class="btn btn-primary">Translate</button>
            </form>
            <button class="talk">Talk</button>
            <h1 class="content"></h1>
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
        console.log(arabic,english);
        $.ajax({
            url:"/translate/"+english,
            type:"get",
            success:function (data) {
               $("#arabic").val(data);
            },
            error:function (err) {
                console.log(err)
            }
        })
    }
</script>
    <script src="{{asset('test.js')}}"></script>
<script>
    $("#translate_form").submit(function (e) {
        e.preventDefault();
        var arabic = $("#arabic").val();
        var english = $("#english").val();
        console.log(arabic,english);
        $.ajax({
            url:"/translate/"+english,
            type:"get",
            success:function (data) {
               $("#arabic").val(data);
            },
            error:function (err) {
                console.log(err)
            }
        })
    })

</script>
</body>
</html>
