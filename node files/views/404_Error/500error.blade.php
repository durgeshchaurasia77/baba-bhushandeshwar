<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="https://styliv.in" />
    <meta name="description" content="We are STYLIV, an online market place platform with focus on lifestyle products. The aim is to provide the women with a one stop shopping destination for most of their needs.">
    <meta name="twitter:image" content="https://styliv.in/logo_ecom/ecommerce_plateform.jpg">
    <meta property="og:title" content="Styliv ecommerce website">
    <meta name="image" property="og:image" content="https://styliv.in/logo_ecom/ecommerce_plateform.jpg"/>
    <meta property="og:description" content="We are STYLIV, an online market place platform with focus on lifestyle products."/>
    <meta property="og:url" content="https://styliv.in"/>
    <meta property="og:type" content="website" />
    <meta property="og:type" content="website" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
		/*======================
		    404 page
		=======================*/

		.page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
		}

		.page_404  img{ width:100%;}

		.four_zero_four_bg{

			background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
			height: 400px;
			background-position: center;
		}


		.four_zero_four_bg h1{
			font-size:80px;
		}

		.four_zero_four_bg h3{
			font-size:80px;
		}

		.link_404{			 
			color: #fff!important;
			padding: 10px 20px;
			font-size: 20px;
			background: #004b91;
			margin: 20px 0;
			display: inline-block;
		}
		.contant_box_404{ margin-top:-50px;}
	</style>
</head>
<body>
	<section class="page_404">
		<div class="container">
			<div class="row">	
				<div class="col-sm-12 ">
					<div class="col-sm-10 col-sm-offset-1  text-center">
						<div class="four_zero_four_bg">
							<h1 class="text-center " style="color: #F648C3;">500</h1>	
						</div>

						<div class="contant_box_404">
							<h3 class="h2" style="color: #F648C3;">
								Internal Server Error
							</h3>
							{{-- <p>the page you are looking for not available!</p> --}}
							<a href="{{ route('home') }}" class="link_404" style="background-color: #F648C3;color: white;text-decoration:none">Go to Home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>