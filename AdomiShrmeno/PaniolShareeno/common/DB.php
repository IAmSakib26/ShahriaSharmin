<?php
class DB{
	//Database credentials
	private $dbHost=DB_HOST;
	private $dbUsername=DB_USER;
	private $dbPassword=DB_PASSWORD;
	private $dbName=DB_NAME;
	public $db;
	private $dbHost_at=DB_HOSTAudit;
	private $dbUsername_at=DB_USERAudit;
	private $dbPassword_at=DB_PASSWORDAudit;
	private $dbName_at=DB_NAMEAudit;
	public $db_at;

	private $dbName_An='nef4rate7rev_site_counterfoto';
	public $db_An;	
	
//Connect to the database and return db connecction
public function __construct(){
	if(!isset($this->db)){
		// Connect to the database
		try{
			$conn=new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword, array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8"));
			$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db=$conn;
		}catch(PDOException $e){
			die("Failed to connect with MySQL: " . $e->getMessage());
		}
	}
	if(!isset($this->db_at)){
		// Connect to the database
		try{
			$conn_at=new PDO("mysql:host=".$this->dbHost_at.";dbname=".$this->dbName_at, $this->dbUsername_at, $this->dbPassword_at, array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8"));
			$conn_at -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db_at=$conn_at;
		}catch(PDOException $e){
			die("Failed to connect with MySQL: " . $e->getMessage());
		}
	}	
	if(!isset($this->db_An)){
		// Connect to the database
		try{
			$conn_An=new PDO("mysql:host=".$this->dbHost_at.";dbname=".$this->dbName_An, $this->dbUsername_at, $this->dbPassword_at, array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8"));
			$conn_at -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db_An=$conn_An;
		}catch(PDOException $e){
			die("Failed to connect with MySQL: " . $e->getMessage());
		}
	}		
}
	
/*
* Returns rows from the database based on the conditions
* @param string name of the table
* @param array select, where, order_by, limit and return_type conditions
*/
public function getRows($table,$conditions=array()){
	$sql='SELECT ';
	$sql.=array_key_exists("select",$conditions)?$conditions['select']:'*';
	$sql.=' FROM '.$table;
	if(array_key_exists("where",$conditions)){
		$sql.=' WHERE ';
		$i=0;
		foreach($conditions['where'] as $key=> $value){
			$pre=($i>0)?' AND ':'';
			$sql.=$pre.$key."='".$value."'";
			$i++;
		}
	}
	if(array_key_exists("order_by",$conditions)){
		$sql.=' ORDER BY '.$conditions['order_by']; 
	}
	if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql.=' LIMIT '.$conditions['start'].','.$conditions['limit']; 
	}elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql.=' LIMIT '.$conditions['limit']; 
	}

	$query=$this->db->prepare($sql);
	$query->execute();
	
	if(array_key_exists("return_type",$conditions) && $conditions['return_type'] !='all'){
		switch($conditions['return_type']){
			case 'count':
				$data=$query->rowCount();
				break;
			case 'single':
				$data=$query->fetch(PDO::FETCH_ASSOC);
				break;
			default:
				$data='';
		}
	}else{
		if($query->rowCount()>0){
			$data=$query->fetchAll(PDO::FETCH_ASSOC);
		}
	}
	return !empty($data)?$data:false;
}

/*
* Insert data into the database
* @param string name of the table
* @param array the data for inserting into the table
*/
public function insert($table,$data){
	if(!empty($data) && is_array($data)){
		$columns='';
		$values ='';
		$i=0;

		$columnString=implode(',', array_keys($data));
		$valueString=":".implode(',:', array_keys($data));
		$sql="INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
		$query=$this->db->prepare($sql);
		foreach($data as $key=>$val){
			$val=htmlspecialchars(strip_tags($val));
			$query->bindValue(':'.$key, $val);
		}
		$insert=$query->execute();
		if($insert){
			$data=$this->db->lastInsertId();
			return $data;
		}else{
			return false;
		}
	}else{
		return false;
	}
}

public function insert_at($table,$data){
	if(!empty($data) && is_array($data)){
		$columns='';
		$values ='';
		$i=0;
		$columnString=implode(',', array_keys($data));
		$valueString=":".implode(',:', array_keys($data));
		$sql="INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
		$query=$this->db_at->prepare($sql);
		foreach($data as $key=>$val){
			$val=htmlspecialchars(strip_tags($val));
			$query->bindValue(':'.$key, $val);
		}
		$insert=$query->execute();
		if($insert){
			$data=$this->db_at->lastInsertId();
			return $data;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
public function insert_An($table,$data){
	if(!empty($data) && is_array($data)){
		$columns='';
		$values ='';
		$i=0;
		$columnString=implode(',', array_keys($data));
		$valueString=":".implode(',:', array_keys($data));
		$sql="INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
		$query=$this->db_An->prepare($sql);
		foreach($data as $key=>$val){
			$val=htmlspecialchars(strip_tags($val));
			$query->bindValue(':'.$key, $val);
		}
		$insert=$query->execute();
		if($insert){
			$data=$this->db_An->lastInsertId();
			return $data;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
	
/*
* Update data into the database
* @param string name of the table
* @param array the data for updating into the table
* @param array where condition on updating data
*/
	public function update($table,$data,$conditions){
		if(!empty($data) && is_array($data)){
			$colvalSet='';
			$whereSql='';
			$i=0;
			//if(!array_key_exists('modified',$data)){$data['modified']=date("Y-m-d H:i:s");}
			foreach($data as $key=>$val){
				$pre=($i>0)?', ':'';
				$colvalSet.=$pre.$key."='".$val."'";
				$i++;
			}
			if(!empty($conditions)&& is_array($conditions)){
				$whereSql.=' WHERE ';
				$i=0;
				foreach($conditions as $key=> $value){
					$pre=($i>0)?' AND ':'';
					$whereSql.=$pre.$key."='".$value."'";
					$i++;
				}
			}
			$sql="UPDATE ".$table." SET ".$colvalSet.$whereSql;
		  //  return $sql ;
			$query=$this->db->prepare($sql);
			$update=$query->execute();
			return $update?$query->rowCount():false;
		}else{
			return false;
		}
	}

	public function delete($table,$conditions){
		$whereSql='';
		if(!empty($conditions)&& is_array($conditions)){
			$whereSql.=' WHERE ';
			$i=0;
			foreach($conditions as $key=> $value){
				$pre=($i>0)?' AND ':'';
				$whereSql.=$pre.$key."='".$value."'";
				$i++;
			}
		}
		$sql="DELETE FROM ".$table.$whereSql;
		$delete=$this->db->exec($sql);
		return $delete?$delete:false;
	}

	public function getDataSQL($sql){
		try{
			$query=$this->db->prepare($sql);
			$query->execute();

			$data=$query->fetch(PDO::FETCH_ASSOC);
			if($query->rowCount()>0){
				$data=$query->fetchAll(PDO::FETCH_ASSOC);
			}
		}catch(PDOException $e){
			$data['status']='Error';			
			$data['errMessage']=$e->getMessage();
		}

		return !empty($data)?$data:false;
	}

	public function getDataSQLNum($sql){
		try{ 
			$query=$this->db->prepare($sql);
			$query->execute();
	
	
			$data=$query->fetch(PDO::FETCH_ASSOC);
			if($query->rowCount()>0){
				$data=$query->rowCount();
			}
		}catch(PDOException $e){
			$data['status']='Error';			
			$data['errMessage']=$e->getMessage();
		}
	
		return !empty($data)?$data:false;
	}

	public function runSQL($sql){
		try{ 
			$query=$this->db->prepare($sql);
			$query->execute();
	
	
			// $data=$query->fetch(PDO::FETCH_ASSOC);
			// if($query->rowCount()>0){
			//	 $data=$query->fetchAll(PDO::FETCH_ASSOC);
			// }
			
	
		}catch(PDOException $e){
			$data['status']='Error';			
			$data['errMessage']=$e->getMessage();
		}
	
		return !empty($data)?$data:false;
	}
  
	public function audit_runSQL($sql){
		try
		{ 
			$query=$this->db_at->prepare($sql);
			$query->execute();
	
		}
		catch(PDOException $e)
		{
			$data['status']='Error';			
			$data['errMessage']=$e->getMessage();
		}
		return !empty($data)?$data:false;
	}
  
	public function getRowsQr($sql){
		try
		{ 
			$query=$this->db->prepare($sql);
			$query->execute();
		}
		catch(PDOException $e)
		{
			$data['status']='Error';			
			$data['errMessage']=$e->getMessage();
		}
		if(array_key_exists("return_type",$conditions) && $conditions['return_type'] !='all'){
			switch($conditions['return_type']){
				case 'count':
					$data=$query->rowCount();
					break;
				case 'single':
					$data=$query->fetch(PDO::FETCH_ASSOC);
					break;
				default:
					$data='';
			}
		}else{
			if($query->rowCount()>0){
				$data['status']='OK';
				$data['result']=$query->fetchAll(PDO::FETCH_ASSOC);
				$data['count']=$query->rowCount();
			}
		}
		return !empty($data)?$data:false;
	}
}