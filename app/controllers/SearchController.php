<?php
// Search controller responsible for the search functionality

require_once(__DIR__ . "/../bootstrap.php");

class SearchController extends BaseController {

    // Gets class info by class ID (ex. CS4800)
    public function getClassInfo($params) {
        $this->setResponse(print_r($params, true)); // Default failure response
        $changed = false;

        if(empty($params["term"])) {
            // No term passed in
            return;
        }
        $term = $params["term"];
        $table = "classes_{$term}";
        $term = 'ClassLoader::' . strtoupper($term);
        if(!defined($term)) {
            // This term isn't valid
            return;
        }
        
        $query = "SELECT * FROM `{$table}` WHERE ";
        $class = array();

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
            // Nothing passed in, just return everything (can change this if problems later)
            $query .= "1";
        }

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
            $query = "SELECT classroom_nbr,building,floor,x1,y1,x2,y2,x3,y3,x4,y4,x5,y5,x6,y6,x7,y7,x8,y8 FROM classrooms WHERE `building` = ? AND `classroom_nbr` = ?";
            $stmt = $db->prepare($query);
            $stmt->execute(array($building, $classroom_nbr));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(empty($row)) {
                $this->setResponse(0);
                return;
            }
            $this->setResponse($array = array(
                "classname" => $classname,
                "time" => $time,
                "instructor" => $instructor,
                "room_info" => $row));
        }

        $lt = new LineTestController();
        $lt->drawLines($row);
        return;
    }
}