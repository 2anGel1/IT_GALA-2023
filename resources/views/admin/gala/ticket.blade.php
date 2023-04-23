<html>

<head>
    <style>
        main {
            display: flex;
            justify-content: center;
        }

        .ticket {
            width: 100%;
            height: 450px;
            display: inline-block;
            background-color: #000;
            color: #fff;
            border-radius: 10px;
            background-image: url(ticket.png);
            background-size: cover;
            position: relative;
            padding:
        }

        .ticket-owner {
            margin: 210px 260px 0px 40px;
        }

        .owner-name {
            font-size: 37px;
            text-align: center;
            margin-bottom: 15px;
            font-style: italic;
        }

        .ticket-code {
            text-align: center;
            font-size: 18px
        }

        .ticket-qrcode {
            margin-left: 350px;
            height: 130px;
            width: 130px;
            position: absolute;
            bottom: 15px;
            border: 4px solid rgb(182 141 50);
        }

        .ticket-qrcode img {
            height: 130px;
        }
    </style>
</head>

<body>
    <main>
        <div class="ticket">

            <div class="ticket-owner">
                <div class="owner-name">
                    {{ucfirst($nom)}} {{ucwords($prenom)}}
                </div>
                <div class="ticket-code">
                    N°{{ $identifiant }}
                </div>
            </div>

            <div class="ticket-qrcode">
                <img src="data:image/png;base64, {!! $qr_code !!}">
            </div>
    </main>
</body>

</html>
