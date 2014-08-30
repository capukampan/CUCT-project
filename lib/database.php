<?

/**** Class Database ****/
Class MyDatabase{
/**** function connect to database ****/

	function MyDatabase($strHost,$strDB,$strUser,$strPassword){
		$this->objConnect = mysql_pconnect($strHost,$strUser,$strPassword);
		$this->DB = mysql_select_db($strDB);
		$this->lang = mysql_query("SET NAMES UTF8");
	}

	/**** function insert record ****/

	function insertRecord($strTable,$strField,$strValue){
		$strSQL = "INSERT INTO $strTable ($strField) VALUES ($strValue) ";
		//print $strSQL;
		return @mysql_query($strSQL);
	}

	/**** function select record ****/

	function selectCount($field,$strTable,$strCondition){
		$strSQL = "SELECT count($field) as number FROM $strTable WHERE $strCondition ";
		//print $strSQL;
		$objQuery = @mysql_query($strSQL);
		return @mysql_fetch_array($objQuery);
	}
	
	function selectCondition($strField,$strTable,$strCondition){
		$strSQL = "SELECT $strField FROM $strTable WHERE $strCondition ";
		//print $strSQL;
		$objQuery = @mysql_query($strSQL);
		return @mysql_fetch_array($objQuery);
	}
	
	function selectAll($strField,$strTable,$strSort){
		$strSQL = "SELECT $strField FROM $strTable ORDER BY $strSort ";
		//print $strSQL;
		return @mysql_query($strSQL);
	}

	function selectAllwithCondition($strField,$strTable,$strWhere,$strSort){
		$strSQL = "SELECT $strField FROM $strTable WHERE $strWhere ORDER BY $strSort ";
		//print $strSQL;
		return @mysql_query($strSQL);
	}
	
	function selectNumField($query){
		//print @mysql_num_fields($query);
		return @mysql_num_fields($query);
	}

	function selectArrayField($query){
		return @mysql_fetch_array($query);
	}

	function selectFetchAssoc($query){
		return @mysql_fetch_assoc($query);
	}
	
	/**** function update record (argument) ****/
	function updateRecord($strTable,$strCommand,$strCondition){
		$strSQL = "UPDATE $strTable SET  $strCommand WHERE $strCondition ";
		//print $strSQL;
		return @mysql_query($strSQL);
	}
	
	/**** function delete record ****/
	function deleteRecord($strTable,$strCondition){
		$strSQL = "DELETE FROM $strTable WHERE $strCondition ";
		//print $strSQL;
		return @mysql_query($strSQL);
	}
	
	/*** end class auto disconnect ***/
	function __destruct() {
		return @mysql_close($this->objConnect);
	}

}          
?>