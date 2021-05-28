<?php
require_once "Database.php";

class Application {
    public function delete($applicationID) {
        $result = Database::dbQuery("DELETE FROM applications WHERE id = $applicationID", (new Database()));
        $result->execute();
        return 1;
    }
}