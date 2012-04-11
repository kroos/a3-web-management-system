<?php
#############################################################################################################################
///*
function m_body_string($attrib, $newstring, $string)
	{
		$temp = explode('\_1', $string);
		switch ($attrib)
			{
				case 'EXP' :
					$EXP = explode('=',$temp[0]);
					$EXP[1]=$newstring;
					$temp[0] = implode('=', $EXP);
				break;

				case 'SKILL' :
					$SKILL = explode('=',$temp[1]);
					$SKILL[1]=$newstring;
					$temp[1] = implode('=', $SKILL);
				break;

				case 'PK' :
					$PK = explode('=',$temp[2]);
					$PK[1]=$newstring;
					$temp[2] = implode('=', $PK);
				break;

				case 'RTM' :
					$RTM = explode('=',$temp[3]);
					$RTM[1]=$newstring;
					$temp[3] = implode('=', $RTM);
				break;

				case 'SINFO' :
					$SINFO = explode('=',$temp[4]);
					$SINFO[1]=$newstring;
					$temp[4] = implode('=', $SINFO);
				break;

				case 'WEAR' :
					$WEAR = explode('=',$temp[5]);
					$WEAR[1]=$newstring;
					$temp[5] = implode('=', $WEAR);
				break;

				case 'INVEN' :
					$INVEN = explode('=',$temp[6]);
					$INVEN[1]=$newstring;
					$temp[6] = implode('=', $INVEN);
				break;

				case 'PETINV' :
					$PETINV = explode('=',$temp[7]);
					$PETINV[1]=$newstring;
					$temp[7] = implode('=', $PETINV);
				break;

				case 'CQUEST' :
					$CQUEST = explode('=',$temp[8]);
					$CQUEST[1]=$newstring;
					$temp[8] = implode('=', $CQUEST);
				break;

				case 'WAR' :
					$WAR = explode('=',$temp[9]);
					$WAR[1]=$newstring;
					$temp[9] = implode('=', $WAR);
				break;

				case 'SQUEST' :
					$SQUEST = explode('=',$temp[10]);
					$SQUEST[1]=$newstring;
					$temp[10] = implode('=', $SQUEST);
				break;


					/*
					
					
					
					$FAVOR = explode('=',$temp[11]);
					$PSKILL = explode('=',$temp[12]);
					$SKLSLT = explode('=',$temp[13]);
					$CHATOPT = explode('=',$temp[14]);
					$TYR = explode('=',$temp[15]);
					$SKILLEX = explode('=',$temp[16]);
					$SKLSLTEX = explode('=',$temp[17]);
					$PETACT = explode('=',$temp[18]);
					$LORE = explode('=',$temp[19]);
					$LQUEST = explode('=',$temp[20]);
					$RESRV0 = explode('=',$temp[21]);
					$RESRV1 = explode('=',$temp[22]);
					*/
			}
		return implode('\_1', $temp);
	};
//*/
#############################################################################################################################

?>