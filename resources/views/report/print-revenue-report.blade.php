<?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê doanh thu bán hàng từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}}</title>
    <link rel="icon" type="image/png" href="{{URL::to('public/admin/images/pdf-icon.jpg')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<!-- <button onclick="window.print();" class="noPrint">Print</button> -->
    <div class="container" style="font-size:22px;">
        <div class="row" style="margin-top: 40px;">
            <div class="col-sm-1">
                <img src="{{URL::to('public/client/Images/logo3.png')}}" alt="">
            </div>
            <div class="col-sm-11">
                <b>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ ITGOSHOP</b>
                <p>Tầng 5, Số 117-119-121 Nguyễn Du, Phường Bến Thành, Quận 1, Thành Phố Hồ Chí Minh</p>
            </div>
            <!-- <div class="col-sm-4" style="text-align: right;">
                <p style="color:#F70C72;font-weight: bold;">"Tất cả vì khách hàng"</p>
            </div> -->
        </div>
        <hr style="margin:20px 0px 40px 0px">
        <div class="row" style="margin-bottom:40px;">
            <div class="col-md-12" style="text-align: center;">
                <b style="font-size: 26px;">THỐNG KÊ VÀ PHÂN TÍCH DOANH THU BÁN HÀNG</b><br>
                <i>(Từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}})</i>
            </div>
            <div class="col-md-12" style="text-align: right;">
                <p style="margin:30px 0px">Thời gian thống kê: {{date('H:i d-m-Y')}}</p>
                <!-- <p>Người bán hàng: Lê Thị Hồng Cúc</p> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">I. Số liệu thống kê</b></p>
                <input type="hidden" id="tu-ngay" value="{{$tu_ngay}}">
                <input type="hidden" id="den-ngay" value="{{$den_ngay}}">
                <table class="table table-bordered" style="text-align:center">
                    <thead>
                        <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Ngày bán hàng</th>
                        <th scope="col">Bán hàng</th>
                        <th scope="col">Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; $total_sales = 0; $total_profit = 0;
                         $max_sales = 0; $max_profit = 0; $max_sales_date = ''; $max_profit_date  = ''; 
                        $first_statistic_row = $statistic_info->first(); $min_sales = $first_statistic_row->Sales; $min_profit = $first_statistic_row->Profit; $min_sales_date = ''; $min_profit_date  = ''; 
                         ?>
                        @foreach($statistic_info as $key => $item)
                        <tr>
                            <th scope="row">{{$stt}}</th>
                            <td>{{date('d-m-Y', strtotime($item->StatisticDate))}}</td>
                            <td>{{number_format($item->Sales, 0, " ", ".").' ₫'}}</td>
                            <td>{{number_format($item->Profit, 0, " ", ".").' ₫'}}</td>
                        </tr>
                        <?php $stt = $stt + 1; $total_sales += $item->Sales; $total_profit += $item->Profit;?>
                        <?php 
                            if($max_sales < $item->Sales)
                            {
                                $max_sales = $item->Sales;
                                $max_sales_date = $item->StatisticDate;
                            }
                            if($min_sales > $item->Sales)
                            {
                                $min_sales = $item->Sales;
                                $min_sales_date = $item->StatisticDate;
                            }

                            if($max_profit < $item->Profit)
                            {
                                $max_profit = $item->Profit;
                                $max_profit_date = $item->StatisticDate;
                            }
                            if($min_profit > $item->Profit)
                            {
                                $min_profit = $item->Profit;
                                $min_profit_date = $item->StatisticDate;
                            }
                        ?>
                        @endforeach
                        <tr>
                            <td colspan="2"><b>TỔNG CỘNG</b></td>
                            <td>{{number_format($total_sales, 0, " ", ".").' ₫'}}</td>
                            <td>{{number_format($total_profit, 0, " ", ".").' ₫'}}</td>
                        </tr>
                    </tbody>
                    </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">II. Biểu đồ thống kê doanh thu</b></p>
                <form>
                    @csrf
                    <div id="bieuDoDoanhThu" style="max-width:85%"></div>
                </form>
                <small>Chú thích: 
                    <div style="display:inline-block;background-color:#0B62A4; height:10px; width:10px;margin-left: 20px;"></div> : Bán hàng
                    <div style="display:inline-block;background-color:#7A92A3; height:10px; width:10px;margin-left: 20px;"></div>  : Doanh thu
                </small >
            </div>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <p><b style="font-size: 24px;">III. Phân tích thống kê</b></p>
                <p>Từ ngày {{date('d-m-Y', strtotime($tu_ngay))}} đến ngày {{date('d-m-Y', strtotime($den_ngay))}}:</p>
                <div style="margin-left:40px">
                    <p>- Ngày bán hàng có giá trị lớn nhất: {{date('d-m-Y', strtotime($max_sales_date))}} ({{number_format($max_sales, 0, " ", ".").' ₫'}})</p>
                    <p>- Ngày bán hàng có giá trị nhỏ nhất: {{date('d-m-Y', strtotime($min_sales_date))}} ({{number_format($min_sales, 0, " ", ".").' ₫'}})</p>
                    <p>- Ngày có doanh thu lớn nhất: {{date('d-m-Y', strtotime($max_profit_date))}} ({{number_format($max_profit, 0, " ", ".").' ₫'}})</p>
                    <p>- Ngày có doanh thu nhỏ nhất: {{date('d-m-Y', strtotime($min_profit_date))}} ({{number_format($min_profit, 0, " ", ".").' ₫'}})</p>
                    <p>- Giá trị bán hàng trung bình mỗi ngày: {{number_format(round($total_sales/count($statistic_info), 0), 0, " ", ".").' ₫'}}</p>
                    <p>- Doanh thu trung bình mỗi ngày: {{number_format(round($total_profit/count($statistic_info), 0), 0, " ", ".").' ₫'}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" style="text-align: right;">
            </div>
            <div class="col-md-4" style="text-align: center;">
                <p style="margin:20px 0px 100px 0px">
                    <b style="font-size: 24px;">Người lập thống kê</b><br>
                    <i>(Kí, đóng dấu và ghi rõ họ tên)</i>
                </p>
                <p>{{Session::get('LastName')}} {{Session::get('FirstName')}}</p>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-md-12" style="text-align: center;">
                <hr>
                <b>ITGoShop - "Tất cả vì khách hàng"</b>
                <hr>
            </div>
        </div>
    </div>
    <script type= "text/javascript">       
     </script>
    <script>
        $(document).ready(function(){
            var chart = new Morris.Bar({
                element: 'bieuDoDoanhThu',
                lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                pointFillColors:['#ffffff'],
                pointStrokeColors:['black'],
                fillOpacity: 0.6,
                hideHover: 'auto',
                parseTime: false,
                xkey: 'period',
                ykeys:['sales', 'profit'],
                behaveLikeLine: true,
                labels: ['Bán hàng', 'Doanh thu']
            });
            load_chart();
            setTimeout(function() { window.print();}, 500);
            function load_chart()
            {
                var tu_ngay = $('#tu-ngay').val();
                var den_ngay = $('#den-ngay').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
					url:"{{url('/filter-by-date')}}",
					method: "POST",
					dataType:"json",
					data:{tu_ngay: tu_ngay, den_ngay: den_ngay, _token: _token},
					success:function(data)
					{
						chart.setData(data);
					},
					error:function(data)
					{
						swal({
						text: "Không tìm thấy dữ liệu",
						icon: "error",
						});
					}
				});
            }
        });
        
    </script>
</body>
</html>
