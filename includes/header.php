<nav class="navbar navbar-expand-md navbar-dark bg-dark" >

<a class="navbar-brand" href="index.php"> www.vinyl.vladislavdrews.com </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
		<li class="nav-item active">
			<a class="nav-link" href="index.php"> 
			    <button type="submit" class="btn btn-outline-light">My collection</button>
			</a>
		</li>
		<li class="nav-item">
		    <a class="nav-link" href="wantedlist.php">
				<button type="submit" class="btn btn-outline-light">Wanted list</button>
			</a>
		</li>
    </ul>

	
<form id="searchForm" action="javascript:search();" class="form-inline mt-2 mt-md-0">

<input type="text" class="form-control form-control mr-sm-2" placeholder="Search">
<ul class="navbar-nav mr-auto">
    <li class="nav-item">
		<a class="nav-link">
			<button id="go" class="btn btn-outline-light" type="button">Search</button>
		</a>
	</li>
</ul>	

</form>
	
</div>
 
</nav>