<?php
#############################################################################################################################

//return whole edited value of the c_headera
function char_stat($str, $int, $dex, $vit, $mana, $points, $stat)
	{
		$stat_temp = explode (';', $stat);
		$stat_temp[0] = $str;
		$stat_temp[1] = $int;
		$stat_temp[2] = $dex;
		$stat_temp[3] = $vit;
		$stat_temp[4] = $mana;
		$stat_temp[5] = $points;
		return implode(';', $stat_temp);
	};

//return part of the string from c_headera
function char_attrib($attrib, $stat)
	{
		$stat_temp = explode (';', $stat);
		switch($attrib)
			{
				case 'STR':
					return $stat_temp[0];
				break;

				case 'INT':
					return $stat_temp[1];
				break;

				case 'DEX':
					return $stat_temp[2];
				break;

				case 'VIT':
					return $stat_temp[3];
				break;

				case 'MANA':
					return $stat_temp[4];
				break;

				case 'POINTS':
					return $stat_temp[5];
				break;
			}
	}
//*/
#############################################################################################################################

?>