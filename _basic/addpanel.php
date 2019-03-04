<table class="table">

<thead>

<tr class="bd-cols">
	<th class="add-panel"> </th>
	<th> Band </th>
	<th> Album </th>
	<th> Year </th>
	<th> Version </th>
	<th> Genre </th>
	<th> Trade </th>
	<th> Notes </th>
</tr>
	
<tr class="bd-cols">
	<form name="test" method="post" action="input1.php">
		<th class="add-panel">Admin panel:</th>
		<th>
			<input type="text" size="10" value=" ">
		</th>
		<th>
			<input type="text" size="10" value=" ">
		</th>
		<th>
			<input type="text" size="10" value=" ">
		</th>
		<th>
			<select name="version">
				<option selected value="12">12"</option>
				<option value="10">10"</option>
				<option value="7">7"</option>
			</select>
		</th>
		<th>
			<input type="text" size="10" value=" ">
		</th>
		<th>
			<select name="trade">
				<option value="yes">Yes</option>
				<option selected value="no">No</option>
			</select>
		</th>
		<th>
			<input type="text" size="10" value=" ">
		</th>
		  
		  
		<p class="add-panel">
			<button type="button" class="btn btn-outline-primary">Add to My collection</button>
			<button type="button" class="btn btn-outline-primary">Add to Wanted list</button>
			<button type="button" class="btn btn-outline-danger">Delete from My collection</button>
			<button type="button" class="btn btn-outline-danger">Exit from Admin panel</button>
		</p>
	</form>
</tr>

</thead>
  
</table>



