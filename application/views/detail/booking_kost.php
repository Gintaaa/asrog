<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>index.css">
    <title>Detail Booking</title>
    <style>
        /* 100E3B primary */
        /* F8C500 yellow */
        /* FA4400 orange */
        /* F2FBFF lightblue */
        .container {
            border-radius: 12px;
            border: 1px solid grey;
            width: 80%;
            min-height: 400px;
            padding: 80px;
            margin: 50px auto;
            background-color: #F2FBFF;
        }

        h1 {
            color: #100E3B;
            text-align: center;
        }

        .card {
            margin: 20px auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            color: #100E3B;
        }

        ul {
            list-style: none;
        }

        li {
            font-size: 16px;
            font-weight: 400;
        }

        p {
            text-align: center;
            margin: 30px auto;
            font-size: 24px;
        }

        .footer-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .back {
            cursor: pointer;
            background-color: #eaeaea;
            width: 190px;
            border-radius: 12px;
            margin-top: 40px;
            padding: 8px 14px;
            text-align: center;
        }

        .back a {
            font-size: 16px;
            color: #100E3B;
            text-decoration: none;
            display: block;
            width: 100%;
        }

        .btn-booking {
            color: #eaeaea;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            padding: 8px 14px;
            background-color: #100E3B;
            width: 190px;
            border-radius: 12px;
        }

        form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }

        form>div {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            margin-top: 7px;
        }

        form input {
            width: 400px;
            border-radius: 12px;
            padding: 10px;
        }



        @media screen and (max-width:800px) {
            .container {
                width: 100%;
                height: 100vh;
                padding: 10px;
            }

            h1 {
                font-size: 28px;
            }

            .card {
                margin: 5px auto;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <p>Please fill the form below</p>
        <?= form_open_multipart('Transaction/booking'); ?>
        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
        <div class="name">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $user['name']; ?>" readonly>
            <?= form_error('name', ' <small class="text-danger">', '</small>'); ?>
        </div>
        <div class="telp">
            <label for="phone">Phone</label>
            <input type="number" id="phone" name="phone" value="<?= $user['telp']; ?>" style="background-color: white;" readonly>
            <?= form_error('phone', ' <small class="text-danger">', '</small>'); ?>
        </div>
        <div class="email">
            <label for="name">Name</label>
            <input type="text" name="email" id="email" value="<?= $user['email']; ?>" readonly>
            <?= form_error('email', ' <small class="text-danger">', '</small>'); ?>
        </div>
        <div class="address">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="<?= $user['address']; ?>" readonly>
            <?= form_error('address', ' <small class="text-danger">', '</small>'); ?>
        </div>
        <div class="kost">
            <label for="kost">Kost</label>
            <input type="text" name="kost" id="kost" value="<?= $detail['location']; ?>" readonly>
            <?= form_error('kost', ' <small class="text-danger">', '</small>'); ?>
        </div>
        <div class="full_address">
            <label for="full_address">Full Address</label>
            <input type="text" name="full_address" id="full_address" value="<?= $detail['full_address']; ?>" readonly>
            <?= form_error('full_address', ' <small class="text-danger">', '</small>'); ?>
        </div>
        <div class="price">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="<?= number_format($detail['price']); ?>" readonly>
            <?= form_error('price', ' <small class="text-danger">', '</small>'); ?>
        </div>
        <div class="date">
            <label for="dateOfEntry">Date Of Entry</label>
            <input type="text" name="dateOfEntry" id="datepicker" placeholder="Date Of Entry">
            <?= form_error('dateOfEntry', ' <small class="text-danger">', '</small>'); ?>
        </div>
        <div class="picture-input">
            <label for="proof">Proof of transfer </label>
            <input type="file" name="proof" id="proof" value="proof of payment">
        </div>
        <div class="footer-card">
            <div class="chat" style="margin-top: 40px;">
                <button type="submit" class="btn-booking">Booking</button>
            </div>
            <div class="back" style="margin-top: 40px;">
                <a href="<?= base_url('home/details/'); ?><?= $detail['kode_kost']; ?>">Back</a>
            </div>
        </div>
        </form>
    </div>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
</body>

</html>