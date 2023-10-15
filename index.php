<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="public/bootstrap/bs.css" rel="stylesheet">
    <script src="public/bootstrap/bs.js" type="text/javascript"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="public/imagic-demo.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="creative-title">Title</label>
                    <input name="title" type="text" class="form-control" id="creative-title" aria-describedby="emailHelp" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="pictures">Example file input</label>
                    <input name="pictures[]" type="file" class="form-control-file" id="pictures"  multiple="multiple">
                </div>
                <hr>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
