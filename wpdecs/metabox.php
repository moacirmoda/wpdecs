<script>
	$ = jQuery;
	$(function(){

		var webservice = "<?php print WPDECS_URL; ?>/webservice.php";
		$.get(webservice, function(data){
			alert(data);
		});
	});
</script>
<style>
	.terms table {
		margin: 30px 0;
		width: 100%;
		border: 1px solid #dfdfdf;
		border-spacing: 0;
		background-color: #f9f9f9;
		text-align: center;
	}
	.terms table thead th {
		padding: 5px 8px 8px;
		background-color: #f1f1f1;
	}
	.terms table tr{
		line-height: 200%;
	}
</style>

<div class="wrap">
	<p><?php _e('Search and select terms.', 'wpdecs'); ?></p>
	<form>

		<input type="text" name="term" class="code" size="40">
		<select name="lang" class="wpdecs_lang">
			<option value="pt"> <?php _e('Portuguese', 'wpdecs'); ?></option>
			<option value="en"> <?php _e('English', 'wpdecs'); ?></option>
			<option value="es"> <?php _e('Spanish', 'wpdecs'); ?></option>
		</select>
		<input type="button" class="button" id="wpdecs_submit" value="<?php _e('Search', 'wpdecs'); ?>">
	</form>

	<div class="terms">
		<table>
			<thead>
				<tr>
					<th></th>
					<th><?php _e('Term', 'wpdecs'); ?></th>
					<th><?php _e('Description', 'wpdecs'); ?></th>
					<th><?php _e('Link', 'wpdecs'); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><button>+</button></td>
					<td>Dengue</td>
					<td>Doença febril aguda transmitida por picada de mosquitos AEDES infectados com o VÍRUS DA DENGUE. É autolimitada e...</td>
					<td><a href="#">Link Externo</a></td>
				</tr>
				<tr>
					<td><button>+</button></td>
					<td>Febre da Dengue</td>
					<td>Doença febril aguda transmitida por picada de mosquitos AEDES infectados com o VÍRUS DA DENGUE. É autolimitada e...</td>
					<td><a href="#">Link Externo</a></td>
				</tr>
				<tr>
					<td><button>+</button></td>
					<td>Febre Quebra-Ossos</td>
					<td>Doença febril aguda transmitida por picada de mosquitos AEDES infectados com o VÍRUS DA DENGUE. É autolimitada e...</td>
					<td><a href="#">Link Externo</a></td>
				</tr>
			</tbody>
		</table>
		<table>
			<thead>
				<tr>
					<th><?php _e('Selected Terms', 'wpdecs'); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<div class="tagchecklist">
							<span><a id="wpdecs_1" class="ntdelbutton">x</a> Dengue</span>
							<span><a id="wpdecs_1">x</a> Malária</span>
							<span><a id="wpdecs_1">x</a> Doença de Chagas</span>

						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>