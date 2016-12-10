<div id="main_body">
	<div id="search_area">
		<div id="introParagraphDiv">
			<p>Looking for a restaurant?</p>
		</div>
		<div id="searchByDiv" >
			<p id="searchByP">Search by... </p>
			<ul>
				<li id="nameDiv" />
					<p>... name: </p>
					<input class="search_btn" id="res_name" type="text">
				</li>
				<li id="priceRangeDiv" />
					<p>... price range: </p>
					<input class="search_btn" id="res_price1" type="number" style="width:50px;">
					<input class="search_btn" id="res_price2" type="number" style="width:50px;margin-right:56px;">
				</li>
				<li id="locationDiv" />
					<p>... location: </p>
					<input class="search_btn" id="res_locat" type="text">
				</li>
				<li id="popularityDiv" />
					<p>... minimum rating: </p>
					<input class="search_btn" id="res_rat" type="number" min="1" max="10">
				</li>
			</ul>
		</div>
		<div id="altSearchingDiv">
			<p id="altSearchingP">Or look by our selections, instead. </p>
			<ul>
				<li id="mostPopularDiv">
					<input id="MostPopularButton" type="submit" value="Most Popular" >
				</li>
				<li id="cheapestDiv">
					<input id="CheapestButton" type="submit" value="Cheapest" >
				</li>
				<li id="luxuriousDiv">
					<input id="LuxuriousButton" type="submit" value="Our Luxury Selection" >
				</li>
				<li id="newestDiv">
					<input id="NewestButton" type="submit" value="Newly Added" >
				</li>
			</ul>
 		</div>
	</div>
	<div id="show_restaurants" >
		<p>colocar aqui imagem de boas vindas ou algo parecido, depois desaparece automaticamente</p>
	</div>
</div>