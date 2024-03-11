<?php

require_once 'db.php';

class Story {

    public $id;
    public $headline;
    public $article;
    public $img_url;
    public $author_id;
    public $category_id;
    public $location_id;
    public $created_at;
    public $updated_at;

    public function __construct($props = null) {
        if ($props != null) {
            if (array_key_exists("id", $props)) {
                $this->id = $props["id"];
            }
            $this->headline    = $props["headline"];
            $this->article     = $props["article"];
            $this->img_url     = $props["img_url"];
            $this->author_id   = $props["author_id"];
            $this->category_id = $props["category_id"];
            $this->location_id = $props["location_id"];
            
            if (array_key_exists("created_at", $props)) {
                $this->created_at = $props["created_at"];
            }
            if (array_key_exists("updated_at", $props)) {
                $this->updated_at = $props["updated_at"];
            }
        }
    }

    public function save() {
        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();
        
            $params = [
                ":headline"    => $this->headline,
                ":article"     => $this->article,
                ":img_url"     => $this->img_url,
                ":author_id"   => $this->author_id,
                ":category_id" => $this->category_id,
                ":location_id" => $this->location_id,
            ];

            if ($this->id === null) {
                $sql = "INSERT INTO stories (" . 
                       "headline, article, img_url, " . 
                       "author_id, category_id, location_id" . 
                       ") VALUES (" . 
                       ":headline, :article, :img_url, " . 
                       ":author_id, :category_id, :location_id" . 
                       ")";
            }
            else {
                $sql = "UPDATE stories SET " . 
                       "headline    = :headline, " .
                       "article     = :article, " .
                       "img_url     = :img_url, " .
                       "author_id   = :author_id, " .
                       "category_id = :category_id, " .
                       "location_id = :location_id, " .
                       "updated_at  = :updated_at " .
                       "WHERE id = :id";
                       
                $params[":id"] = $this->id;
                $params[":updated_at"] = date("Y-m-d H:i:s");
            }
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);
        
            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }
        
            if ($stmt->rowCount() !== 1) {
                throw new Exception("Failed to save story.");
            }
        
            if ($this->id === null) {
                $this->id = $conn->lastInsertId();
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
    }

    public function delete() {
        $db = null;
        try {
            if ($this->id !== null) {
                $db = new DB();
                $db->open();
                $conn = $db->getConnection();
        
                $sql = "DELETE FROM stories WHERE id = :id" ;
                $params = [
                    ":id" => $this->id
                ];
                $stmt = $conn->prepare($sql);
                $status = $stmt->execute($params);
        
                if (!$status) {
                    $error_info = $stmt->errorInfo();
                    $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                    throw new Exception("Database error executing database query: " . $message);
                }
        
                if ($stmt->rowCount() !== 1) {
                    throw new Exception("Failed to delete story.");
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }
    }

    private static function find($sql, $params, $options = NULL) {
        $stories = array();

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            if ($options != NULL && is_array($options)) {
                if (array_key_exists("order", $options)) {
                    $sql .= " ORDER BY :order";
                    $params["order"] = $options["order"];
                }
                if (array_key_exists("limit", $options)) {
                    $sql .= " LIMIT :limit";
                    $params["limit"] = $options["limit"];
                        
                    if (array_key_exists("offset", $options)) {
                        $sql .= " OFFSET :offset";
                        $params["offset"] = $options["offset"];
                    }
                }
            }

            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                while ($row !== FALSE) {
                    $story = new Story($row);
                    $stories[] = $story;

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $stories;
    }

    public static function findAll($options = NULL) {
        $sql = "SELECT * FROM stories";
        $params = [];

        $stories = Story::find($sql, $params, $options);

        return $stories;
    }

    public static function findByAuthor($id, $options = NULL) {
        $sql = "SELECT * FROM stories WHERE author_id = :author_id";
        $params = [
            ":author_id" => $id
        ];

        $stories = Story::find($sql, $params, $options);

        return $stories;
    }

    public static function findByCategory($id, $options = NULL) {
        $sql = "SELECT * FROM stories WHERE category_id = :category_id";
        $params = [
            ":category_id" => $id
        ];

        $stories = Story::find($sql, $params, $options);

        return $stories;
    }

    public static function findByLocation($id, $options = NULL) {
        $sql = "SELECT * FROM stories WHERE location_id = :location_id";
        $params = [
            ":location_id" => $id
        ];

        $stories = Story::find($sql, $params, $options);
        
        return $stories;
    }

    public static function findById($id) {
        $story = null;

        try {
            $db = new DB();
            $db->open();
            $conn = $db->getConnection();

            $sql = "SELECT * FROM stories WHERE id = :id";
            $params = [
                ":id" => $id
            ];
            $stmt = $conn->prepare($sql);
            $status = $stmt->execute($params);

            if (!$status) {
                $error_info = $stmt->errorInfo();
                $message = "SQLSTATE error code = ".$error_info[0]."; error message = ".$error_info[2];
                throw new Exception("Database error executing database query: " . $message);
            }

            if ($stmt->rowCount() !== 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $story = new Story($row);
            }
        }
        finally {
            if ($db !== null && $db->isOpen()) {
                $db->close();
            }
        }

        return $story;
    }
}
?>