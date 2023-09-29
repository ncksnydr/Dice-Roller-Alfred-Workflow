<?php

require __DIR__ . '/vendor/autoload.php';
class Dice
{
    private $factory;
    private $kanto;
    private $johto;
    private $hoenn;
    private $generators;
    private $pattern_num;
    private $pattern_proper;

    public function __construct()
    {
        $this->factory = new RandomLib\Factory();
        $this->kanto = $this->factory->getMediumStrengthGenerator();
        $this->johto = $this->factory->getMediumStrengthGenerator();
        $this->hoenn = $this->factory->getMediumStrengthGenerator();
        $this->generators = array($this->kanto, $this->johto, $this->hoenn);
        $this->pattern_num = '/^([0-9]*)$/';
        $this->pattern_proper = '/^([0-9]*)([d])([0-9]*)$/';
    }

    public function roll($query)
    {
        if (preg_match($this->pattern_num, $query)) {
            $query = '1d' . $query;
            putenv("raw_string=$query");
        }

        if (!preg_match($this->pattern_proper, $query)) {
            echo "Incorrect format; please provide a number or D&D roll string (`3d20`).";
            exit;
        }


        $options = self::_parseQuery($query);
        $result = self::_createRoll($options);

        echo $result;
    }

    public function _parseQuery($query)
    {
        $split = explode('d', $query);
        return array(
                    'die' => intval($split[1]),
                    'rolls' => intval($split[0])
                );
    }

    public function _createRoll($options)
    {
        $arr = array();
        $rand = rand(0, 2);
        for ($i = 0; $i < $options['rolls']; $i++) {
            array_push($arr, $this->generators[$rand]->generateInt(1, $options['die']));
        }
        $formatted_string = self::_formatText($arr);
        return $formatted_string;
    }


    private function _formatText($arr)
    {
        $total = count($arr);
        $sum = array_sum($arr);
        $str = '(';

        if ($total === 1) {
            return $sum;
        }

        for ($i = 0; $i < $total; $i++) {
            $str .= "$arr[$i], ";
        }

        $str .= ") = $sum";
        return str_replace(', )', ')', $str);
    }
}
