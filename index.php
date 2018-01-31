<?php
// Include Simple Html Dome File
include'simple_html_dom.php';
//Site full  Url
 $html = str_get_html(file_get_contents('https://collectorstime.com/brands/azimuth'));
if ($html) {
		// image Array
		$imageArr=array();
		// Brand Array
		$brandArr=array();
		//name Array
		$nameArr=array();
		// Mopdel Array
		$modelArr=array();
		// Approx value
		$approxRetailArr=array();
		//Price Array
		$priceArr=array();
		// For Get hole Div product list Div
		foreach ($html->find('div[class=product-list]') as $content_area) {
				//get single  product 
			foreach ($content_area->find('div') as $prod_div) {
					foreach ($prod_div->find('div[class=image]') as $image_div) {	
							// get image from div
							foreach($image_div->find('img') as $element){
								  
									 $imageArr[]=$element->src;
							}
					}
					foreach ($prod_div->find('div[class=brand]') as $brand) {
							//get brand from div						
							foreach($brand->find('a') as $element1){
									$brandArr[]= $element1->plaintext ;
							}
					}
					foreach ($prod_div->find('div[class=name]') as $name) {
							//get name from div						
							foreach($name->find('a') as $element2){
									$nameArr[]= $element2->plaintext ;
							}
					}
					foreach ($prod_div->find('div[class=model]') as $model) {
							//get model from div							
									$modelArr[]= $model->plaintext ;
					}
					foreach ($prod_div->find('div[class=pl-ar]') as $pl_ar) {	
							//get approxRetail from div
									 $approxRetailArr[]=$pl_ar->plaintext;
					}
					foreach ($prod_div->find('div[class=price]') as $price) {
						foreach ($price->find('span[class=price-tax]') as $price_tax) {
							//get price from div
									$priceArr[]= $price_tax->plaintext;
						}						
									
					}	
				
			}
			echo "<pre> image==> ";print_r($imageArr);
			echo "<pre> Brand==> ";print_r($brandArr);
			echo "<pre> Name==> ";print_r($nameArr);
			echo "<pre> Model==> ";print_r($modelArr);
			echo "<pre> Approx==> ";print_r($approxRetailArr);
			echo "<pre> price==> ";print_r($priceArr);
			//write Query For Insert Into database in product name, product price, product brand, product model 
			//Here you can insert into dataBase whatever you want you can save into database
	}
}

?>

