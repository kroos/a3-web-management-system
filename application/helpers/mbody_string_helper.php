<?php
#############################################################################################################################
//return the whole  modified string
function mbody_insert($attrib, $newstring, $string)
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

				case 'FAVOR' :
					$FAVOR = explode('=',$temp[11]);
					$SQUEST[1]=$newstring;
					$temp[11] = implode('=', $FAVOR);
				break;

				case 'PSKILL' :
					$PSKILL = explode('=',$temp[12]);
					$PSKILL[1]=$newstring;
					$temp[12] = implode('=', $PSKILL);
				break;

				case 'SKLSLT' :
					$SKLSLT = explode('=',$temp[13]);
					$SKLSLT[1]=$newstring;
					$temp[13] = implode('=', $SKLSLT);
				break;

				case 'CHATOPT' :
					$CHATOPT = explode('=',$temp[14]);
					$CHATOPT[1]=$newstring;
					$temp[14] = implode('=', $CHATOPT);
				break;

				case 'TYR' :
					$TYR = explode('=',$temp[15]);
					$TYR[1]=$newstring;
					$temp[15] = implode('=', $TYR);
				break;

				case 'SKILLEX' :
					$SKILLEX = explode('=',$temp[16]);
					$SKILLEX[1]=$newstring;
					$temp[16] = implode('=', $SKILLEX);
				break;

				case 'SKLSLTEX' :
					$SKLSLTEX = explode('=',$temp[17]);
					$SKLSLTEX[1]=$newstring;
					$temp[17] = implode('=', $SKLSLTEX);
				break;

				case 'PETACT' :
					$PETACT = explode('=',$temp[18]);
					$PETACT[1]=$newstring;
					$temp[18] = implode('=', $PETACT);
				break;

				case 'LORE' :
					$LORE = explode('=',$temp[19]);
					$LORE[1]=$newstring;
					$temp[19] = implode('=', $LORE);
				break;

				case 'LQUEST' :
					$LQUEST = explode('=',$temp[20]);
					$LQUEST[1]=$newstring;
					$temp[20] = implode('=', $LQUEST);
				break;

				case 'RESRV0' :
					$RESRV0 = explode('=',$temp[21]);
					$RESRV0[1]=$newstring;
					$temp[21] = implode('=', $RESRV0);
				break;

				case 'RESRV1' :
					$RESRV1 = explode('=',$temp[22]);
					$RESRV1[1]=$newstring;
					$temp[22] = implode('=', $RESRV1);
				break;
			}
		return implode('\_1', $temp);
	};

//return value of the mbody part
function mbody_part($attrib, $string)
	{
		$temp = explode('\_1', $string);
		switch ($attrib)
			{
				case 'EXP' :
					$EXP = explode('=',$temp[0]);
					return $EXP[1];
				break;

				case 'SKILL' :
					$SKILL = explode('=',$temp[1]);
					return $SKILL[1];
				break;

				case 'PK' :
					$PK = explode('=',$temp[2]);
					return $PK[1];
				break;

				case 'RTM' :
					$RTM = explode('=',$temp[3]);
					return $RTM[1];
				break;

				case 'SINFO' :
					$SINFO = explode('=',$temp[4]);
					return $SINFO[1];
				break;

				case 'WEAR' :
					$WEAR = explode('=',$temp[5]);
					return $WEAR[1];
				break;

				case 'INVEN' :
					$INVEN = explode('=',$temp[6]);
					return $INVEN[1];
				break;

				case 'PETINV' :
					$PETINV = explode('=',$temp[7]);
					return $PETINV[1];
				break;

				case 'CQUEST' :
					$CQUEST = explode('=',$temp[8]);
					return $CQUEST[1];
				break;

				case 'WAR' :
					$WAR = explode('=',$temp[9]);
					return $WAR[1];
				break;

				case 'SQUEST' :
					$SQUEST = explode('=',$temp[10]);
					return $SQUEST[1];
				break;

				case 'FAVOR' :
					$FAVOR = explode('=',$temp[11]);
					return $SQUEST[1];
				break;

				case 'PSKILL' :
					$PSKILL = explode('=',$temp[12]);
					return $PSKILL[1];
				break;

				case 'SKLSLT' :
					$SKLSLT = explode('=',$temp[13]);
					return $SKLSLT[1];
				break;

				case 'CHATOPT' :
					$CHATOPT = explode('=',$temp[14]);
					return $CHATOPT[1];
				break;

				case 'TYR' :
					$TYR = explode('=',$temp[15]);
					return $TYR[1];
				break;

				case 'SKILLEX' :
					$SKILLEX = explode('=',$temp[16]);
					return $SKILLEX[1];
				break;

				case 'SKLSLTEX' :
					$SKLSLTEX = explode('=',$temp[17]);
					return $SKLSLTEX[1];
				break;

				case 'PETACT' :
					$PETACT = explode('=',$temp[18]);
					return $PETACT[1];
				break;

				case 'LORE' :
					$LORE = explode('=',$temp[19]);
					return $LORE[1];
				break;

				case 'LQUEST' :
					$LQUEST = explode('=',$temp[20]);
					return $LQUEST[1];
				break;

				case 'RESRV0' :
					$RESRV0 = explode('=',$temp[21]);
					return $RESRV0[1];
				break;

				case 'RESRV1' :
					$RESRV1 = explode('=',$temp[22]);
					return $RESRV1[1];
				break;
			}
	};
//*/
#############################################################################################################################

?>