<?php 
/*
###################################################################################
#																				  #
#							phpMyIntranet V1.0 									  #
#																				  #
###################################################################################
#																				  #
#							fichier de classe : DB	                  			  #
#                           Créé sous licence GNU                               #
#      			 			Auteur : Rémi FRITZEN rfritzen@gmail.com             #
#																				  #
###################################################################################
*/
include ('config/setupdb.php');
class DB
{
	function setCo($host=HOST,$user=USER,$mdp=MDP,$db=DB) {
		$this->host 	= $host;
		$this->user 	= $user;
		$this->mdp 		= $mdp;
		$this->db		= $db;
		
		
	}

	function stay_connected() {
	
	$this -> stay = 1;
	$this -> linked = $this -> connexion();
	}

	function connexion()
	{

		if (!isset($this->host))
		$this -> setCo ();

		$idconnect = mysql_connect($this->host,$this->user,$this->mdp);
		$dbsel = mysql_select_db($this->db);
		mysql_query("SET NAMES 'utf8'");
		if (DEBUG==1) {
			if (!$idconnect)
			return mysql_error();
			elseif (!$dbsel)
			return mysql_error();
			else
			return true;
		}
	return true;
	}
	
	function close() {
		mysql_close();
	}
	
	//Inserts in the data base $aFields is an array : $aFields ['FieldName'] = 'Value'
	function insert($table,$aFields,$log = 1)
	{
	
		if (isset($this->stay) && $this->stay === 1)
		$link = $this -> linked;
		else
		$link = $this -> connexion();

		
		
		if ($link)
		{
			//Builds the array of the keys
			$infields= array_keys($aFields);
			//array_walk($aFields,'addslashes');

			foreach ($aFields as $key => $val) {
				if (strpos($aFields[$key],"'") >=0) {
					$aFields[$key] = mysql_real_escape_string($aFields[$key]);
				}
			}
			
			//Builds the SQL request
			$values = implode("','",$aFields);
			$infields = implode('`,`',$infields);
			$SQL = "INSERT INTO " . $table . "(`" . $infields . "`) VALUES ('" . $values . "')";

			$RS = mysql_query($SQL);



			if ($RS) {
				$id = mysql_insert_id();// Auto increment fields in the table must not be BigInt
				if (!isset($this->stay)) {
				mysql_close(); 
				}

				if ($log == 1) {
					$aLog_fields = array(
					"Date" 	=> time(),
					"Type" 	=> "insert",
					"Table"	=> $table,
					"SQL" 	=> $SQL
					);
					$this->insert('logs',$aLog_fields,0);


				}

				return $id;
			}

			$error = mysql_error();
			if (!isset($this->stay)) {
			mysql_close();
			}
			
			elseif(DEBUG===1)
			return $error . '<br>SQL : ' . $SQL;
		}
		elseif(DEBUG===1)
		return mysql_error();


	}

	//returns all the data in a single table with a where clause
	function dataSelAll($table,$where,$order = '', $offset = 0, $limit = 0)
	{
		
		
		if (isset($this->stay) && $this->stay === 1)
		$link = $this -> linked;
		else
		$link = $this -> connexion();


		if ($link)
		{
			
			//Builds SQL request
			$SQL = 'SELECT * FROM ' . $table .' '. $where;

			if ($order != '')
			$SQL .= ' ORDER BY ' . $order;

			$RS = mysql_query ($SQL);

			//total_values is a reserved key of the dataSet array
			$dataSet['total_values'] = mysql_num_rows($RS);


			//a reserved key to return the total of records
			if ($limit > 0)
			{

				$dataSet['global_total_values'] = $dataSet['total_values'];

				$SQL .= ' LIMIT ' . $offset . ',' . $limit;
				$RS = mysql_query ($SQL);

				if ($dataSet['total_values'] % $limit == 0)
				$mod = 1;
				else
				$mod = 0;


				$dataSet['total_pages'] = ceil($dataSet['total_values']/$limit);
				$dataSet['curr_page'] = ($offset / $limit) + 1;

				$dataSet['total_values'] = $limit -($dataSet['curr_page'] * $limit - $dataSet['total_values']);
				if ($dataSet['total_values'] > $limit)
				$dataSet['total_values'] = $limit;
			}
			$i =0;
			while ($row = mysql_fetch_array($RS, MYSQL_ASSOC)) {
				$dataSet[$i] = $row;
				$i++;
			}

			if (DEBUG ===1)
			$dataSet['sql']=$SQL;
			
			
			if(!$RS && DEBUG===1) {
				return  "Error in the SQL syntax: ".$SQL.' ('.mysql_error().')';
			}

			

			mysql_free_result($RS);
			if (!isset($this->stay)) {
			mysql_close();
			} 
			return $dataSet;
			

		}
		elseif(DEBUG===1)
		return mysql_error();


	}

