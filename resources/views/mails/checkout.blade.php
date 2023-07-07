<html>

<head>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
    <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;background:#e9e9e9;padding:50px 0px">
        <tr>
            <td>
                <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;background:#ffffff;padding:0px 25px">
                    <tbody>
                        <tr>
                            <td style="margin:0;padding:0">
                                <table border="0" cellpadding="20" cellspacing="0" width="100%" style="background:#ffffff;color:#1a1a1a;line-height:150%;text-align:center;border-bottom:1px solid #e9e9e9;font-family:300 14px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif">
                                    <tbody>
                                        <tr>
                                            <td valign="top" align="center" width="100" style="background-color:#ffffff">
                                                <img alt="Riders" style="width:134px" src="https://riders.logicssolution.site/frontend/images/logo.png">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <br>
                                <table border="0" cellpadding="20" cellspacing="0" width="100%" style="color:#000000;line-height:150%;text-align:left;font:300 16px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif">
                                    <tbody>
                                        <tr>
                                            <td valign="top" style="font-size:24px;">
                                                <span style="text-decoration:underline;">Order No: #{{$data[0]->id}}</span>
                                                <h2 style="display:inline-block;font-family:Arial;font-size:24px;font-weight:bold;margin-top:5px;margin-right:0;margin-bottom:5px;margin-left:0;text-align:left;line-height:100%">({{$data[0]->created_at->format('M d, Y')}})</h2>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" cellspacing="0" cellpadding="6" width="95%" style="border:0;color:#000000;line-height:150%;text-align:left;font:300 14px/30px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif;" border=".5px">
                                    <thead>
                                        <tr style="background:#efefef">
                                            <th scope="col" width="30%" style="text-align:left;border:1px solid #eee">Product</th>
                                            <th scope="col" width="15%" style="text-align:right;border:1px solid #eee">Quantity</th>
                                            <th scope="col" width="20%" style="text-align:right;border:1px solid #eee">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($details as $detail)
                                        @php
                                        $pro = App\Models\Product::where('id',$detail->product_id)->get();
                                        @endphp
                                        <tr width="100%">
                                            <td width="30%" style="text-align:left;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0;word-wrap:break-word">
                                                {{$pro[0]->name}}
                                            </td>
                                            <td width="15%" style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0">
                                                {{$detail->quantity}}
                                            </td>
                                            <td width="20%" style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:1px solid #eee;border-top:0"><span>${{$pro[0]->price}}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th scope="row" colspan="2" style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0">Cart Subtotal </th>
                                            <th style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:1px solid #eee;border-top:0"><span>${{$data[0]->Total}}</span></th>
                                        </tr>


                                        <tr>
                                            <th scope="row" colspan="2" style="text-align:right;background:#efefef;text-align:right;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0">Order Total</th>
                                            <td style="background:#efefef;text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:1px solid #eee;border-top:0;color:#7db701;font-weight:bold"><span>${{$data[0]->Total}}</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <br>
                                <br>
                                <table border="0" cellpadding="20" cellspacing="0" width="100%" style="color:#000000;line-height:150%;text-align:left;font:300 14px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif">
                                    <tbody>
                                        <tr>
                                            <td valign="top">
                                                <h4 style="font-size:24px;margin:0;padding:0;margin-bottom:10px;">Customer Details</h4>
                                                <p style="margin:0;margin-bottom:10px;padding:0;"><strong>Email:</strong> <a href="mailto:remuleo@gmail.com" target="_blank">{{$data[0]->email}}</a></p>
                                                <p style="margin:0;margin-bottom:10px;padding:0;"><strong>Tel:</strong> {{$data[0]->phone}}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="20" cellspacing="0" width="100%" style="color:#000000;line-height:150%;text-align:left;font:300 14px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif">
                                    <tbody>
                                        <tr>
                                            <td valign="top">
                                                <h4 style="font-size:24px;margin:0;padding:0;margin-bottom:10px;">Delivery address</h4>
                                                <p>
                                                    {{$data[0]->firstname}} {{$data[0]->lastname}}
                                                    <br /> {{$data[0]->address}}
                                                    <br />
                                                    <br /> {{$data[0]->country}}
                                                    <br /> {{$data[0]->state}}, {{$data[0]->zip}}
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="border-top:1px solid #e9e9e9;border-bottom:1px solid #e9e9e9;font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:0px">
                                    <tbody>
                                        <tr>

                                            <td align="center" width="47%">
                                                <table border="0" cellspacing="0" cellpadding="0" height="50" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#9b9b9b">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                © 2023-Riders. All rights reserved.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                                <br>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>