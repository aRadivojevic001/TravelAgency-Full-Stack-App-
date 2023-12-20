<?php

namespace app\models;

use app\core\DbModel;

class ReservationByMonthModel extends DbModel
{
    public $input_month_start;
    public $input_month_end;

    public function getData()
    {
        if (!$this->input_month_start)
        {
            $this->input_month_start = 1;
        }

        if (!$this->input_month_end)
        {
            $this->input_month_end = 12;
        }

        $dbResult= $this->db->con()->query("SELECT COUNT(reservation_id) AS total_reservation, MONTHNAME(check_in) AS mesec, month(check_in) as mesec_int FROM reservation WHERE MONTH(check_in) >= '$this->input_month_start' and MONTH(check_in) <= '$this->input_month_end' GROUP BY mesec_int ASC;");
        $resultArray = [];

        while($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        return $resultArray;
    }



    public function tableName()
    {
        return "";
    }

    public function attributes(): array
    {
        return [];
    }

}