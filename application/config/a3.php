<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
##################################################################################################
//HOMEPAGE SECTION.
//server name
$config['homepage'] = 'YOUR SERVER NAME';

//URL of your homepage
$config['homepage_url'] = 'HOMEPAGE URL';		//EXAMPLE = http://a3ncabal.dyndns.info/a3/

//forum URL
$config['forum_url'] = 'FORUM URL';		//http://a3ncabal.dyndns.info/

##################################################################################################
//SERVER STATUS.
//experience rate
$config['Exp_Rate'] = 5;

//quest experience rate
$config['QuestExp_Rate'] = 20;

//drop rate
$config['Drop_Rate'] = 5;

//woonz rate
$config['Wz_Rate'] = 5;

##################################################################################################
//MAILER CONFIGURATIONS
//pop3 server and port
$config['pop3_server'] = 'pop.gmail.com';
$config['pop3_port'] = 995;

//smtp server
$config['SMTP_auth'] = TRUE;
$config['smtp_server'] = 'smtp.gmail.com';
$config['smtp_port'] = 465;
$config['SMTP_Secure'] = 'ssl';

//email account from sender associated to the pop3 n smtp server settings.
$config['username'] = 'YOUR GMAIL USERNAME';
$config['password'] = 'YOUR GMAIL PASSWORD';

//other things related to mailer
$config['addreplyto_email'] = 'YOUR EMAIL';
$config['addreplyto_name'] = 'YOUR NAME';
$config['from'] = 'YOUR EMAIL';
$config['from_name'] = 'YOUR NAME';

##################################################################################################
//GAMESERVER PORT.
//this is your server IP, mostly you don't need to change this IP if your webhosting is the same with your gameserver
$config['srvip'] = 'YOUR GAMESERVER IP';

//zoneserver port. if ur webserver is diiferent from your gameserver, dont forget to open this port at your gameserver.
$config['svrportZone'] = '6689';

//loginserver port. if ur webserver is diiferent from your gameserver, dont forget to open this port at your gameserver.
$config['svrportlogin'] = '3210';

//battleserver port. if ur webserver is diiferent from your gameserver, dont forget to open this port at your gameserver.
$config['svrportbattle'] = '6999';

//accountserver port. if ur webserver is diiferent from your gameserver, dont forget to open this port at your gameserver.
$config['svrportaccount'] = '5589';
##################################################################################################
//REBIRTH SECTION.
//at level what player can start use rebirth. default is 150 but be careful. don't make your player have too many stats cos of rebirth system.
$config['rebirth_level'] = '150';

//wz that needed for rebirth.
$config['rebirth_wz'] = '100000000';
##################################################################################################
//RESET REBIRTH SECTION.
//at what rebirth level your players can take reset rebirth. default is at rebirth 15.
$config['rebirth_count'] = '16';

//how much wz it needs for a reset rebirth, default is 2b.
$config['wzresetrebirth'] = '2000000000';
##################################################################################################
//EQUIP SSS SECTION
//wz for equipping sss. default is 500m.
$config['wz_sss'] = '500000000';
##################################################################################################
//MERCENARY REBIRTH SECTION.
//at what level mercenary can start rebirth.
$config['merclvlrb'] = '150';

//wz needed for rebirth.
$config['mercwzrb'] = '1000000';
##################################################################################################
//MERCENARY RESET REBIRTH.
//at what level your player's mercenary can start using reset rb for their mercenary.
$config['mercresetlvl'] = '300';

//at what level rebirth your player merceneray can use rebirth.
$config['mercrblevel'] = '16';

//wz needed for merc reset level
$config['mercwzreset'] = '2000000000';

//max reset rebirth for mercenary can take.
$config['mercmaxresetrb'] = '6';
##################################################################################################
//BUY SKILL.
//how much wz you wanna charge your players. default is 150000000.
$config['skillwz'] = '150000000';

//at what level players can start to buy skill. default is 125.
$config['skilllvl'] = '125';
##################################################################################################
//LORE SECTION.
//how much wz you wanna sell for 1 lore, default is 1 lore = 100wz.
$config['buy_lore'] = '100';

//at what rb can start buy lore, default is 5.
$config['lore_rb_buy'] = '5';
##################################################################################################
//PAID MEMBERSHIP AND SALARY.
//give the name of your choice for the following paid membership type.
$config['BM'] = 'Bronze Membership';
$config['SM'] = 'Silver Membership';
$config['GoldM'] = 'Gold Membership';

//payment associate to the type of membership.
$config['BMP'] = '500000000';
$config['SMP'] = '1000000000';
$config['GoldMP'] = '1500000000';
##################################################################################################
//BANNING AN ACCOUNT SECTION.
//secret password that will be use to ban an account.
$config['secret_password'] = 'BANNED_ACCOUNT';
##################################################################################################
?>