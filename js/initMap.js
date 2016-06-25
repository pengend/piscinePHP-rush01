
function generateCases(ship)
{
	var x = ship.x;
	var y = ship.y;
	var cases;

	cases = '';
	for (var i = y - 1; i >= 0; i--) {
		cases += '<tr>';
		for (var j = x - 1; j >= 0; j--) {
			cases += '<td class="ship-preview-case"></td>';
		}
		cases += '</tr>';
	}
	return cases;
}

function printInfo(ship)
{
	
}

function initSpaceShips(ships)
{
	for (var key in ships) {
		var content;

		content = '<div class="row"><div class="col-lg-3 ship-preview ship"><table>'+
		generateCases(ships[key])+
		'</table></div><div class="col-lg-9 ship-info ship"></div>'+
		'</div>';
		$('.select-ship').append(content);
	}
}

initSpaceShips(ships);
