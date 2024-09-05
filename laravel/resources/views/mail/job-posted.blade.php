<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posted Successfully!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #3498db;
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }

        .title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .content {
            padding: 20px;
        }

        .cta-button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #2980b9;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
            clear: both;
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            Learning Laravel
        </div>

        <div class="content">
            <h1 class="title">Job Posted Successfully!</h1>

            <p>Congratulations, {{ $job->employer->user->first_name }}! Your Job has been posted successfully!</p>

            <a href="{{ url('/jobs/' . $job->id) }}" class="cta-button">View your Job listing</a>

            <p>Thanks,<br />
                {{ config('app.name') }}</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}</p>
            <a href="#" style="color: white;">Unsubscribe</a> |
            <a href="#" style="color: white;">Contact Us</a>
        </div>
    </div>
</body>

</html>
