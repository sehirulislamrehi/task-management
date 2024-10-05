<?php

namespace App\Interfaces\TaskModule\Tasks;

interface TaskWriteInterface{
     public function create($request);
     public function edit($request, $task);
}

?>