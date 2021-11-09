@extends('client_layout')
@section('client_content')
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="product-detail.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="bloggrid.php">Blog Grid</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
<main class="ps-main">
            <div class="ps-blog-grid pt-80 pb-80">
              <div class="ps-container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        @foreach($all_content as $key => $blog)
                        {{csrf_field()}}
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                          <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" ></a><img src="{{URL::to('public/images_upload/blog/'.$blog->Image)}}" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="{{URL::to('/blog-detail'.$blog->BlogId)}}">{{$blog->Title}}</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5">{{$blog->Author}}</a></span> -<span class="ml-5">{{$blog->DatePost}}</span></p>
                              <p>{{$blog->Summary}}</p><a class="ps-morelink" href="{{URL::to('/blog-detail'.$blog->BlogId)}}">Đọc thêm<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                          <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.php"></a><img src="images/blog/2.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.php">Unpacking the Breaking2 Race Strategy</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.php">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                              <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.php">Read more<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                          <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.php"></a><img src="images/blog/3.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.php">Nike’s Latest Football Cleat Breaks the Mold</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.php">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                              <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.php">Read more<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                          <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.php"></a><img src="images/blog/1.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.php">An Inside Look at the Breaking2 Kit</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.php">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                              <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.php">Read more<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                          <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.php"></a><img src="images/blog/2.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.php">Unpacking the Breaking2 Race Strategy</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.php">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                              <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.php">Read more<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                          <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.php"></a><img src="images/blog/3.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.php">Nike’s Latest Football Cleat Breaks the Mold</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.php">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                              <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.php">Read more<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                          <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.php"></a><img src="images/blog/1.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.php">An Inside Look at the Breaking2 Kit</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.php">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                              <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.php">Read more<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                          <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.php"></a><img src="images/blog/2.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.php">Unpacking the Breaking2 Race Strategy</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.php">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                              <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.php">Read more<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                          <div class="ps-post mb-30">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="blog-detail.php"></a><img src="images/blog/3.jpg" alt=""></div>
                            <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.php">Nike’s Latest Football Cleat Breaks the Mold</a>
                              <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.php">Alena Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                              <p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further…</p><a class="ps-morelink" href="blog-detail.php">Read more<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                    <div class="mt-30">
                      <div class="ps-pagination">
                        <ul class="pagination">
                          <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                          <li class="active"><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">...</a></li>
                          <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</main>	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Miễn phí vận chuyển</h4>
						<p>Đơn đặt hàng trên 1.000.000VND</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Miễn phí đổi trả</h4>
						<p>Trong vòng 30 ngày</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Bảo mật tuyệt đối</h4>
						<p>100% thanh toán an toàn</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Giá tốt nhất</h4>
						<p>Quà tặng và ưu đãi hấp dẫn</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	
	
	
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
@endsection