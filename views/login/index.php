</div>
<!-- /* *-----------------------table---------------------- */ -->
<head>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
        }

        a {
            margin: 0px;
            transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
        }

        a:focus {
            outline: none !important;
        }

        a:hover {
            text-decoration: none;
        }

        /* ------------------------------------ */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0px;
        }

        p {
            margin: 0px;
        }

        ul,
        li {
            margin: 0px;
            list-style-type: none;
        }

        /* ------------------------------------ */
        input {
            display: block;
            outline: none;
            border: none !important;
        }

        textarea {
            display: block;
            outline: none;
        }

        textarea:focus,
        input:focus {
            border-color: transparent !important;
        }

        /* ------------------------------------ */
        button {
            outline: none !important;
            border: none;
            background: transparent;
        }

        button:hover {
            cursor: pointer;
        }

        iframe {
            border: none !important;
        }

        [ Table]*/ .limiter {
            margin: 0 auto;
        }

        .container-table100 {
            min-height: 100%;
            /* background: #c850c0; */
            /* background: -webkit-linear-gradient(45deg, #4158d0, #c850c0);
            background: -o-linear-gradient(45deg, #4158d0, #c850c0);
            background: -moz-linear-gradient(45deg, #4158d0, #c850c0);
            background: linear-gradient(45deg, #4158d0, #c850c0); */
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding: 33px 30px;
        }

        .wrap-table100 {
            width: 100%;
        }

        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }

        table * {
            position: relative;
        }

        table td,
        table th {
            padding-left: 8px;
        }

        table thead tr {
            height: 60px;
            background: #36304a;
        }

        table tbody tr {
            height: 50px;
        }

        table tbody tr:last-child {
            border: 0;
        }

        table td,
        table th {
            text-align: left;
        }

        table td.l,
        table th.l {
            text-align: right;
        }

        table td.c,
        table th.c {
            text-align: center;
        }

        table td.r,
        table th.r {
            text-align: center;
        }

        .table100-head th {
            font-size: 18px;
            color: #fff;
            line-height: 1.2;
            font-weight: unset;
        }

        tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tbody tr {
            font-size: 15px;
            color: #808080;
            line-height: 1.2;
            font-weight: unset;
        }

        tbody tr:hover {
            color: #555555;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .column1 {
            text-align: center;
            padding-left: 40px;
        }

        .column2 {
            text-align: center;
        }

        .column3 {
            text-align: center;
        }

        .column4 {
            text-align: center;
        }

        .column5 {
            text-align: center;
        }

        .column6 {
            text-align: center;
        }

        .column7 {
            text-align: center;
        }

        .column8 {
            text-align: center;
        }

        .column9 {
            text-align: center;
        }

        .column10 {
            text-align: center;
        }

        @media screen and (max-width: 992px) {
            table {
                display: block;
            }

            table>*,
            table tr,
            table td,
            table th {
                display: block;
            }

            table thead {
                display: none;
            }

            table tbody tr {
                height: auto;
                padding: 37px 0;
            }

            table tbody tr td {
                padding-left: 40% !important;
                margin-bottom: 24px;
            }

            table tbody tr td:last-child {
                margin-bottom: 0;
            }

            table tbody tr td:before {
                font-size: 14px;
                color: #999999;
                line-height: 1.2;
                font-weight: unset;
                position: absolute;
                left: 30px;
                top: 0;
            }

            table tbody tr td:nth-child(1):before {
                content: "id";
            }

            table tbody tr td:nth-child(2):before {
                content: "firstname";
            }

            table tbody tr td:nth-child(3):before {
                content: "lastname";
            }

            table tbody tr td:nth-child(4):before {
                content: "username";
            }

            table tbody tr td:nth-child(5):before {
                content: "password";
            }

            table tbody tr td:nth-child(6):before {
                content: "email";
            }

            table tbody tr td:nth-child(7):before {
                content: "status";
            }

            table tbody tr td:nth-child(8):before {
                content: "last login ip";
            }

            table tbody tr td:nth-child(9):before {
                content: "last login date";
            }

            tbody tr {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .container-table100 {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>
</head>

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100" id="user">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Id</th>
                            <th class="column2">Firstname</th>
                            <th class="column3">Lastname</th>
                            <th class="column4">Username</th>
                            <th class="column5">Password</th>
                            <th class="column6">Email</th>
                            <th class="column8">Last login</th>
                            <th class="column9">last ip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo " <tr>
                            <td class=\"column1\">$id</td>
                            <td class=\"column2\">$firstname</td>
                            <td class=\"column3\">$lastname</td>
                            <td class=\"column4\">$username</td>
                            <td class=\"column5\">$password</td>
                            <td class=\"column6\">$email</td>
                            <td class=\"column8\">$lastlogin</td>
                            <td class=\"column9\">$lastloginip</td>
                        </tr> ";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>