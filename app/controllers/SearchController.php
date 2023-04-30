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

    /**
     * Gets room info from class
     * Required parameters:
     *  - Class name
     *  - Location
     *  - Time
     *  - Instructor
     */
    public function getRoomInfo($params) {
        $this->setResponse(print_r($params, true)); // Default failure response
        if(empty($params["classname"] || $params["location"] || $params["time"] || $params["instructor"])) {
            // Invalid parameters
            return;
        }
        $classname = $params["classname"];
        $location = $params["location"];
        $time = $params["time"];
        $instructor = $params["instructor"];

        $room_info = explode(" ", $location);
        $building = $room_info[1];
        $classroom_nbr = $room_info[3];
        if(!empty($building) && !empty($classroom_nbr)) {
            $db = DBConnection::db();
            $query = "SELECT building,floor,x1,y1,x2,y2,x3,y3,x4,y4,x5,y5,x6,y6,x7,y7,x8,y8 FROM classrooms WHERE `building` = ? AND `classroom_nbr` = ?";
            $stmt = $db->prepare($query);
            $stmt->execute(array($building, $classroom_nbr));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(empty($row)) {
                return;
            }
            $this->setResponse(array(
                "classname" => $classname,
                "time" => $time,
                "instructor" => $instructor,
                "room_info" => $row));
        }
        return;
    }
}