<!DOCTYPE html>
<html>
<head>
    <title>Exécution du test</title>
    <script type='text/javascript'>
        setTimeout(function(){self.location.href="index.php?action=resultDetails&id_result=-1"},4000)
    </script>
    <style>
        .loader{
            cursor: wait;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content:  center;
            flex-wrap: wrap;
        }
        .loader h1{
            background: none;
            border: none;
            color: #ff7575;
            font-size: 22px;
            font-family: "Open Sans",sans-serif;
            font-variant: small-caps;
            font-weight: 700;
            width: max-content ;
            margin-top: 40vh;
            transform: translateY(-50%);
        }
        .gif{
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .message{
            margin-bottom: 30px;
            width: 100%;
            display: flex;
            justify-content: center;

        }
    </style>
</head>

<body>
<div class="loader">
    <div class="message">
        <h1>Veuillez patientez pendant l'éxécution du test.</h1>
    </div>
    <div class="gif">
    <img src="public/images/loading.gif" width="50px">
    </div>

</div>
</body>
</html>