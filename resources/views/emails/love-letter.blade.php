<!DOCTYPE html>
<html>

<head>
    <title>Happy Valentine's Day!</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fce4ec;
            /* Pink 50 */
            color: #880e4f;
            /* Pink 900 */
            text-align: center;
            padding: 50px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 40px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #e91e63;
            /* Pink 500 */
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }

        .heart {
            font-size: 50px;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="heart">❤️</div>
        <h2>Happy Valentine's Day Anna!</h2>
        <p>
            I know we are not spending it together and we are miles apart, but I want you to know that I am thinking
            of
            you today, yesterday and tomorrow.
            <br><br>
            I think the world of you and you are a priority in my life. I adore you from head to toe, and I can't
            wait
            to be with you again.
            <br><br>
            You make me think on how to be a better man for you bi-weekly so I can see you smile more. Not because
            you
            don't smile enough but I'm just greedy for your happiness.
            <br><br>
            I am greedy for your smile, greedy for your touch, greedy for your love, greedy for your everything. I
            am
            greedy for you.
            <br><br>
            We met in a dessert shop, ironically you are the sweetest thing in my life.
            <br><br>
            I love you differently.
            <br>
        </p>
        <p>
            Love from Jorrel 🌹💐🍫
        </p>
    </div>
    <img src="{{ $message->embed(public_path('images/love.webp')) }}" alt="Special Memory"
        style="width: 150px; border-radius: 10px; margin-top: 10px;">
</body>

</html>