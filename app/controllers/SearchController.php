<?php
// Search controller responsible for the search functionality

require_once(__DIR__ . "/../bootstrap.php");

class SearchController extends BaseController {

    // Gets class info by class ID (ex. CS4800)
    public function getClassInfo($params) {
        $this->setResponse(print_r($params, true)); // Default failure response
        $changed = false;
        
        $query = "SELECT * FROM `classes` WHERE ";

        if(!empty($params["class"])) {
            if($changed) {
                $query .= " AND ";
            }
            $changed = true;
            $class[] = $params["class"];
            $query .= "`class_id` LIKE CONCAT('%',?,'%')";
        }

        if(!empty($params["classname"])) {
            if($changed) {
                $query .= " AND ";
            }
            $changed = true;
            $class[] = $params["classname"];
            $query .= "`class_name` LIKE CONCAT('%',?,'%')";
        }
        
        if(!empty($params["sec"])) {
            if($changed) {
                $query .= " AND ";
            }
            $changed = true;
            $class[] = $params["sec"];
            $query .= "`section` LIKE CONCAT('%',?,'%')";
        }

        if(!empty($params["instructor"])) {
            if($changed) {
                $query .= " AND ";
            }
            $changed = true;
            $class[] = $params["instructor"];
            $query .= "`instructor` LIKE CONCAT('%',?,'%')";
        }
        
        if(!$changed) {
            // Nothing passed in, don't even bother querying the database with nothing
            return;
        }

        // Limit 100 for now so people don't blow up the database by searching for everything at the same time
        $query .= " LIMIT 100";
        $this->setResponse($query);
        $db = DBConnection::db();
        $stmt = $db->prepare($query);
        $stmt->execute($class);
        $row = $stmt->fetchall(PDO::FETCH_ASSOC);
        if(empty($row)) {
            return; // Class doesn't exist
        }
        $this->setResponse($row);
    }
}