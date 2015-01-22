<?php

namespace GachaGacha;

class Picker
{

    private $items;

    /*
     * set items
     *
     * @param string $val
     * @param mixed
     * @return bool
     */
    public function set($val, $weight)
    {
        if (!(is_integer($weight) or is_float($weight)))
        {
            throw new \Exception('Invalid data format. weight should be a integer or a weight.');
        }

        $this->items[] = array(
            'val'   => $val,
            'weight'=> $weight
        );

        return true;
    }


    /*
     * pick item(s)
     *
     * @param integer $num
     * @return mixed
     */
    public function pick($num=1)
    {
        if ($num == 1)
        {
            return self::pick_one();
        }
        elseif ($num > 1)
        {
            $result = array();
            for ($i=0; $i<$num; $i++) {
                $result[] = self::pick_one();
            }
            return $result;
        }

        return null;
    }

    /*
     * pick a single item
     *
     * @return string
     */
    private function pick_one()
    {
        $items = $this->items;

        // sort by weight and get sum
        $sum = 0;
        foreach ($items as $key=>$item) {
            $tmp_wei_arr[$key]  = $item['weight'];
            $sum += $item['weight'];
        }
        array_multisort($tmp_wei_arr, SORT_ASC, $items);

        // normalize weights
        foreach ($items as $key=>$item) {
            $items[$key]['weight'] = (int)(($item['weight'] / $sum) * 1000);
        }

        // pick
        $sum = 0;
        $rand= mt_rand(1, 1000);
        foreach ($items as $key=>$item) {
            $sum += $item['weight'];
            if ($rand < $sum) {
                return $item['val'];
            }
        }
    }

}