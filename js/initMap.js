
function delete_session()
{
	$.ajax({
        type: 'POST',
        url: 'index.php',
        data: {"action": "destroy_session"}
	});
}

function printShip(case_on, x, y, shipname)
{
	for (var i = x - 1 + case_on; i >= case_on; i--) {
		for (var j = y - 1; j >= 0; j--) {
			$('#case_'+(i + 150 * j)).addClass('ship-color-'+shipname);
		}
	}
}

function printMap(map)
{
	for (var key in map) {
		$('#case_'+key).addClass('ship-color-'+map[key]);
	}
}

function registerShip(case_on, shipname, player, x, y)
{
	$.ajax({
        type: 'POST',
        url: 'index.php',
        data: {"action": "register_ship", "shipname": shipname, "player": player, "case": case_on},
        success: function(data){
        	players = jQuery.parseJSON(data);
        	printShip(case_on, x, y, shipname);
        }
	});
}

function shipsDrag()
{
	$('.ship-preview table').draggable({
		start: function(event, ui) {
			$(this).parent().append($(this).clone());
			shipsDrag();
		},
		stop: function(event, ui) {
			var position = $(this).find('tr:first td:first').offset();
			var mapPoint = $(document.elementFromPoint(position.left, position.top));
			var case_on = mapPoint.attr('id');
			var name = $(this).attr('data-shipname');
			var player = $(this).closest('.select-ship').attr('player-id');
			var x = $(this).attr('data-x');
			var y = $(this).attr('data-y');

			$(this).remove();
			if (!(typeof case_on !== 'undefined' && case_on.match(/case_/)))
				return ;
			registerShip(parseInt(case_on.split('_')[1]), name, player, x, y);
			console.log('on map');
		}
	})
}

function initSpaceShips(ships)
{
	for (var key in ships) {
		var content;

		console.log(ships[key]);
		content = '<div class="row"><div class="col-lg-3 ship-preview ship"><table data-x="'+ships[key].x+'" data-y="'+ships[key].y+'" data-shipname="'+ships[key].name+'">'+
		generateCases(ships[key])+
		'</table></div><div class="col-lg-9 ship-info ship">'+printInfo(ships[key])+'</div>'+
		'</div>';
		$('.select-ship').append(content);
	}
	shipsDrag();
}


function generateCases(ship)
{
	var x = ship.x;
	var y = ship.y;
	var cases;

	cases = '';
	for (var i = y - 1; i >= 0; i--) {
		cases += '<tr>';
		for (var j = x - 1; j >= 0; j--) {
			cases += '<td class="ship-preview-case ship-color-'+ship.name+'"></td>';
		}
		cases += '</tr>';
	}
	return cases;
}

function printInfo(ship)
{
	var infos;

	infos = 'Name : '+ship.name+'<br>';
	infos += 'Shell : '+ship.shell+'<br>';
	infos += 'Shield : '+ship.shield+'<br>';
	infos += 'Speed : '+ship.speed+'<br>';
	infos += 'Width : '+ship.x+'00 meters<br>';
	infos += 'Length : '+ship.y+'00 meters<br>';

	return infos;
}
console.log(players);
initSpaceShips(ships);
console.log(map);
printMap(map);