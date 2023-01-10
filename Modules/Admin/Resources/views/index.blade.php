@extends('admin::layouts.main')
@section('title', '| Trang chủ')
@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
   .placeholders {
    margin-bottom: 30px;
    text-align: center;
   }
   .row {
      margin-right: -15px;
      margin-left: -15px;
      margin-bottom: 20px
   }
   .col-sm-3, .col-sm-6{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
   }
   .placeholders {
      margin-bottom: 30px;
      text-align: center;
   }
   .placeholder img {
      display: inline-block;
      border-radius: 50%;
   }
   .img-responsive{
      display: block;
      max-width: 100%;
      height: auto;
   }
   .placeholders img {
      vertical-align: middle;
   }
   .placeholders {
      margin-bottom: 30px;
      text-align: center;
   }

   @media (min-width: 768px){
      .col-sm-3 {
         width: 25%;
      }
   }

   /* highchart */
   .highcharts-figure,
   .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
   }

   #container {
      height: 400px;
   }

   .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #ebebeb;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
   }

   .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
   }

   .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
   }

   .highcharts-data-table td,
   .highcharts-data-table th,
   .highcharts-data-table caption {
      padding: 0.5em;
   }

   .highcharts-data-table thead tr,
   .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
   }

   .highcharts-data-table tr:hover {
      background: #f1f7ff;
   }
   .card-body {
      font-size: 30px;
      font-weight: bolder;
   }

</style>

<div class="app-main__outer">

   <!-- Main -->
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
               </div>
               <div>
                  TRANG TỔNG QUAN
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">{{ $totalProduct }} Sản phẩm</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.get.list.product') }}">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">{{ $totalOrder }} Đơn hàng</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.get.list.transaction') }}">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">{{ $totalUser }} Người dùng</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.get.list.user') }}">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">{{ $totalRating }} Đánh giá</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('admin.get.list.rating') }}">Xem chi tiết</a>
                    </div>
                </div>
            </div>
         </div>
         {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
         <div class="row">
            <div class="col-sm-12">
               <figure class="highcharts-figure">
                  <div id="container"></div>
               </figure>
            </div>
         </div>
            
         <div class="row">
            <div class="col-sm-6">
               <h2><b>Các đơn hàng mới nhất</b></h2><br>
               <table class="table table-striped table-sm">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Tên KH</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Tổng tiền</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($transactionNews as $transactionNew)
                     <tr>
                        <td>{{ $transactionNew->id }}</td>
                        <td>{{ isset($transactionNew->user->name) ? $transactionNew->user->name: '[N\A]' }}</td>
                        <td>{{ $transactionNew->tr_address }}</td>
                        <td>{{ $transactionNew->tr_phone }}</td>
                        <td>{{ number_format($transactionNew->tr_total,0,',','.') }} VND</td>
                        <td>{{ $transactionNew->created_at->format('d-m-Y h:i:s A') }}</td>
                        <td>
                           @if ($transactionNew->tr_status == 1)
                              <div class="badge bg-success" style="color: white">Đã xử lý</div>
                           @else
                              <div class="badge bg-secondary" style="color: white">Chưa xử lý</div>
                           @endif
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="col-sm-6">
               <h2><b>Các đánh giá mới</b></h2><br>
               <div class="table-responsive">
                  <table class="table table-striped table-sm">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Tên KH</th>
                           <th>Sản phẩm</th>
                           <th>Số sao</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if (isset($ratings))
                        @foreach ($ratings as $rating)
                        <tr>
                           <td>{{ $rating->id }}</td>
                           <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</td>
                           <td>
                                 <a target="_blank" href="{{ route('get.detail.product',[$rating->product->pro_slug, $rating->product->id]) }}">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a>
                           </td>
                           <td>{{ $rating->ra_number }} <i class="fa fa-star" style="color: #ff9705"></i></td>
                        </tr>
                           @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Main -->
</div>
    
@stop

@section('script')
<script>

   // Create the chart
   Highcharts.chart('container', {
      chart: {
         type: 'column'
      },
      title: {
         align: 'left',
         text: 'Bảng thống kê doanh thu của cửa hàng, Essence Shop!'
      },
      subtitle: {
         align: 'left',
         text: 'Bấm vào đây để truy cập vào website. Source: <a href="{{ route('home') }}" target="_blank">Essence Shop</a>'
      },
      accessibility: {
         announceNewData: {
               enabled: true
         }
      },
      xAxis: {
         type: 'category'
      },
      yAxis: {
         title: {
               text: 'Doanh thu theo ngày, tháng, năm của cửa hàng'
         }

      },
      legend: {
         enabled: false
      },
      plotOptions: {
         series: {
               borderWidth: 0,
               dataLabels: {
                  enabled: true,
                  format: '{point.y:.1f} VND'
               }
         }
      },

      tooltip: {
         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} VND </b> of total<br/>'
      },

      series: [
         {
               name: "VUROT",
               colorByPoint: true,
               data: [
                  {
                     name: "Doanh thu trong ngày",
                     y: {{ $moneyDay }},
                     drilldown: "Doanh thu trong ngày"
                  },
                  {
                     name: "Doanh thu trong tháng",
                     y: {{ $moneyMonth }},
                     drilldown: "Doanh thu trong tháng"
                  },
                  {
                     name: "Doanh thu trong năm",
                     y: {{ $moneyYear }},
                     drilldown: "Doanh thu trong năm"
                  }
               ]
         }
      ]
   });
</script>
@stop
