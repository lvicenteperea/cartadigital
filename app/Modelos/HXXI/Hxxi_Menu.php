<?php

namespace App\Modelos\HXXI;

use Illuminate\Database\Eloquent\Model;

class Hxxi_Menu extends Model
{
    protected $table = 'hxxi_menus';


    public function estatico()
    {

        $menus = [];
        /*
        $data = array(array('id'=>'1', 'padre'=>'1', 'label'=>'Opción 1',   'link'=>'http://link1.com'  , 'orden' => '1', 'tooltip'=>'Primera opción que te lleva a '),
                      array('id'=>'2', 'padre'=>'2', 'label'=>'submenú 2',  'link'=>''                  , 'orden' => '2', 'tooltip'=>''),
                      array('id'=>'3', 'padre'=>'2', 'label'=>'submenú 2.1',  'link'=>''                  , 'orden' => '3', 'tooltip'=>''),
                      array('id'=>'4', 'padre'=>'3', 'label'=>'Opción 4-  2.1.1', 'link'=>'http://link2.1.com', 'orden' => '4', 'tooltip'=>'Primera opción submenu 2.1'),
                      array('id'=>'5', 'padre'=>'2', 'label'=>'Opción 5 - 2.2', 'link'=>'http://link2.2.com', 'orden' => '5', 'tooltip'=>'Segunda opción submenu 2'),
                      array('id'=>'6', 'padre'=>'6', 'label'=>'Opción 6',   'link'=>'http://link5.com'  , 'orden' => '6', 'tooltip'=>'Quinta  opción que te lleva a '),
        );*/
        /*
        $data = array(array('id'=>'1', 'padre'=>'1', 'label'=>'Opción 1',   'link'=>'http://link1.com'  , 'orden' => '1', 'tooltip'=>'Primera opción que te lleva a '),
                      array('id'=>'6', 'padre'=>'6', 'label'=>'Opción 6',   'link'=>'http://link5.com'  , 'orden' => '6', 'tooltip'=>'Quinta  opción que te lleva a '),
                      array('id'=>'4', 'padre'=>'3', 'label'=>'Opción 4-  2.1.1', 'link'=>'http://link2.1.com', 'orden' => '4', 'tooltip'=>'Primera opción submenu 2.1'),
                      array('id'=>'3', 'padre'=>'2', 'label'=>'submenú 2.1',  'link'=>''                  , 'orden' => '3', 'tooltip'=>''),
                      array('id'=>'5', 'padre'=>'2', 'label'=>'Opción 5 - 2.2', 'link'=>'http://link2.2.com', 'orden' => '5', 'tooltip'=>'Segunda opción submenu 2'),
                      array('id'=>'2', 'padre'=>'2', 'label'=>'submenú 2',  'link'=>''                  , 'orden' => '2', 'tooltip'=>''),
                     );

        */
        $data[] = array('id'=>'1', 'padre'=>'1', 'label'=>'Opción 1',   'link'=>'http://link1.com'  , 'orden' => '1', 'tooltip'=>'Primera opción que te lleva a ');
        $data[] = array('id'=>'2', 'padre'=>'2', 'label'=>'submenú 2',  'link'=>''                  , 'orden' => '2', 'tooltip'=>'');
        $data[] = array('id'=>'3', 'padre'=>'2', 'label'=>'submenú 2.1',  'link'=>''                  , 'orden' => '3', 'tooltip'=>'');
        $data[] = array('id'=>'4', 'padre'=>'3', 'label'=>'Opción 4-  2.1.1', 'link'=>'http://link2.1.com', 'orden' => '4', 'tooltip'=>'Primera opción submenu 2.1');
        $data[] = array('id'=>'5', 'padre'=>'2', 'label'=>'Opción 5 - 2.2', 'link'=>'http://link2.2.com', 'orden' => '5', 'tooltip'=>'Segunda opción submenu 2');
        $data[] = array('id'=>'6', 'padre'=>'6', 'label'=>'Opción 6',   'link'=>'http://link5.com'  , 'orden' => '6', 'tooltip'=>'Quinta  opción que te lleva a ');
        $menuAll = [];

        foreach ($data as $line) {

            // echo '<pre>';
            // echo 'ID: '. $line['id'] .'   Padre: '. $line['padre'] .'     Label:'. $line['label'];  //var_dump($line);
            // echo '</pre>';

            if ($line['id'] == $line['padre']) {
                $item = array_merge($line, ['tipo'=>'opcion']);
            }else{
                $item = array_merge($line, ['tipo'=>'submenu']);

                // $children = [];
                foreach ($data as $line1) {
                    //echo ' ---  ID: '. $line['id'] .'   Padre: '. $line1['id'] .'-'. $line1['padre'] .'<br/>';
                    if ($line['id'] == $line1['padre']) {
                        if ($line1['id'] == $line1['padre']) {
                            array_push($item, array_merge($line1, ['tipo'=>'opcion']));
                        }else{
                            array_push($item, array_merge($line1, ['tipo'=>'submenu2']));

                            //$children2 = [];
                            foreach ($data as $line2) {
                                //echo '   -----    ID: '. $line1['id'] .'   Padre: '. $line2['id'] .'-'. $line2['padre'] .'<br/>';
                                if ($line1['id'] == $line2['padre']) {
                                    if ($line2['id'] == $line2['padre']) {
                                        array_push($item, array_merge($line2, ['tipo'=>'opcion']));
                                    }else{
                                        array_push($item, array_merge($line2, ['tipo'=>'submenu3']));
                                        //$children2 = array_merge($item, $line2);
                                    }
                                }
                            }
                        }
                        //$children = array_merge($children, $line1,  $children2 );
                    }
                }
                //$item = array_merge($line, $children);
            }
            // echo '<pre>*menuAll<br/>';
            // echo var_dump($menuAll);
            // echo '*</pre>';
            array_push($menuAll, $item);
        }

        return $menuAll;
    }

