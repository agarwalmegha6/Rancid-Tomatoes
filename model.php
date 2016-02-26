<?php
class DataBase {
	
	private $DB;
	
	public function DataBase() {
		
		// Make a connection to an existing data based named 'movie_titles' that has table titles.
		$DB = 'mysql:dbname=movies;host=127.0.0.1';
		$user = 'root';
		$password = '';
		
		try {
			$this->DB = new PDO ( $DB, $user, $password );
			$this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			echo ('Error establishing Connection');
			exit ();
		}
	}

	public function addNewReview($review, $title, $rating, $username) {
		$stmt = $this->DB->prepare("SELECT name FROM reviewers WHERE username = :username  ");
		$stmt->bindParam ( ':username', $username );
		$stmt->execute();
		$n = $stmt->fetch();
		$name = $n[0];

		$stmt = $this->DB->prepare("SELECT publication FROM reviewers WHERE username = :username");
		$stmt->bindParam ( ':username', $username );
		$stmt->execute();
		$p = $stmt->fetch();
		$publication = $p[0];

		$stmt = $this->DB->prepare ( 
				"INSERT INTO reviews (title,name,publication,review,reviewrating) VALUES ( :title, :name,:publication,:review,:rating);");
		$stmt->bindParam ( ':title', $title );
		$stmt->bindParam ( ':name', $name );
		$stmt->bindParam ( ':publication', $publication );
		$stmt->bindParam ( ':review', $review );
		$stmt->bindParam ( ':rating', $rating );
		$stmt->execute ();
	}

	public function addNewMovie($title, $director, $rating, $year, $runtime, $boxoffice, $imagefile) {
		$stmt = $this->DB->prepare ( 
				"INSERT INTO movies (title,director,rating,year,runtime,boxoffice,imagefile) VALUES ( :title, :director,:rating,:year,:runtime,:boxoffice,:imagefile);");
		$stmt->bindParam ( ':title', $title );
		$stmt->bindParam ( ':director', $director );
		$stmt->bindParam ( ':rating', $rating);
		$stmt->bindParam ( ':year', $year );
		$stmt->bindParam ( ':runtime', $runtime );
		$stmt->bindParam ( ':boxoffice', $boxoffice );
		$stmt->bindParam ( ':imagefile', $imagefile );
		$stmt->execute ();
	}

	public function changeRating($title) {
		$stmt = $this->DB->prepare("SELECT reviewrating FROM reviews WHERE title = :title  ");
		$stmt->bindParam ( ':title', $title );
		$stmt->execute();
		$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$num  = 0;
		foreach($reviews as $x => $x_value) {
    	$num++;
		}
		$count1 = 0;
		$count2 = 0;
		for($i=0;$i<$num;$i++)
		{
			if($reviews[$i]['reviewrating'] == "FRESH")
				$count1++;
			else
				$count2++;
		}
		$newrating = $count1/($count1+$count2) *100;
		$stmt = $this->DB->prepare("UPDATE movies SET rating = :rating WHERE title = :title  ");
		$stmt->bindParam ( ':title', $title );
		$stmt->bindParam ( ':rating', $newrating );
		$stmt->execute();
	}

	public function getOverviewFor($title) {
		
		$stmt = $this->DB->prepare ( 
				"SELECT movies.rating, movies.imagefile, movies.title, movies.director, movies.year, movies.runtime, movies.boxoffice 
				 FROM movies
				 WHERE title = :title" );
		$stmt->bindParam ( ':title', $title );
		$stmt->execute ();
		$array = $stmt->fetchAll ( PDO::FETCH_ASSOC );
		return $array;
	}

	public function getReviewsFor($title) {
		
		$stmt = $this->DB->prepare ( 
				"SELECT name, publication, review,reviewrating 
				 FROM reviews
				 WHERE title = :title" );
		$stmt->bindParam ( ':title', $title );
		$stmt->execute ();
		$array = $stmt->fetchAll ( PDO::FETCH_ASSOC );
		return json_encode($array);
	}

	public function getNumberOfReviewsFor($title) {
		
		$stmt = $this->DB->prepare ( 
				"SELECT reviews.name, reviews.publication, reviews.review,reviews.reviewrating 
				 FROM reviews
				 WHERE title = :title" );
		$stmt->bindParam ( ':title', $title );
		$stmt->execute ();
		$array = $stmt->fetchAll ( PDO::FETCH_ASSOC );
		$count  = 0;
		foreach($array as $x => $x_value) {
    	$count++;
		}
		return $count;
	}

	public function getTitlesAsArray() {
			$stmt = $this->DB->prepare ( "SELECT title FROM movies" );
			$stmt->execute();
			return $stmt->fetchAll ( PDO::FETCH_ASSOC );
		}

	public function register($username, $password, $name, $publication) {
			$hash = password_hash ( $password, PASSWORD_DEFAULT );
			$sth = $this->DB->prepare ( "INSERT INTO reviewers (username, password, name, publication) VALUES ( :username, :password,:name,:publication);" );
			$sth->bindParam ( ':username', $username );
			$sth->bindParam ( ':password', $hash );
			$sth->bindParam ( ':name', $name );
			$sth->bindParam ( ':publication', $publication);
			$sth->execute ();
		}
		
		// Return TRUE if the given $username has a plain text $password that works with
		// the hash value stored for that user. You need the PHP function password_verify
		// to do this.
		public function verified($username, $password) {
			$stmt = $this->DB->prepare ( 'SELECT password FROM reviewers WHERE username = :username' );
			$stmt->bindParam ( ':username', $username );
			$stmt->execute ();
			$user = $stmt->fetch ();
			
			// Hashing the password with its hash as the salt returns the same hash
			if (password_verify ( $password, $user ['password'] ))
				return TRUE;
			else
				return FALSE;
			
			//$currentRecord = $stmt->fetch ();
			//return $currentRecord ['flagged'] === 't';
		}
		
		// Return TRUE if the given $username has mot been taken in the database
		public function canRegister($username) {
			$stmt = $this->DB->prepare ( 'SELECT * FROM reviewers WHERE username = :username' );
			$stmt->bindParam ( ':username', $username );
			$stmt->execute ();
			$stmt->fetch ();
			
			// Hashing the password with its hash as the salt returns the same hash
			if ($stmt->rowCount () === 0)
				return TRUE;
			else
				return FALSE;
		}
}

$myDB = new Database ();

?>