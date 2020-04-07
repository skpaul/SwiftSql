<?php
 require("SwiftRepository.php");

try{
    
    $db = new SwiftDB();
    $db->server("localhost")->user("root")->password("")->database("swiftdb");
    $db->connect();

    $db->enableSqlPrinting();
    $db->enableSqlLogging();
    $db->enableDebugBacktrace();

    //$result = $db->select()->from("table1")->execute(); //Test ok
    //$result = $db->select("test_id")->from("table1")->execute(); //test ok
    // $result = $db->select("test_id, test_name")->from("table1")->execute(); 
    // $result = $db->select()->from("table1")->first()-> execute();
    // $result = $db->select("test_id, test_name")->from("table1")->single()->execute();
    // $result = $db->select("test_name")->from("table1")->where("test_name")->equalTo('ghonta')->single()-> execute();
    // $result = $db->select()->from("table1")->innerJoin("table2")->on("table1","test_id","table2","test_id")->whereSql("table1.test_id=2")-> execute();
    // $query = $db->distinct("test_id")->from("table1")->where("test_id")->greaterThan(16);
    // $result = $query-> execute();

    // $person = $db->createObject("table2");
    // $person->col1 = "boom1";
    // $person->col2 = "boom2";

    // $result = $db->insert($person)->execute();
   
    // $person = array();
    // $person["col1"] = "boom1";
    // $person["col2"] = 45;

    // $result = $db->insert("col1=saumitra, test_id=12")->into("table2")-> execute();

    // $table1 = $db->find(2)->from("table1")->execute();
    // $table1->test_name = "this is new value";
    // $result = $db->update($table1)->into("table1")-> execute();

    $result = $db->delete()->from("table1")->where("test_id")->greaterThan(10)-> execute();

   if(is_array($result)){
       echo "<br><br>------ Printing result array --------- <br><br>";
        foreach($result as $row){
            var_dump($row);
            echo "<br>";
        }
   }
   else{
    echo "<br><br>------ Printing result single --------- <br><br>";
        var_dump($result);
   }
   
   echo "<br>" . "-----------------------------------------------" . "<br>";
   $test = $db->select()->from("table2")->execute();

    $db->close();
   
}
catch(Exception $e){
    $db->rollBack();
    $db->close();
   echo "Caught - " . $e->getMessage();
}


?>