    public function getChildren($data, $line)
    {
        $children = [];
        foreach ($data as $line1) {
            if ($line['id'] == $line1['parent']) {
                $children = array_merge($children, [ array_merge($line1, ['submenu' => $this->getChildren($data, $line1) ]) ]);
            }
        }
        return $children;
    }

    public function optionsMenu()
    {
        //return $this->All()
        //    ->orderby('id_menu')
        //    ->orderby('orden')
        //    ->orderby('label')
        //    ->get('id')
        //    ->toArray();
        return array(array('id'=>'1', 'padre'=>'1', 'label'=>'Opción 1',   'link'=>'http://link1.com'  , 'orden' => '1', 'tooltip'=>'Primera opción que te lleva a '),
                     array('id'=>'2', 'padre'=>'2', 'label'=>'submenú 2',  'link'=>''                  , 'orden' => '2', 'tooltip'=>''),
                     array('id'=>'3', 'padre'=>'2', 'label'=>'Opción 2.1', 'link'=>'http://link2.1.com', 'orden' => '3', 'tooltip'=>'Primera opción submenu 2'),
                     array('id'=>'4', 'padre'=>'2', 'label'=>'Opción 2.2', 'link'=>'http://link2.2.com', 'orden' => '4', 'tooltip'=>'Segunda opción submenu 2'),
                     array('id'=>'5', 'padre'=>'5', 'label'=>'Opción 5',   'link'=>'http://link5.com'  , 'orden' => '5', 'tooltip'=>'Quinta  opción que te lleva a ')
                    );
    }

    public static function menus()
    {
       /*
        $menus = []; // new Hxxi_Menu();
        $data = $menus->optionsMenu();
        $menuAll = [];
        foreach ($data as $line) {
            $item = [ array_merge($line, ['submenu' => $menus->getChildren($data, $line) ]) ];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menus->menuAll = $menuAll;
       */
    }

}
