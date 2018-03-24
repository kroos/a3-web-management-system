<?php
#############################################################################################################################

//return value of the mbody part
function hsbody_part($attrib, $mbody)
	{
		$temp = preg_split("/[\s]+/", $mbody);
		switch ($attrib)
			{
				case 'SKILL' :
					$SKILL = explode('=',$temp[0]);
					return $SKILL[1];
				break;

				case 'PK' :
					$PK = explode('=',$temp[1]);
					return $PK[1];
				break;

				case 'WEAR' :
					$WEAR = explode('=',$temp[2]);
					return $WEAR[1];
				break;

				case 'OPTION' :
					$OPTION = explode('=',$temp[3]);
					return $OPTION[1];
				break;
			}
	};

//return the whole  modified string
function hsbody_insert($attrib, $newstring, $mbody)
	{
		$temp = preg_split("/[\s]+/", $mbody);
		switch ($attrib)
			{
				case 'SKILL' :
					$SKILL = explode('=',$temp[0]);
					$SKILL[1] = $newstring;
					$temp[0] = implode('=', $SKILL);
				break;

				case 'PK' :
					$PK = explode('=',$temp[1]);
					$PK[1] = $newstring;
					$temp[1] = implode('=', $PK);
				break;

				case 'WEAR' :
					$WEAR = explode('=',$temp[2]);
					$WEAR[1] = $newstring;
					$temp[2] = implode('=', $WEAR);
				break;

				case 'OPTION' :
					$OPTION = explode('=',$temp[3]);
					$OPTION[1] = $newstring;
					$temp[3] = implode('=', $OPTION);
				break;

			}
		return implode(' ', $temp);
	};
//*/
#############################################################################################################################

?>