<?php
    	set_time_limit(0);
    	class phpMailIt 
    	{ 
    		var $_serv;
    		var $_port;
    		var $_usern;
    		var $_pass;
    		var $_to;
    		var $_subj;
    		var $_body;
    		var $_socket; 
    		var $_debug	= 1;
    		var $_app_name	= 'phpMailIt';
    		var $_app_desc	= 'Web E-Mail';
    		var $_app_ver 	= '1.0';
    		function pop3_init ($server, $port, $username, $password)
    		{
    			$this->_serv = $server;
    			$this->_port = (int)$port;
    			$this->_usern = $username;
    			$this->_pass = $password;
    		} 
    		function pop3_connect () 
    		{ 
    			if ($this->_serv == "")
    				$this->mail_output("Hostname was not specified.");
    			if ($this->_debug)
    				$this->mail_output("Connecting to ".$this->_serv." ...");
    			$this->_socket = fsockopen($this->_serv,$this->_port);
    		}
    		function pop3_login ()
    		{
    			$_mail_get = $this->mail_get();
    			if ($this->mail_write("USER $this->_usern") == 0)
    				return("Could not send the USER command");
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$parse = explode(" ", $_mail_get);
    			if ($parse[0] != "+OK")
    				return("User error: authentication with USER command.");
    			if ($this->mail_write("PASS $this->_pass") == 0)
    				return("Could not send the PASS command");
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$parse = explode(" ", $_mail_get);
    			if ($parse[0] != "+OK")
    				return("User error: authentication with PASS command.");
    		}
    		function pop3_check_messages()
    		{
    			if ($this->mail_write("STAT") == 0)
    				return("Could not send the STAT command");
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$parse = explode(" ", $_mail_get);
    			if ($parse[0] != "+OK")
    				return("Error: issues with STAT.");
    			if ($this->_debug)
    				$this->mail_output($parse[1]);
    			if ($parse[1] == 0)
    				if ($this->_debug)
    					$this->mail_output("No new mail");
    			for ($x = 1; $x <= $parse[1]; $x++)
    			{
    				$pop3_from[$x] = "";
    				$pop3_to[$x] = "";
    				$pop3_subject[$x] = "";
    				$pop3_date[$x] = "";
    				$pop3_received[$x] = "";
    				$pop3_xmailer[$x] = "";
    				$pop3_body[$x] = "";
    				if ($this->mail_write("RETR $x") == 0)
    					return("Could not send the RETR command");
    	
    				while (($_mail_get = $this->mail_get()) != ".")
    				{
    					if ($this->_debug)
    						$this->mail_output($_mail_get);
    					$_mail_get_parse = explode(" ", $_mail_get);
    					switch (strtolower($_mail_get_parse[0]))
    					{
    						case "from:":
    							$pop3_from[$x] = $_mail_get_parse[1];
    							break;
    						case "to:":
    							$pop3_to[$x] = substr($_mail_get,3,strlen($_mail_get)-3);
    							break;
    						case "subject:":
    							$pop3_subject[$x] = substr($_mail_get,8,strlen($_mail_get)-8);
    							break;
    						case "date:":
    							$pop3_date[$x] = substr($_mail_get,5,strlen($_mail_get)-5);
    							break;
    						case "received:":
    							$pop3_received[$x] = substr($_mail_get,9,strlen($_mail_get)-9);
    							break;
    						case "x-mailer:":
    							$pop3_xmailer[$x] = substr($_mail_get,9,strlen($_mail_get)-9);
    							break;
    						case "+ok":
    							break;
    						default:
    							$pop3_body[$x] .= $_mail_get . "\n\r";
    					}
    				}
    				if ($this->_debug)
    				{
    					$this->mail_output("To: ". $pop3_to[$x]);
    					$this->mail_output("From: ". $pop3_from[$x]);
    					$this->mail_output("Subject: ". $pop3_subject[$x]);
    					$this->mail_output("Date: ". $pop3_date[$x]);
    					$this->mail_output("Received: ". $pop3_received[$x]);
    					$this->mail_output("X-Mailer: ". $pop3_xmailer[$x]);
    					$this->mail_output("Body: <PRE>". $pop3_body[$x] . "</PRE>");
    					$this->mail_output("<br><br><br><b>LINE BREAK</b><br><br><br>");
    				}
    			}
    		}
    		function pop3_delete_messages ($message_numbers)
    		{
    			for ($x = 0; $message_numbers[$x]; $x++)
    			{
    				if ($this->mail_write("DELE $message_numbers[$x]") == 0)
    					return("Could not send the DELE command");
    				$_mail_get = $this->mail_get();
    				if ($this->_debug)
    					$this->mail_output($_mail_get);
    			}
    		}
    		function smtp_init ($server, $port)
    		{
    			$this->_serv = $server;
    			$this->_port = (int)$port;
    		} 
    		function smtp_connect () 
    		{ 
    			if ($this->_serv == "")
    				$this->mail_output("Hostname was not specified.");
    			if ($this->_debug)
    				$this->mail_output("Connecting to ".$this->_serv." ...");
    			$this->_socket = fsockopen($this->_serv,$this->_port);
    		}
    		function smtp_hand_shake ()
    		{ 
    			$helo = 'HELO $' . 'host';
    			if ($this->mail_write($helo) == 0)
    				return("Could not send the HELO command");
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$parse = explode(" ", $_mail_get);
    			if (($parse[0] != "250") or ($parse[0] != "220"))
    				return ("Could not continue with hand shake");
    		}
    		function smtp_send_email ($from, $to, $subject, $body) 
    		{
    			if ($this->mail_write("MAIL FROM: $from") == 0)
    				return("Could not send the MAIL FROM command");
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$parse = explode(" ", $_mail_get);
    			if ($parse[0] != "250")
    				return("User error: problems with sending email.");
    			if ($this->mail_write("RCPT TO: $to") == 0)
    				return("Could not send the RCPT command");
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$parse = explode(" ", $_mail_get);
    			if ($parse[0] != "250")
    				return("User error: problems with sending email.");
    			if ($data_already_sent == 0)
    				if ($this->mail_write("DATA") == 0)
    					return("Could not send the DATA command");
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$parse = explode(" ", $_mail_get);
    			if (($parse[0] == "250") or ($parse[0] == "220") or ($parse[0] == "354"))
    			{
    				$this->mail_write("X-Mailer: $this->_app_name - $this->_app_desc Version: $this->_app_ver");
    				$this->mail_write("FROM: $from");
    				$this->mail_write("TO: $to");
    				$this->mail_write("Subject: $subject");
    				$this->mail_write("$body");
    				$this->mail_write(".");
    			}
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    			$data_already_sent = 1;
    		}
    		function mail_output ($print)
    		{
    			return;
    		}
    		function mail_quit ()
    		{
    			$this->mail_write("QUIT");
    			$_mail_get = $this->mail_get();
    			if ($this->_debug)
    				$this->mail_output($_mail_get);
    		}
    		function mail_write ($data) 
    		{
    			if ($this->_debug)
    				$this->mail_output ($data);
    			return(fputs ($this->_socket, $data . "\r\n"));
    		} 
    		function mail_get()
    		{
    			for ($line="";;)
    			{
    				if (feof($this->_socket))
    					return(0);
    				$line .= fgets($this->_socket,100);
    				$length = strlen($line);
    				if (($length >= 2) && (substr($line,$length-2,2) == "\r\n"))
    				{
    					$line = substr($line,0,$length-2);
    					return($line);
    				}
    			}
    		}
    	}
  $array[0] = new phpMailIt;
  $array[0]->smtp_init ("localhost", 25);
  $array[0]->smtp_connect (); 
  $array[0]->smtp_hand_shake ();
  $fullname=$HTTP_POST_VARS["fullname"];
  $add=$HTTP_POST_VARS["add"];
  $country=$HTTP_POST_VARS["country"];
  $tel=$HTTP_POST_VARS["tel"];
  $fax=$HTTP_POST_VARS["fax"];
  $email=$HTTP_POST_VARS["email"];
  $content=$HTTP_POST_VARS["content"];
  $message="Register Info:\n\n";
  $message.="Fullname: ".$fullname."\n";
  $message.="Address: ".$add."\n";
  $message.="Country: ".$country."\n";
  $message.="Tel: ".$tel."\n";
  $message.="Fax: ".$fax."\n";
  $message.="Email: ".$email."\n";
  $message.="Content: ".$content."\n";
  $headers= "From: ".$email."\r\n";
  $array[0]->smtp_send_email ($email, "cuongdk@kctvietnam.com", "Lien he!", $message);
  $array[0]->mail_quit ();
?>
<script language='javascript'>window.location='index.php';;</script>;