<?php



class Calculator
{
    public function add()
    {
        $args = $this->get_args(func_get_args());
        if (!count($args)) {
            return null;
        }
        if (count($args) == 1) {
            return (string)$args[0];
        }
        $res = '0';
        for ($i = 0; $i < count($args); $i++) {
            $res = $this->sum_simple($res, $args[$i]);
        }
        return $res;
    }

    protected function sum_simple($str1, $str2)
    {
        $iMax = strlen($str1);
        if (strlen($str1) < strlen($str2)) {
            $iMax = strlen($str2);
            $str1 = str_repeat('0', $iMax - strlen($str1)) . $str1;
        } elseif (strlen($str1) > strlen($str2)) {
            $str2 = str_repeat('0', $iMax - strlen($str2)) . $str2;
        }
        $iC = 0;
        for ($i = $iMax - 1; $i >= 0; $i--) {
            $iC += (int)$str1[$i] + (int)$str2[$i];
            $str1[$i] = (string)($iC % 10);
            $iC = (int)($iC / 10);
        }
        if ($iC > 0) {
            $str1 = (string)$iC . $str1;
        }
        return $str1;
    }

    protected function get_args($args)
    {
        if (!count($args)) {
            return [];
        }
        if (is_array($args[0])) {
            $args = $args[0];
        }
        return $args;
    }
}