<?php
class Database_user
{
	
	private static $connection = null;

	private $query_type;
	private $columns;
	private $values;
	private $where;
	private $limit;

	public function Connect()
	{
		self::$connection = mysqli_connect( Config::Get("db.host"), 
											Config::Get("db.username"), 
											Config::Get("db.password"), 
											Config::Get("db.name"));
		if (mysqli_connect_errno())
		{
			die("Failed to connect to MySQL"); 
		}
	}

	private function Clear()
	{
		$this->columns = "";
		$this->values = "";
		$this->where = "";
		$this->limit = "";
	}

	public function Get($table_name)
	{
		if ($this->query_type == "select") 
		{
			$query = "SELECT $this->columns FROM $table_name ";
			if(!empty($this->where))
				$query .= "WHERE $this->where ";
			if(!empty($this->limit))
				$query .= "LIMIT $this->limit ";

			$result = mysqli_query(self::$connection, $query);
			$this->Clear();

			if($result && mysqli_num_rows($result))
			{
				while ($item = mysqli_fetch_array($result)) 
				{
					$resultArray[] = $item;
				}
				return $resultArray;
			}
		}
		return false;
	}

	public function Execute($table_name)
	{
		switch ($this->query_type) 
		{
			case 'insert':
				$query = "INSERT INTO $table_name ($this->columns) VALUES ($this->values)";
				break;

			case 'update':
				$query = "UPDATE $table_name SET $this->columns ";
				break;

			case 'delete':
				$query = "DELETE FROM $table_name ";
				break;
		}
		
		if($this->query_type != "insert")	
		{
			if(!empty($this->where))
				$query .= "WHERE $this->where ";
			if(!empty($this->limit))
				$query .= "LIMIT $this->limit ";
		}

		$result = mysqli_query(self::$connection, $query);
		$this->Clear();

		if($result)
			return true;
		return false;
	}

	public function Select($columns = "*")
	{
		$this->query_type = "select";
		$this->columns = $columns;
		return $this;
	}

	public function Insert($fields)
	{
		$this->query_type = "insert";
  		foreach ($fields as $key => $value) 
		{
			$this->columns .= "$key,";
			$this->values .= "'$value',";
		}
		$this->columns = substr($this->columns, 0, strlen($this->columns) - 1);
		$this->values = substr($this->values, 0, strlen($this->values) - 1);
		return $this;
	}

	public function Update($fields)
	{
		$this->query_type = "update";
		foreach ($fields as $key => $value) 
		{
			$this->columns .= $key." = '$value',";

		}
		$this->columns = substr($this->columns, 0, strlen($this->columns) - 1);
		return $this;
	}

	public function Delete()
	{
		$this->query_type = "delete";
		return $this;
	}

	public function Where($key, $value, $operator = "=")
	{
		if(!empty($this->where))
			$this->where .= "AND $key $operator '$value' ";
		else
			$this->where .= "$key $operator '$value' ";
		return $this;
	}

	public function Limit($limit)
	{
		$this->limit = $limit;
		return $this;
	}
}