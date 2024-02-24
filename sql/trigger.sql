
DELIMITER $$
DROP PROCEDURE
IF
	EXISTS gugus_message$$ CREATE PROCEDURE gugus_message ( signatures VARCHAR ( 255 ), timestamp datetime, ip_src DOUBLE, ip_dst DOUBLE, ip_proto DOUBLE ) BEGIN
		
		SET @result = sys_exec (
		CONCAT( 'curl -XGET "https://local.dev/ids-snort-telegram/snort.php?ip_src=', ip_src, '&ip_dst=', ip_dst, '&ip_proto=', ip_proto, '&timestamp=', TIMESTAMP, ' "' ));
	
END $$ DROP TRIGGER
IF
	EXISTS gugus_message_trigger$$ CREATE TRIGGER `gugus_message_trigger` AFTER INSERT ON `acid_event` FOR EACH ROW
BEGIN
		CALL gugus_message ( NEW.sig_name, NEW.timestamp, NEW.ip_src, NEW.ip_dst, NEW.ip_proto );
	
END;
$$DELIMITER;