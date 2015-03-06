<?php
	/**
		 * @name: DatabaseManager
		 * @role:  manages all database transactions in PictureBase
		 * @version:  1.0.0
		 * @author:  Sigurður R Ragnarsson
		 * @since:	 22.01.2015
		 * @system:  VEF2A3U - Tækniskólinn
		 */
	class DatabaseManager
	{
		private $connection;
		
		/**
		 * The class Constructor
		 *
		 * @param string $server
		 * @param string $database
		 * @param string $user
		 * @param string $password
		 *
		 * @usage example  $db_man = new DatabaseManager('127.0.0.1','PictureBase','johndoe','12345');
		 */
		public function __construct($server,$database,$user,$password)
		{
			try
			{
				$this->connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);
			}
			catch (PDOException $e)
			{
				die();
			}
		}
	
		/**
		 * The function inserts a new category into the image database
		 *
		 * @param string $category_name
		 * @return boolean
		 */
		public function newCategory($category_name)
		{
			$statement = $this->connection->prepare('call NewCategory(?)');
			$statement->bindParam(1,$category_name);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
		
		/**
		 * The function gets information about a single category item
		 *
		 * @param string $category_id
		 * @return one dimensional array
		 */
		public function getCategory($category_id)
		{
			$statement = $this->connection->prepare('call GetCategory(?)');
			$statement->bindParam(1,$category_id);
			
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}
		
		/**
		 * The function updates a category in the database
		 *
		 * @param string $category_name
		 * @param string $category_id
		 * @return boolean
		 */
		public function updateCategory($category_name,$category_id)
		{
			$statement = $this->connection->prepare('call UpdateCategory(?,?)');
			$statement->bindParam(1,$category_name);
			$statement->bindParam(2,$category_id);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
		
		/**
		 * The function deletes a category from the database
		 *
		 * @param string $category_id
		 * @return boolean
		 */
		public function deleteCategory($category_id)
		{
			$statement = $this->connection->prepare('call DeleteCategory(?)');
			$statement->bindParam(1,$category_id);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
		
		/**
		 * The function returns a list of all categories
		 *
		 * @return two dimensional array
		 */
		public function categoryList()
		{
			$statement = $this->connection->prepare('call CategoryList()');
			
			try 
			{
				$arr = array();
				$statement->execute();
				
				while ($row = $statement->fetch(PDO::FETCH_NUM)) 
				{
					array_push($arr,$row);
				}
				return $arr;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}
		
		/**
		 * The function inserts new image info into the database
		 *
		 * @param string $name
		 * @param string $path
		 * @param string $text
		 * @param string $category
		 *
		 * @return boolean
		 */
		public function newImageInfo($name,$path,$text,$category)
		{
			$statement = $this->connection->prepare('call NewImage(?,?,?,?)');
			$statement->bindParam(1,$name);
			$statement->bindParam(2,$path);
			$statement->bindParam(3,$text);
			$statement->bindParam(4,$category);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
		
		/**
		 * The function gets information about a single image
		 *
		 * @param string $image_id
		 * @return one dimensional array
		 */
		public function getImageInfo($image_id)
		{
			$statement = $this->connection->prepare('call GetImage(?)');
			$statement->bindParam(1,$image_id);
			
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}
		
		/**
		 * The function updates an image in the database
		 *
		 * @param string $id
		 * @param string $name
		 * @param string $path
		 * @param string $text
		 * @param string $category
		 *
		 * @return boolean
		 */
		public function updateImageInfo($id,$name,$path,$text,$category)
		{
			$statement = $this->connection->prepare('call UpdateImage(?,?,?,?,?)');
			$statement->bindParam(1,$id);
			$statement->bindParam(2,$name);
			$statement->bindParam(3,$path);
			$statement->bindParam(4,$text);
			$statement->bindParam(5,$category);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
		
		/**
		 * The function deletes an image from the database
		 *
		 * @param string $image_id
		 *
		 * @return boolean
		 */
		public function deleteImageInfo($image_id)
		{
			$statement = $this->connection->prepare('call DeleteImage(?)');
			$statement->bindParam(1,$image_id);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
		
		/**
		 * The function returns a list of all images
		 *
		 * @return two dimensional array
		 */
		public function imageList()
		{
			$statement = $this->connection->prepare('call ImageList()');
			
			try 
			{
				$arr = array();
				$statement->execute();
				
				while ($row = $statement->fetch(PDO::FETCH_NUM)) 
				{
					array_push($arr,$row);
				}
				return $arr;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}
		
		public function imageCount()
		{
			$statement = $this->connection->prepare("select counter('Images')");
			
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row[0];
			}
			catch(PDOException $e)
			{
				return -1;
			}
		}

		/*--=================================================--*/
		// User
		/*--=================================================--*/
		/**
		* This function validates user
		*
		* @param string $userName
		* @param string $userPass
		*
		* @return boolean
		*/
		public function validateUser($userName, $userPass)
		{
			$statement = $this->connection->prepare("select ValidateUser(?,?)");
			$statement->bindParam(1, $userName);
			$statement->bindParam(2, $userPass);
			
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				
				return ($row[0] == 1) ? true : false;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}

		/**
		 * The function creates new user in the database
		 *
		 * @param string $firstName
		 * @param string $lastName
		 * @param string $userEmail
		 * @param string $userName
		 * @param string $userPassword
		 *
		 * @return boolean
		 */
		public function newUser($firstName, $lastName, $userEmail, $userName, $userPassword)
		{
			$statement = $this->connection->prepare('call NewUser(?,?,?,?,?)');
			$statement->bindParam(1,$firstName);
			$statement->bindParam(2,$lastName);
			$statement->bindParam(3,$userEmail);
			$statement->bindParam(4,$userName);
			$statement->bindParam(5,$userPassword);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}

		/**
		 * The function gets user from database based on id
		 *
		 * @param string $userId
		 * @return one dimensional array
		 */
		public function getUser($userId)
		{
			$statement = $this->connection->prepare('call GetUser(?)');
			$statement->bindParam(1,$userId);
			
			try 
			{
				$statement->execute();
				
				$row = $statement->fetch(PDO::FETCH_NUM);
				return $row;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}

		/**
		 * The function returns a list of all users
		 *
		 * @return two dimensional array
		 */
		public function userList()
		{
			$statement = $this->connection->prepare('call UserList()');
			
			try 
			{
				$arr = array();
				$statement->execute();
				
				while ($row = $statement->fetch(PDO::FETCH_NUM)) 
				{
					array_push($arr,$row);
				}
				return $arr;
			}
			catch(PDOException $e)
			{
				return array();
			}
		}

		/**
		 * The function updates an user in the database
		 *
		 * @param string $id
		 * @param string $firstName
		 * @param string $lastName
		 * @param string $userEmail
		 * @param string $userName
		 * @param string $userPassword
		 *
		 * @return boolean
		 */
		public function updateUser($id,$firstName,$lastName,$userEmail,$userName,$userPassword)
		{
			$statement = $this->connection->prepare('call UpdateUser(?,?,?,?,?,?)');
			$statement->bindParam(1,$id);
			$statement->bindParam(2,$firstName);
			$statement->bindParam(3,$lastName);
			$statement->bindParam(4,$userEmail);
			$statement->bindParam(5,$userName);
			$statement->bindParam(6,$userPassword);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}

		/**
		 * The function deletes a user from the database
		 *
		 * @param string $userId
		 * @return boolean
		 */
		public function deleteUser($userId)
		{
			$statement = $this->connection->prepare('call DeleteUser(?)');
			$statement->bindParam(1,$userId);
			
			try 
			{
				$statement->execute();
				
				return true;
			}
			catch(PDOException $e)
			{
				return false;
			}
		}
	}
?>