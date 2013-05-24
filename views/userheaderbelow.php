<div class="container">
	<h1>
		<a href="#"><?php echo $lang->ONLINE." " .$lang->EXAMINATION;?></a>
	</h1>



	<ul class="sf-menu" id="example">
		<li class="current"><a
			href="<?php echo SITE_URL;?>"><?php echo $lang->HOME;?></a>
			<ul class="follow">
				<li><a href="#"><?php echo $lang->PRICING;?></a></li>
				<li><a href="#"><?php echo $lang->FAQ;?></a></li>
				<li><a href="#"><?php echo $lang->CONTACTUS;?></a></li>
			</ul></li>
		<li class="current"><a href="#">Test</a>
			<ul class="follow">
				<li><a href="javascript:void(0)"
					onclick="openPage('/views/category.php')"><?php echo $lang->CATEGORIES;?></a>

				</li>
				<li><a href="#"><?php echo $lang->QUESTION." " .$lang->BANK;?></a>
					<ul>
						<li><a href="javascript:void(0)"
							onclick="openPage('/views/createtest.php')"><?php echo $lang->ADD ." ".$lang->QUESTION." " .$lang->ONE . " " . $lang->BY . " " .$lang->ONE ;?></a></li>
						<li><a href="javascript:void(0)"
							onclick="openPage('/views/upload.php')"><?php echo $lang->ADD ." ".$lang->QUESTION." " .$lang->IN . " " . $lang->BULK;?></a></li>

					</ul></li>
				<li><a href="javascript:void(0)" onclick="showTests();"><?php echo $lang->MY . " " .$lang->TEST;?></a>
				</li>
				<li><a href="#"><?php echo $lang->CERTIFICATES;?></a></li>
				<li><a href="#"  onclick="createTest();"><?php echo $lang->CREATE. " " .$lang->TEST;?></a></li>



			</ul></li>











		<li class="current"><a href="#"><?php echo $lang->ASSIGN;?></a>
			<ul class="follow">
				<li><a href="#"><?php echo $lang->ASSIGN;?></a></li>
				<li><a href="#"><?php echo $lang->VIEW." " .$lang->ASSIGN. " " .$lang->TEST;?></a>
				</li>




			</ul></li>

		<li class="current"><a href="#"><?php echo $lang->RESULT;?></a>
			<ul class="follow">
				<li><a
					href="#"
					onclick="openPage('/views/bytest.php')"><?php echo $lang->BY. " " .$lang->TEST;?></a>
				</li>
				<li><a
					href="#" onclick="openPage('/views/SearchUser.php')"><?php echo $lang->SEARCH. " " .$lang->USER;?></a>
				</li>




			</ul></li>

	</ul>

</div>
</header>
<br />
<div class="container">
	<aside>


		<br /> <br />


		<h3><?php //echo $lang->CATEGORIES;?></h3>
		<div id="body">
			<div id="feedControl">Loading...</div>
		</div>

	</aside>