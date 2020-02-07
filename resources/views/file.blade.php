<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <title>Laravel File Upload Tutorial Example From Scratch</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Laravel Upload File Example</div>

            <div class="card-body">
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form action="{{route('upload')}}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <label for="name">Courrier name:
                            <input name="name" type="text">
                        </label>
                        <br><br>
                        Courriers attachments (can attach more than one): <br>
                        <input multiple="multiple" name="attachments[]" type="file">
                        <br><br>
                        <input type="submit" value="Upload">
                    </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>
