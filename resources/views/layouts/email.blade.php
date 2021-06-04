<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            padding: 20px 0;

            background: #fbfbfb;
            font-family: Arial, sans-serif;
            color: #565656;
        }

        h1 {
            font-size: 36px;
        }

        p {
            font-size: 18px;

            line-height: 26px;
        }

        ul {
            font-size: 18px;
        }

        a {
            color: #06f;
        }

        .container {
            width: 100%;
            max-width: 700px;

            margin: 0 auto;
            padding: 0;

            background: #fff;
            border: 1px solid #e9e9e9;
        }

        .section {
            padding: 20px;
        }

        .logoSection {
            text-align: left;

            padding: 12px 20px;

            background-color: #5db849;
        }

        .myButton {
            background:linear-gradient(to bottom, #2e5e1d 5%, #7db870 100%);
            background-color: #45ad18;
            border-radius:7px;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:23px;
            font-weight:bold;
            padding:13px 39px;
            text-decoration:none;
            text-shadow:0px 4px 0px #34a322;
        }
        .myButton:hover {
            background:linear-gradient(to bottom, #71ac3e 5%, #143907 100%);
            background-color: #65a142;
        }
        .myButton:active {
            position:relative;
            top:1px;
        }

        .credentialsSection {
            text-align: center;

            padding: 0 20px;
        }

        .credentials {
            list-style: none;
            margin: 0;
            padding: 20px;
            background-color: #e9e9e9;
            color: #000;
        }

        .credentialsEmail {
            color: #000;
        }

        .listWithoutDots {
            list-style-type: none;
        }

        .footer {
            width: 100%;
            max-width: 700px;

            margin: 20px auto 0;

            padding: 0 20px;

            font-size: 11px;

            color: #999;
        }
    </style>
</head>
<body>

@yield('content')

</body>
</html>