	//returns all the data from  a complex sql request
	function dataSelComplex($SQL,$order = '', $offset = 0, $limit = 0)
	{

		
		if (isset($this->stay) && $this->stay === 1)
		$link = $this -> linked;
		else
		$link = $this -> connexion();
		
		if ($link)
		{
			//Builds SQL request

			if ($order != '')
			$SQL .= mysql_real_escape_string(' ORDER BY ' . $order);

			$RS = mysql_query ($SQL);



			//total_values is a reserved key of the dataSet array
			$dataSet['total_values'] = mysql_num_rows($RS);
			$dataSet['global_total_values'] = $dataSet['total_values'];

			//retiurns the total number of pages and the current page
			if ($limit > 0)
			{

				$dataSet['global_total_values'] = $dataSet['total_values']; //a reserved key to return the total of records

				$SQL .= ' LIMIT ' . $offset . ',' . $limit;
				$RS = mysql_query ($SQL);

				if ($dataSet['total_values'] % $limit == 0)
				$mod = 1;
				else
				$mod = 0;


				$dataSet['total_pages'] = ceil($dataSet['total_values']/$limit);
				$dataSet['curr_page'] = ($offset / $limit) + 1;

				$dataSet['total_values'] = $limit -($dataSet['curr_page'] * $limit - $dataSet['total_values']);
				if ($dataSet['total_values'] > $limit)
				$dataSet['total_values'] = $limit;
			}

			$i =0;
			while ($row = mysql_fetch_array($RS, MYSQL_ASSOC)) {
				$dataSet[$i] = $row;
				++$i;
			}

			if (DEBUG ===1) {
				$dataSet['sql']=$SQL;
			}
			
			if(!$RS && DEBUG===1) {
				echo  "Error in the SQL syntax: ".mysql_error().'('.$SQL.')';
			}


			
			//echo  $SQL;
			mysql_free_result($RS);
			if (!isset($this->stay)) {
				mysql_close(); 
				}
			return $dataSet;

		}
		elseif(DEBUG===1)
		return mysql_error();
	

	}


	function update($table,$where,$aFields,$log = 1) {
		if ($log === 1)
		$RS2 = $this->dataSelAll($table,$where);

		if (isset($this->stay) && $this->stay === 1)
		$link = $this -> linked;
		else
		$link = $this -> connexion();
		
		if ($link)
		{

			//Builds the SQL request
			$SQL = "UPDATE " . $table . " SET ";

			$count = 0;
			foreach ($aFields as $key => $value)
			{
				if ($count > 0)
				$SQL .= ",";
				$SQL .= "" . $key . " = '" . mysql_real_escape_string($value) . "'";
				++$count ;
			}

			$SQL .= " " . $where;
			//-----------------------


			$RS = mysql_query($SQL);
			$error = mysql_error();
			if (!isset($this->stay)) {
				mysql_close(); 
				}
			if ($log == 1) {


				$k = 0;

				$old_value = "";

				foreach ($RS2[0] as $key => $value) {
					if ($k>0)
					$old_value.=",";
					$old_value .= $key . " = '". $value. "'";
					$k++;
				}

				$aLog_fields = array(
				"Date" 		=> time(),
				"Type" 		=> "update",
				"OldValue"	=> $old_value,
				"Table_logs"=> $table,
				"SQL" 		=> $SQL
				);
				$this->insert('logs',$aLog_fields,0);
			}
			

			if (!$RS && DEBUG===1)
			return $error . 'SQL : ' . $SQL;
			else
			return "OK";
		}
		else
		return mysql_error();




	}

	function delete($table,$where,$log=1)
	{
		$old_value ='';
		if ($log === 1)
		$RS2 = $this->dataSelAll($table,$where);

		if (isset($this->stay) && $this->stay === 1)
		$link = $this -> linked;
		else
		$link = $this -> connexion();

		if ($link)
		{

			//Builds the SQL request
			$SQL = "DELETE FROM " . $table .' '. $where;


			$RS = mysql_query($SQL);
			if (!isset($this->stay)) {
				mysql_close(); 
				}
				
			if ($log == 1) {

				$k=0;
				if ($RS2 ['total_values'] >0) {
					foreach ($RS2[0] as $key => $value) {
						if ($k>0)
						$old_value.=",";
						$old_value .= $key . " = '". $value. "'";
						$k++;
					}
				}

				$aLog_fields = array(
				"Date" 	=> time(),
				"Type" 	=> "delete",
				"OldValue"	=> $old_value,
				"Table_logs"=> $table,
				"SQL" 	=> $SQL
				);
				$this->insert('logs',$aLog_fields,0);
			

			}
			
			if (!$RS && DEBUG===1)
			return mysql_error() . 'SQL : ' . $SQL;
			else
			return "OK";
		}
		else
		return mysql_error();




	}




	function numRows($SQL)
	{

		if (isset($this->stay) && $this->stay === 1)
		$link = $this -> linked;
		else
		$link = $this -> connexion();

		if ($link)
		{
			$RS = mysql_query($SQL);
			
			if (!isset($this->stay)) {
				mysql_close(); 
				}
			if ($RS)
			return mysql_num_rows($RS);
			elseif(DEBUG===1)
			return mysql_error() . 'SQL : ' . $SQL;
		}
		else
		return mysql_error();


	}
	
	
	function secureMySQL($aTable) {
		$link = $this -> connexion();
		if ($link) {
			foreach ($aTable as $key => $val) {	
				$aTable[$key] = mysql_real_escape_string($val);
			}
		}
			
		$this->close();
		
		
	}


}
?>
