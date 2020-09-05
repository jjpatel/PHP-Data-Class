<?php

class RestaurantData {
    
    private $menuList;

    function __construct(array $menuList) {
        if (sizeof($menuList)>0) {
            $this->menuList = $menuList;
        } else {
            throw new Exception("No Food Item record available");
        }
    }

    public function getItemName() {
    $foodNameList = [];

        foreach($this->menuList as $foodItem) {
            $foodNameList[] = array(
                "id"=>$foodItem['id'],
                "name"=>$foodItem['name'],
                "short_name"=>$foodItem['short_name']
            );
        }

        return json_encode($foodNameList);
    }

    public function getFoodById($id) {
        $response = ["In-Valid ID"];
        if($id) {
            foreach($this->menuList as $foodItem) {
                if ($id == $foodItem['id']) {
                    $response = $foodItem;
                    break;
                }
            }
        }
        return json_encode($response);
    }

    /*public function getTopperStudent() {
        $foodItem = null;
        // Write your logic;
        $foodItem['grade'] = getGrade($per);
    }

    private function getGrade($per) {
        return "A";
    }
*/
}
?>