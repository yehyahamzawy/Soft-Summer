<?php

interface iScheduleDoc
{
public function ramadanTimes();
public function overTime();
public function alterDay($dayID,$start,$end);
}
?>