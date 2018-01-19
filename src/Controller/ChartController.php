<?php

    namespace App\Controller;
    
    use Silex\Application;
    
    class ChartController {

        function DrawChartAction(Application $app) {
            $smileys = $app['dao.givenanswer']->findNumberSmiley();
            
            $col[] = ['id' => '', 'label' => 'name', 'pattern' => '', 'type' => 'string'];
            $col[] = ['id' => '', 'label' => 'number', 'pattern' => '', 'type' => 'number'];
            $cols = ['cols' => $col];
        
            foreach ($smileys as $smiley) {
                    $row[] = ['c' => [['v' => $smiley['name'],
                        'f' => null], ['v' => (int) $smiley['count'], 'f' => null]]];
            }
    
            $rows = ['rows' => $row];
            
            $newdatajson = json_encode(array_merge($cols, $rows));
    
            return $newdatajson;
    
        }

        function columnChartAction(Application $app) {
            $res = $app['dao.givenanswer']->findNumberSmiley();
           
            $data = '[["name", "count"],';
            
            foreach ($res as $re) {
    
                $data .= '["' . $re['name'] . '" , ' . (int) $re['count'] . '],';
            }
            $data = substr($data, 0, -1) . ']';
    
            return $data;
    
        }
    
        function chartAction(Application $app) {
    
            return $app['twig']->render('chart.twig');
        }
    }
    