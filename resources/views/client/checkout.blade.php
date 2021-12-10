@extends('client_layout')
@section('title', 'Thanh toán - ITGoShop')
@section('client_content')
<?php date_default_timezone_set("Asia/Ho_Chi_Minh"); ?>
<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{URL::to('/')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
								<li><a href="{{URL::to('/show-cart')}}">Giỏ hàng<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="{{URL::to('/checkout')}}">Thanh toán</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>


<section>
			<?php
				$content = Cart::content();
				$number_product = Cart::count();
			?>
			<div class="container">
				<div class ="col-lg-12" style="margin: 20px 0px 0px 0px; padding-right: 0px;padding-left: 0px;">
					<div class="panel panel-default">
						<div class="panel-body" style=" background-color: #77ACF1; color:white ; font-size: 14px;">
							Do ảnh hưởng của dịch Covid-19, một số khu vực có thể nhận hàng chậm hơn dự kiến. <br> 
							ITGoShop đang nỗ lực giao các đơn hàng trong thời gian sớm nhất. Cám ơn sự thông cảm của quý khách!
						</div>
					  </div>
				</div>
				<!-- Nếu khách hàng đã có địa chỉ mặc định thì thanh toán luôn nếu ko thì phải thêm mới địa chỉ giao hàng -->
				@if($default_shipping_address)
				<form action="{{URL::to('/create-order')}}" method="POST">
					{{csrf_field()}}
					<div class ="row">
						<div class="col-lg-8">
							<div class="panel panel-default">
								<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Chọn phương thức giao hàng</b></h4></div>
									<div class="panel-body vanchuyen-radio" style="font-size: 14px;">
									<?php $today = date('d/m/Y'); ?>
									@foreach($shipmethod_list as $key => $item)
										<div class="form-group">
											<div class="ps-radio">
												<input class="form-control" type="radio" id="radio-btn[{{$item->ShipMethodId}}]" name="vanchuyen" value="{{$item->ShipMethodId}}" required>
												<label for="radio-btn[{{$item->ShipMethodId}}]"><img src="{{URL::to('public/client/Images/thanh-toan-khi-nhan-hang.PNG')}}" alt="#" hidden>{{$item->ShipMethodName}}<i> 
													@if($item->EstimatedDeliveryTime <= 24)
														(Thời gian giao hàng dự kiến: khoảng {{date('h:00 d-m-Y',strtotime("+$item->EstimatedDeliveryTime hours"))}})
													@else
														(Thời gian giao hàng dự kiến: {{date('d-m-Y',strtotime("+$item->EstimatedDeliveryTime hours"))}})
													@endif
												</i></label>
												<input type="text" class="ShipFee"  value="{{$item->ShipFee + $default_shipping_address->ExtraShippingFee}}" hidden>
												<input type="text" name="ExtraShippingFee" value="{{$default_shipping_address->ExtraShippingFee}}" hidden>
											</div>
										</div>
									@endforeach
									</div>
								</div>
							<div class="panel panel-default">
								<div class="panel-heading" style="background-color: #77ACF1; "><h4 style="color: white;"><b>Thông tin đơn hàng</b></h4></div>
								<div class="panel-body">
									<table>
										<thead style="font-size: 16px;">
											<tr>
												<th colspan="2"><b>Sản phẩm</b></th>
												<th><b>Đơn giá</b></th>
												<th><b>Số lượng</b></th>
												<th><b>Thành tiền</b></th>
											</tr>
										</thead>
										
										<tbody>
											@foreach($content as $item)
											<tr style="font-size: 14px;">
												<td style=" height:80px">
													<img style="margin: auto; max-width: 60px; max-height: 60px; width: auto; height: auto; " src="{{URL::to('public/images_upload/product/'.$item->options->image)}}" alt="">
												</td>
												<td>{{$item->name}}</td>
												<td>{{number_format($item->price, 0, " ", ".").' ₫'}}</td>
												<td style="text-align:center">x{{$item->qty}}</td>
												<td><?php $subtotal = $item->price * $item->qty;  echo number_format($subtotal, 0, " ", ".").' ₫'; ?></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Chọn hình thức thanh toán</b></h4></div>
									<div class="panel-body" style="font-size: 14px;">
										<div class="form-group cheque">
											<div class="ps-radio">
											<input class="form-control" type="radio"  id="rdo01" name="payment" value="Thanh toán khi giao hàng" checked>
											<label for="rdo01"><img src="{{URL::to('public/client/Images/thanh-toan-khi-nhan-hang.PNG')}}" alt="#">Thanh toán khi giao hàng</label>
											</div>
										</div>
										<div class="form-group paypal">
											<div class="ps-radio ps-radio--inline">
											<input class="form-control" type="radio" data-toggle="modal" data-target="#exampleModal" name="payment" id="rdo02" value="Chuyển khoản online">
											<label for="rdo02"><img style="max-height: 40px; max-width: 40px; width: auto; height: auto;" src="{{URL::to('public/client/Images/thanh-toan-online.PNG')}}" alt="#">Chuyển khoản online</label>
											</div>
										</div>
									</div>
								</div>
								
							<button type="submit" class="btn btn-primary btn-lg btn-dat-mua" style="width:320px;font-size:20px; background-color: #000; height:50px; ">ĐẶT MUA</button>
							<p style="margin: 7px 0px; margin-bottom: 80px;"><i>(Xin vui lòng kiểm tra lại đơn hàng trước khi Đặt Mua)</i></p>
						</div>

						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-body">
									<button type="button" style="float:right; padding: 6px; background-color: white;"><a href="{{URL::to('/show-shipping-address')}}" style="font-size:11px">Sửa</a></button>
									<h4><div style="margin-bottom:20px;"> <i class="fa fa-map-marker" aria-hidden="true" ></i> <b>Địa chỉ giao hàng </b>  </div></h4>
									<div></div>
									<hr>
									<input type="text" id="ShippingAddressId" name="ShippingAddressId" value="{{$default_shipping_address->ShippingAddressId}}" hidden>
									<p><b>{{$default_shipping_address->ReceiverName}}</b></p>
									<p>{{$default_shipping_address->Address. ", " .$default_shipping_address->xaphuongthitran. ", " .$default_shipping_address->quanhuyen. ", " .$default_shipping_address->tinhthanhpho}}</p>
									<p>Điện thoại: {{$default_shipping_address->Phone}}</p>

								</div>
								
							</div>
							
							<div class="panel panel-default">
								<div class="panel-body">
									<button type="button" style="float:right; padding: 6px; background-color: white;"><a href="{{URL::to('/show-cart')}}" style="font-size:11px">Sửa</a></button>
									<h4><b>Đơn hàng </b></h4>
									<p><i>{{$number_product}} sản phẩm</i></p>
									<hr>
									<p style="float:right">{{(Cart::subtotal(0, ',', '.')).' ₫'}}</p>
									<p>Tạm tính: </p> 
									<p style="float:right" id="ShipFee">0 ₫</p>
									<p>Phí vận chuyển: </p> 
									<p style="float:right; color: red;">- 0 ₫</p>
									<p>Giảm giá: </p> 
									<p style="float:right; color: red; font-size: 20px" id="TotalFee">{{(Cart::total(0, ',', '.')).' ₫'}}</p> 
									<input type="text" id="TotalFee-hidden" value="{{Cart::total(0, ',', '')}}" hidden>
									<p><b style="color:black">Thành tiền: </b> </p>  
									<p style="float:right;"><i>(Đã bao gồm VAT nếu có)</i></p> 
								</div>
							</div>
						</div>
					</div>
				</form>
				@else
				<div class="row">
					<div class="col-lg-12">
						<form action="{{URL::to('/add-shipping-address')}}" method="post">
						{{ csrf_field() }}
							<div class="panel panel-default">
							<div class="panel-heading" style="background-color: #77ACF1;"><h4 style="color: white;"><b>Vui lòng điền thông tin địa chỉ giao hàng</b></h4></div>
							<div class="panel-body"> 
								<div class="row"> 
									<div class="col-sm-5">
										<div class="form-group">
											<p><b>Tên người nhận</b></p>
											<input type="text" class="form-control" name="ReceiverName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên người nhận">
										</div>
										<div class="form-group">
											<p><b>Điện thoại di động</b></p>
											<input type="text" class="form-control" name="Phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại">
										</div>
										<p><i>Để nhận hàng thuận tiện hơn, bạn vui lòng cho ITGoShop biết loại địa chỉ.</i> </p><br>
										<div class="ps-radio ps-radio--inline">
											<input class="form-control" type="radio" id="rdo01" name="ShippingAddressType" value="Nhà riêng/ Chung cư" checked>
											<label for="rdo01" style="font-size:14px">Nhà riêng/ Chung cư</label>
										</div>
										<div class="ps-radio ps-radio--inline">
											<input class="form-control" type="radio" name="ShippingAddressType" id="rdo02" value="Nhà riêng/ Cơ quan/ Công ty">
												<label for="rdo02" style="font-size:14px">Cơ quan/ Công ty</label>
										</div>		
									</div>
								
									<div class="col-sm-7">
										<div class="row">
											<div class="col-sm-6">
												<p><b>Tỉnh/Thành phố</b></p>
												<select class="form-control select-tinhthanhpho" style="height:35px" name="tinhthanhpho"> 
													<option>--- Chọn Tỉnh/Thành phố ---</option>
													@foreach($all_tinhthanhpho as $key => $tinhthanhpho)
														<option value="{{$tinhthanhpho->matp}}">{{$tinhthanhpho->name}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-sm-6">
												<p><b>Quận/Huyện</b></p>
												<select class="form-control select-quanhuyen" style="height:35px" name="quanhuyen">
													<option>--- Chọn Quận/Huyện ---</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<p style="margin-top:13px"><b>Phường/Xã</b></p>
												<select class="form-control select-xaphuongthitran" style="height:35px"  name="xaphuongthitran">
													<option>--- Chọn Phường/Xã ---</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<p style="margin-top:13px"><b>Địa chỉ</b></p>
												<textarea class="form-control" name="diachi" id="exampleFormControlTextarea1" rows="2" placeholder="Ví dụ: 14, Nguyễn Thị Minh Khai"></textarea>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups' style='margin-top: 4px;'>
									<div class='btn-group mr-2' role='group' aria-label='First group'> 
										<button  type='button' style='margin-right: 10px; padding: 15px; background-color: white;font-size: 14px;'> <a href="{{URL::to('/show-cart')}}">Hủy bỏ</a></button>
									</div>
									<div class='btn-group mr-2' role='group' aria-label='Second group'> 
										<button type='submit' style='padding: 15px; background-color: #333333; color: white;font-size: 14px;'>Giao đến địa chỉ này</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				@endif
				<!-- Trigger/Open The Modal -->
				<!-- The Modal -->
				

				<!-- Modal content -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content" style="border-radius: 10px;">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
								</div>
								<div class="modal-body">
									<div class="row no-gutters">
										<div class="col-lg-10 offset-lg-1 col-12">
											<h4 style="margin-top:50px;font-size:14px; font-weight:500; color:#77ACF1; display:block; margin-bottom:15px;">ITGo Shop</h4>
											<h3 style="font-size:30px;color:#333; text-align:center;">Chuyển khoản online<h3>
											<div style="text-align:center; background-color: #fbfbfb; border-radius: 8px; padding:20px;margin-bottom:20px">
												<p>Quý khách vui lòng chuyển khoản với nội dung ghi rõ<br>
												<b>Tên & Số Điện Thoại người</b> nhận hàng:<br>
												Ví dụ: <b>A THANH 0988888888</b></p>
											</div>
											<b style="font-size:18px;">Chuyển qua ngân hàng</b>
											<div style="border: 2px solid #fbfbfb; padding: 10px; border-radius:10px;margin-top:10px">
												<p style="line-height: 3;">
												<b>Vietcombank - Ngân Hàng Ngoại Thương Việt Nam</b> <br>
												Chủ tài khoản: LE LAM LINH <br>
												Số tài khoản: <b>0011004366653</b> <br>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
				<!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							 <span class="close">&times;</span> 
							<div style="margin:30px">
								<p style="text-align:center;"><b style="font-size:22px;margin:auto">Chuyển khoản online</b></p>
								<div style="text-align:center; background-color: #fbfbfb; border-radius: 8px; padding:20px;margin-bottom:20px">
									<p>Quý khách vui lòng chuyển khoản với nội dung ghi rõ<br>
									<b>Tên & Số Điện Thoại người</b> nhận hàng:<br>
									Ví dụ: <b>A THANH 0988888888</b></p>
								</div>
								<b style="font-size:18px;">Chuyển qua ngân hàng</b>
								<div style="border: 2px solid #fbfbfb; padding: 10px; border-radius:10px;margin-top:10px">
									<p style="line-height: 3;">
									<b>Vietcombank - Ngân Hàng Ngoại Thương Việt Nam</b> <br>
									Chủ tài khoản: LE LAM LINH <br>
									Số tài khoản: <b>0011004366653</b> <br>
									</p>
								</div>
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" class="btn btn-primary"  style="width:30%;margin:auto;border-radius:25px;">Đã hiểu</button>
						</div>
					</div>
    			</div>-->
			</div>
		</section>
			<!-- FRAMEWORK -->
			<style>
/* The Modal (background) */

</style>
			<script>
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script>
	
	$(document).ready(function(){
		$("input[value='Chuyển khoản online'").click(function(){
			modal.style.display = "block";
		});
		$("#button-da-hieu").click(function(){
			modal.style.display = "none";
		});
	});
</script>
			<!-- END FRAMEWORK -->
		<script>
			$(document).ready(function(){
				$(".vanchuyen-radio input[type=radio]").first().prop('checked', true);
				var ShipFee = $(".vanchuyen-radio input[type=radio]").first().parents('.ps-radio').find('.ShipFee').val();
				$('#ShipFee').text(numberWithCommas(ShipFee) + ' ₫');
				var TotalFee = $('#TotalFee-hidden').val();
				$('#TotalFee').text(numberWithCommas(Number(TotalFee) + Number(ShipFee))+ ' ₫');

				function numberWithCommas(x) // Hàm để format tiền
				{
					return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				}
				$('input[type=radio][name=vanchuyen]').change(function() {
					var ShipFee = $(this).parent().find('.ShipFee').val();
					$('#ShipFee').text(numberWithCommas(ShipFee) + ' ₫');
					var TotalFee = $('#TotalFee-hidden').val();
					$('#TotalFee').text(numberWithCommas(Number(TotalFee) + Number(ShipFee))+ ' ₫');
				});
				$('.btn-dat-mua').click(function(){
					if($('input[name="vanchuyen"]:checked').length > 0)
					{
						swal("Đặt hàng hàng công! Cảm ơn quý khách.", {
							icon: "success",
							});
					}
					else{
						
							swal("Vui lòng chọn phương thức giao hàng", {
							icon: "info",
							});
					}
				});
				
			});
		</script>
@endsection