<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .invoice-box {
            max-width: 800px;
            margin-bottom: 100px;
            padding: 10px;
            border: 1px solid #000000;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
        }
        .invoice{
            text-align: center;
        }
        .invoice .name{
            font-size: 30px;
            font-weight: bold;
            color:#341f97;
            line-height: 1px;
            margin-bottom: 0px;
        }
         .invoice .address{
             margin-top: 0;
            font-size: 10px;
         }

         .cod , .contact{
             padding-top: 5px;
             text-align: center;
             text-decoration: underline;
         }
         .info td{
             padding-top: 5px;
         }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td class="invoice"  colspan="5">
                <p class="name">Korean Shop Bangladesh</p>
                <p class="address">House no : 159 , 6th floor sunil para ,Vashantek, Dhaka- 1206</p>
            </td>
        </tr>
        <tr>
            <td  ></td>
            <td class="contact" colspan="2">Contact: 01759588464</td>
            <td style="text-align: center" colspan="2">Date: @php echo  date(" M  d, Y") @endphp</td>
        </tr>

        <tr class="info">
            <td colspan="5">Name: Abdullah zahid</td>
        </tr>
        <tr class="info">
            <td colspan="5">Address:  145/3-1, matikhata dhaka cantonment dhaka-1206</td>
        </tr>
        <tr class="info">
            <td colspan="5">Contact no: 01780134797</td>
        </tr>
        <tr class="info">
            <td colspan="5">Product: Cosrx nail essence+ green tea cleansing foam , Cosrx nail essence+ green tea cleansing foam</td>
        </tr>
        <tr class="info">
            <td >Price: 250000 tk</td>
            <td >D charge:15000 tk</td>
            <td >T Price: 265000tk</td>
            <td style="text-align: center">Paid: No</td>
        </tr>

        <tr>
            <td class="cod" colspan="5">
                Cash on delivery
            </td>
        </tr>

    </table>

</div>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td class="invoice"  colspan="5">
                <p class="name">Korean Shop Bangladesh</p>
                <p class="address">House no : 159 , 6th floor sunil para ,Vashantek, Dhaka- 1206</p>
            </td>
        </tr>
        <tr>
            <td  ></td>
            <td class="contact" colspan="2">Contact: 01759588464</td>
            <td style="text-align: center" colspan="2">Date: @php echo  date(" M  d, Y") @endphp</td>
        </tr>

        <tr class="info">
            <td colspan="5">Name: Abdullah zahid</td>
        </tr>
        <tr class="info">
            <td colspan="5">Address:  145/3-1, matikhata dhaka cantonment dhaka-1206</td>
        </tr>
        <tr class="info">
            <td colspan="5">Contact no: 01780134797</td>
        </tr>
        <tr class="info">
            <td colspan="5">Product: Cosrx nail essence+ green tea cleansing foam , Cosrx nail essence+ green tea cleansing foam</td>
        </tr>
        <tr class="info">
            <td >Price: 2500 tk</td>
            <td >D charge:150 tk</td>
            <td colspan="2">T Price: 265000tk</td>
            <td >Paid: No</td>
        </tr>
        <tr>
            <td class="cod" colspan="5">
                Cash on delivery
            </td>
        </tr>
    </table>
</div>

</body>
</html>
